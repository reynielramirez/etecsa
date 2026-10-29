<?php

namespace Drupal\etecsa_visitantes_module\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\AjaxResponse;


class PaisFiltroForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'paisfiltroForm';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $paisesR=[];

      // Get the term storage.
    $entity_storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');

    // Query the terms sorted by weight.
    $query_result = $entity_storage->getQuery()->accessCheck(FALSE)      ->condition('vid', 'paises')
      // ->sort('weight', 'ASC')
      ->sort('name', 'ASC')
      ->execute();

    // Load the terms.
    $paises = $entity_storage->loadMultiple($query_result);

    foreach ($paises as $term) {
      $translated_term = \Drupal::service('entity.repository')->getTranslationFromContext($term, $language);
      $name=$translated_term->name->value;
      $id = $translated_term->tid->value;
      $paisesR[$id] = $name;
    }
  
    $form['pais'] = [
      '#type' => 'select',
      '#title' => t('Country'),
      '#empty_value' => '',
      '#empty_option' => t('- Select -'),
      '#options' => $paisesR,
      '#default_value' => \Drupal::request()->get('pais'),
    ];

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Search'),
      '#id' => 'roaming',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect('etecsa.roaming', [
      'pais' => $form_state->getValue('pais'),
    ]);
  }

}