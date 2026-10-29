<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Province filter form for plazas.
 */
class ProvForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'prov_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $provincias = $this->getProvincia();
    $prov = \Drupal::request()->get('prov');
    $form['prov_name'] = [
      '#type' => 'select',
      '#title' => $this->t('Provincia'),
      '#options' => $provincias,
      '#empty_option' => $this->t('- Select -'),
      '#default_value' => $prov,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Search'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect('etecsa.plazas', [
      'prov' => $form_state->getValue('prov_name'),
    ]);
  }

  /**
   * Parses key|label lines from att_cliente config.
   *
   * @return array
   *   Select options.
   */
  protected function parseKeyLabelOptions(string $config_key): array {
    $att_cliente = \Drupal::config('etecsa_module.etecsasettings')->get('att_cliente') ?? [];
    $raw = is_array($att_cliente) ? ($att_cliente[$config_key] ?? '') : '';
    $lines = explode(PHP_EOL, (string) $raw);
    $options = [];
    foreach ($lines as $line) {
      $line = trim($line);
      if ($line === '') {
        continue;
      }
      $parts = explode('|', $line, 2);
      if (count($parts) === 2 && $parts[0] !== '') {
        $options[$parts[0]] = $parts[1];
      }
    }
    return $options;
  }

  /**
   * Get province options.
   *
   * @return array
   *   Select options.
   */
  public function getProvincia() {
    return $this->parseKeyLabelOptions('provincia');
  }

}
