<?php

namespace Drupal\autocomplete_list\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Attribute\FieldWidget;
use Drupal\Core\Field\FieldFilteredMarkup;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Utility\Token;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\InvokeCommand;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Plugin implementation of the 'entity_reference_autocomplete_list' widget.
 */
#[FieldWidget(
  id: 'entity_reference_autocomplete_list',
  label: new TranslatableMarkup('Autocomplete (List style)'),
  description: new TranslatableMarkup('An autocomplete text field. Use this for multiple value references.'),
  field_types: ['entity_reference'],
)]
class EntityReferenceAutocompleteList extends WidgetBase {

  /**
   * Constructs an autocomplete list widget.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    $field_definition,
    array $settings,
    array $third_party_settings,
    protected Token $token,
    protected ModuleHandlerInterface $moduleHandler,
  ) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $third_party_settings);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new self(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['third_party_settings'],
      $container->get('token'),
      $container->get('module_handler'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'match_operator' => 'CONTAINS',
      'size' => '60',
      'placeholder' => '',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element['match_operator'] = [
      '#type' => 'radios',
      '#title' => $this->t('Autocomplete matching'),
      '#default_value' => $this->getSetting('match_operator'),
      '#options' => $this->getMatchOperatorOptions(),
      '#description' => $this->t('Select the method used to collect autocomplete suggestions. Note that <em>Contains</em> can cause performance issues on sites with thousands of entities.'),
    ];
    $element['size'] = [
      '#type' => 'number',
      '#title' => $this->t('Size of textfield'),
      '#default_value' => $this->getSetting('size'),
      '#min' => 1,
      '#required' => TRUE,
    ];
    $element['placeholder'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Placeholder'),
      '#default_value' => $this->getSetting('placeholder'),
      '#description' => $this->t('Text that will be shown inside the field until a value is entered. This hint is usually a sample value or a brief description of the expected format.'),
    ];
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];

    $operators = $this->getMatchOperatorOptions();
    $summary[] = $this->t('Autocomplete matching: @match_operator', ['@match_operator' => $operators[$this->getSetting('match_operator')]]);
    $summary[] = $this->t('Textfield size: @size', ['@size' => $this->getSetting('size')]);
    $placeholder = $this->getSetting('placeholder');
    if (!empty($placeholder)) {
      $summary[] = $this->t('Placeholder: @placeholder', ['@placeholder' => $placeholder]);
    }
    else {
      $summary[] = $this->t('No placeholder');
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $referenced_entities = $items->referencedEntities();
    $field_name = $this->fieldDefinition->getName();
    $entity = NULL;
    if (isset($referenced_entities[$delta])) {
      $entity = $referenced_entities[$delta];
    }

    if ($entity) {
      $element += [
        'markup' => [
          '#type' => 'item',
          'link' => $entity->toLink()->toRenderable(),
          'remove' => [
            '#type' => 'submit',
            '#name' => sprintf('remove_%s_%s', $field_name, $delta),
            '#value' => $this->t('Remove'),
            '#submit' => [[get_class($this), 'removeSubmit']],
            '#limit_validation_errors' => [],
            '#ajax' => [
              'callback' => [get_class($this), 'removeAjax'],
              'effect' => 'fade',
            ],
          ],
          '#prefix' => '<div class="element">',
          '#suffix' => '</div>',
        ],
        'target_id' => [
          '#type' => 'value',
          '#value' => $entity->id(),
        ],
      ];
    }
    return ['target_id' => $element];
  }

  /**
   * {@inheritdoc}
   */
  public function errorElement(array $element, ConstraintViolationInterface $error, array $form, FormStateInterface $form_state) {
    return $element['target_id'];
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    $seen = [];
    foreach ($values as $key => $value) {
      if (isset($value['target_id'])) {
        if (is_array($value['target_id'])) {
          unset($values[$key]['target_id']);
          if (isset($value['target_id']['target_id'])) {
            $values[$key]['target_id'] = $value['target_id']['target_id'];
          }
          else {
            $values[$key] += $value['target_id'];
          }
        }
        // Remove duplicate target_id values.
        if (isset($values[$key]['target_id'])) {
          $target_id = $values[$key]['target_id'];
          if (in_array($target_id, $seen, TRUE)) {
            unset($values[$key]);
          }
          else {
            $seen[] = $target_id;
          }
        }
      }
      else {
        unset($values[$key]);
      }
    }

    // Re-index array after removing duplicates.
    $values = array_values($values);
    return $values;
  }

