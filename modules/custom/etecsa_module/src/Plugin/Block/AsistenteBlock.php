<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_asistente_block",
 *      admin_label = @Translation("Bloque para el asistente virtual.")
 * )
 */
class AsistenteBlock extends BlockBase {

  /**
     * {@inheritdoc}
     */
    public function defaultConfiguration()
    {
      return [
          'behaviour' => '',
      ] + parent::defaultConfiguration();
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state)
    {
      $form["#tree"] = TRUE;

    $form['base'] = [
      '#type' => 'vertical_tabs',
    ];

    $form['config_block_custom'] = [
      '#type' => 'details',
      '#title' => $this->t('Configuraciones personalizadas del bloque'),
      '#open' => TRUE,
      '#group' => 'base',
    ];
      $form['config_block_custom']['behaviour'] = [
        '#type' => 'select',
        '#title' => $this->t('Comportamiento del asistente'),
        '#options' => [
          '1' => $this->t('Ventana flotante'),
          '2' => $this->t('Enlace a nueva pestaña'),
        ],
        '#default_value' => $this->configuration['config_block_custom']['behaviour'],
        '#description' => $this->t('Comportamiento del asistente cuando se realiza la acción click.')
      ];

      return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state)
    {
        $this->configuration['config_block_custom'] = $form_state->getValue('config_block_custom');
    }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();

    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }
    $card =[];
    
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'asistente_virtual')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $id) {
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $node = $node->getTranslation($lan);
        $card[] = $node;
      }
    }
    $library['library'][] = 'etecsa_module/card-styling';
    return [
    '#theme' => 'asistente',
    '#titulo' => 'Bloque para el asistente virtual',
    '#descripcion' => 'En este bloque podra acceder al asistente virtual',
    '#data' => $card,
    '#behaviour' => $this->configuration['config_block_custom']['behaviour'],
    '#attached' => $library,
    ];
  }

}