  /**
   * Returns the options for the match operator.
   *
   * @return array
   *   List of options.
   */
  protected function getMatchOperatorOptions() {
    return [
      'STARTS_WITH' => $this->t('Starts with'),
      'CONTAINS' => $this->t('Contains'),
    ];
  }

  /**
   * Special handling to create form elements for multiple values.
   *
   * Handles generic features for multiple fields:
   * - number of widgets
   * - AHAH-'add more' button
   * - table display and drag-n-drop value reordering.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $items
   *   The field item list.
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   The form elements for the widget.
   */
  protected function formMultipleElements(FieldItemListInterface $items, array &$form, FormStateInterface $form_state) {
    $field_name = $this->fieldDefinition->getName();
    $cardinality = $this->fieldDefinition->getFieldStorageDefinition()
      ->getCardinality();
    $parents = $form['#parents'];

    $values = $form_state->getValue($field_name);
    if (isset($values) && count($values)) {
      $this->extractFormValues($items, $form, $form_state);
    }
    $id_prefix = implode('-', array_merge($parents, [$field_name]));
    $wrapper_id = Html::getUniqueId($id_prefix . '-add-more-wrapper');

    // Determine the number of widgets to display.
    switch ($cardinality) {
      case FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED:
        $field_state = static::getWidgetState($parents, $field_name, $form_state);
        $max = $field_state['items_count'];
        break;

      default:
        $max = $cardinality - 1;
        break;
    }
    $title = $this->fieldDefinition->getLabel();
    $description = FieldFilteredMarkup::create($this->token
      ->replace($this->fieldDefinition->getDescription()));

    $selection_settings = $this->getFieldSetting('handler_settings') + ['match_operator' => $this->getSetting('match_operator')];
    $build_info = $form_state->getBuildInfo();

    $limit_validation_errors = [array_merge($parents, [$field_name])];
    $elements = [
      'add_new_element' => [
        '#type' => 'container',
        'autocomplete_input' => [
          '#title' => $this->fieldDefinition->getLabel(),
          '#description' => FieldFilteredMarkup::create($this->token
            ->replace($this->fieldDefinition->getDescription())),
          '#type' => 'entity_autocomplete',
          '#target_type' => $this->getFieldSetting('target_type'),
          '#selection_handler' => $this->getFieldSetting('handler'),
          '#selection_settings' => $selection_settings,
          // Entity reference field items are handling validation themselves via
          // the 'ValidReference' constraint.
          '#validate_reference' => FALSE,
          '#maxlength' => 1024,
          '#default_value' => NULL,
          '#size' => $this->getSetting('size'),
          '#placeholder' => $this->getSetting('placeholder'),
          '#ajax' => [
            'callback' => [get_class($this), 'addMoreAjaxAc'],
            'form_id' => $build_info['form_id'],
            'event' => 'autocompleteselect',
          ],
        ],
        'add' => [
          '#type' => 'submit',
          '#name' => 'add_more_' . $field_name,
          '#value' => $this->t('Add more'),
          '#submit' => [[get_class($this), 'addMoreSubmit']],
          '#limit_validation_errors' => $limit_validation_errors,
          '#ajax' => [
            'callback' => [get_class($this), 'addMoreAjax'],
            'wrapper' => $wrapper_id,
            'effect' => 'fade',
          ],
          '#attributes' => [
            'class' => [
              'add-button',
              'visually-hidden',
            ],
          ],
        ],
      ],

    ];

    for ($delta = 0; $delta <= $max; $delta++) {
      // Add a new empty item if it doesn't exist yet at this delta.
      if (!isset($items[$delta])) {
        $items->appendItem();
      }

      $element = [];

      $element = $this->formSingleElement($items, $delta, $element, $form, $form_state);

      if ($element) {
        $element['target_id']['markup']['remove']['#ajax']['wrapper'] = $wrapper_id;
        $element['target_id']['markup']['remove']['#limit_validation_errors'] = $limit_validation_errors;

        $elements[$delta] = $element;
      }
    }

    if ($elements) {
      $elements += [
        '#field_name' => $field_name,
        '#entity_type' => $this->getFieldSetting('target_type'),
        '#cardinality' => $cardinality,
        '#cardinality_multiple' => $this->fieldDefinition->getFieldStorageDefinition()
          ->isMultiple(),
        '#required' => $this->fieldDefinition->isRequired(),
        '#title' => $title,
        '#description' => $description,
        '#max_delta' => $max,
      ];

      $elements['#prefix'] = '<div id="' . $wrapper_id . '">';
      $elements['#suffix'] = '</div>';
    }

    return $elements;
  }

  /**
   * Generates the form element for a single copy of the widget.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $items
   *   The field item list.
   * @param int $delta
   *   The delta of the element.
   * @param array $element
   *   The widget element.
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   The form element.
   */
  protected function formSingleElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element += [
      '#field_parents' => $form['#parents'],
      '#delta' => $delta,
      '#weight' => $delta,
    ];

    $element = $this->formElement($items, $delta, $element, $form, $form_state);

    if ($element) {
      // Allow modules to alter the field widget form element.
      $context = [
        'form' => $form,
        'widget' => $this,
        'items' => $items,
        'delta' => $delta,
        'default' => $this->isDefaultValueWidget($form_state),
      ];
      $this->moduleHandler->alter([
        'field_widget_form',
        'field_widget_' . $this->getPluginId() . '_form',
      ], $element, $form_state, $context);
    }

    return $element;
  }

  /**
   * Submission handler for the "Add another item" button.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public static function addMoreSubmit(array $form, FormStateInterface $form_state) {
    $button = $form_state->getTriggeringElement();

    // Go one level up in the form, to the widgets container.
    $parents = array_slice($button['#array_parents'], 0, -2);
    $element = NestedArray::getValue($form, $parents);

    $field_name = $element['#field_name'];
    $parents = $element['#field_parents'];

    // Increment the items count.
    $field_state = static::getWidgetState($parents, $field_name, $form_state);
    $field_state['items_count']++;
    static::setWidgetState($parents, $field_name, $form_state, $field_state);

    // Add new values to form_state.
    $delta = $element['#max_delta'];
    $values = $form_state->getValue($element['#field_name']);
    $id = $values['add_new_element']['autocomplete_input'];
    $values = array_merge($values, [$delta => ['target_id' => ['target_id' => $id]]]);
    $form_state->setValueForElement($element, $values);
    $user_input = $form_state->getUserInput();
    unset($user_input[$element['#field_name']]['add_new_element']);
    $form_state->setUserInput($user_input);
    $form_state->setRebuild();
  }

  /**
   * {@inheritdoc}
   */
  public function extractFormValues(FieldItemListInterface $items, array $form, FormStateInterface $form_state) {
    $field_name = $this->fieldDefinition->getName();

    // Extract the values from $form_state->getValues().
    $path = array_merge($form['#parents'], [$field_name]);
    $key_exists = NULL;
    $values = NestedArray::getValue($form_state->getValues(), $path, $key_exists);

    if ($key_exists) {
      // Account for drag-and-drop reordering if needed.
      if (!$this->handlesMultipleValues()) {
        // Remove the 'value' of the 'add more' button.
        unset($values['add_more']);
        unset($values['add_new_element']);
        // The original delta, before drag-and-drop reordering, is needed to
        // route errors to the correct form element.
        foreach ($values as $delta => &$value) {
          $value['_original_delta'] = $delta;
        }

      }

      // Let the widget massage the submitted values.
      $values = $this->massageFormValues($values, $form, $form_state);

      // Assign the values and remove the empty ones.
      $items->setValue($values);
      $items->filterEmptyItems();

      // Put delta mapping in $form_state, so that flagErrors() can use it.
      $field_state = static::getWidgetState($form['#parents'], $field_name, $form_state);
      foreach ($items as $delta => $item) {
        $field_state['original_deltas'][$delta] = $item->_original_delta ?? $delta;
        unset($item->_original_delta, $item->_weight);
      }
      static::setWidgetState($form['#parents'], $field_name, $form_state, $field_state);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function flagErrors(FieldItemListInterface $items, ConstraintViolationListInterface $violations, array $form, FormStateInterface $form_state) {
    $button = $form_state->getTriggeringElement();
    // We need to prevent setting flag errors during validation after "Add this"
    // submit, because correct format of form_state will be set only in
    // addMoreSubmit handler later.
    if (!isset($button['#ajax']['callback']) || !in_array('addMoreAjax', $button['#ajax']['callback'])) {
      parent::flagErrors($items, $violations, $form, $form_state);
    }
  }

  /**
   * Ajax callback for the "Add this" button.
   *
   * This returns the new page content to replace the page content made obsolete
   * by the form submission.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   The rebuilt widget element.
   */
  public static function addMoreAjax(array $form, FormStateInterface $form_state) {
    $button = $form_state->getTriggeringElement();
    $element = NestedArray::getValue($form, array_slice($button['#array_parents'], 0, -2));
    $form_state->setRebuild();
    return $element;
  }

  /**
   * Ajax callback for autocomplete field.
   *
   * This returns js command for click the "Add this" button.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   The Ajax response that invokes the hidden add button.
   */
  public static function addMoreAjaxAc(array $form, FormStateInterface $form_state) {
    $button = $form_state->getTriggeringElement();
    $form_id = str_replace('_', '-', $button['#ajax']['form_id']);
    $element = NestedArray::getValue($form, array_slice($button['#array_parents'], 0, -2));
    $field_name = $element['#field_name'];
    $response = new AjaxResponse();
    $selector = '[id*="' . $form_id . '"] .field--name-' . str_replace('_', '-', $field_name) . ' .add-button';
    $method = 'mousedown';
    $arguments = [];
    $response->addCommand(new InvokeCommand($selector, $method, $arguments));
    return $response;
  }

  /**
   * Submit callback for Remove button.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public static function removeSubmit(array $form, FormStateInterface $form_state) {
    $button = $form_state->getTriggeringElement();
    $parents = array_slice($button['#array_parents'], 0, -4);
    $element = NestedArray::getValue($form, $parents);

    $delta = array_slice($button['#parents'], -4, 1);
    $delta = reset($delta);
    $values = $form_state->getValue($element['#field_name']);
    unset($values[$delta]);
    $form_state->setValue($element['#field_name'], $values);
    /** @var \Drupal\Core\Entity\EntityFormInterface $form_object */
    $form_object = $form_state->getFormObject();
    /** @var \Drupal\Core\Field\FieldItemListInterface $field_item_list */
    $field_item_list = $form_object->getEntity()->get($element['#field_name']);
    $field_item_list->removeItem($delta);
    $form_state->setRebuild();
  }

  /**
   * Ajax callback for the "Remove" button.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   The rebuilt widget element.
   */
  public static function removeAjax(array $form, FormStateInterface $form_state) {
    $button = $form_state->getTriggeringElement();
    $element = NestedArray::getValue($form, array_slice($button['#array_parents'], 0, -5));
    return $element;
  }

}
