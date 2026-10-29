<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class EtecsaSettingsForm.
 */
class EtecsaSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'etecsa_module.etecsasettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'etecsa_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('etecsa_module.etecsasettings');
    $att_cliente = $config->get('att_cliente') ?? [];
    $form["#tree"] = TRUE;
   
    $form['settings'] = [
      '#type' => 'vertical_tabs',
    ];
    $form['att_cliente'] = [
      '#type' => 'details',
      '#title' => $this->t('General Settings'),
      '#group' => 'settings',
    ];
    $form['att_cliente']['tipo_servicio'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Tipo de servicios'),
      '#default_value' => $att_cliente['tipo_servicio'] ?? '',
      '#description' => $this->t('Cada opción en una línea y con el formato clave|etiqueta.')
    ];
    $form['att_cliente']['tipo_asunto'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Tipo de asuntos'),
      '#default_value' => $att_cliente['tipo_asunto'] ?? '',
      '#description' => $this->t('Cada opción en una línea y con el formato clave|etiqueta.')
    ];
    $form['att_cliente']['provincia'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Provincias'),
      '#default_value' => $att_cliente['provincia'] ?? '',
      '#description' => $this->t('Cada opción en una línea y con el formato clave|etiqueta.')
    ];
    $form['att_cliente']['destinatario'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Correo destinatarios'),
      '#default_value' => $att_cliente['destinatario'] ?? '',
      '#description' => $this->t('Cada dirección electrónica del destinatario en una línea')
    ];
    $form['watchdog'] = [
      '#type' => 'details',
      '#title' => $this->t('Logs'),
      '#group' => 'settings',
    ];
    $form['watchdog']['not_found'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Borrar registros 404'),
      '#default_value' => $config->get('watchdog')['not_found'] ?? '',
      '#description' => $this->t('Borrar los registros del tipo 404 en el watchdog cuando se ejecute el cron.')
    ];
    $form['icons'] = [
      '#type' => 'details',
      '#title' => $this->t('Icons'),
      '#group' => 'settings',
    ];
    $form['icons']['doc'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Icon Document doc'),
      '#description' => $this->t('Icon Document'),
      '#default_value' => isset($config->get('icons')['doc']) ? $config->get('icons')['doc'] : '',
      '#upload_location' => 'public://icons',
      '#upload_validators' => [
          'file_validate_extensions' => ['png jpg jpeg svg'],
        ],
    ];
    $form['icons']['xls'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Icon Document xls'),
      '#description' => $this->t('Icon Document xls'),
      '#default_value' => isset($config->get('icons')['xls']) ? $config->get('icons')['xls'] : '',
      '#upload_location' => 'public://icons',
      '#upload_validators' => [
          'file_validate_extensions' => ['png jpg jpeg svg'],
        ],
    ];
    $form['icons']['pdf'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Icon Document pdf'),
      '#description' => $this->t('Icon Document pdf'),
      '#default_value' => isset($config->get('icons')['pdf']) ? $config->get('icons')['pdf'] : '',
      '#upload_location' => 'public://icons',
      '#upload_validators' => [
          'file_validate_extensions' => ['png jpg jpeg svg'],
        ],
    ];
    $form['icons']['rar'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Icon Document rar'),
      '#description' => $this->t('Icon Document rar'),
      '#default_value' => isset($config->get('icons')['rar']) ? $config->get('icons')['rar'] : '',
      '#upload_location' => 'public://icons',
      '#upload_validators' => [
          'file_validate_extensions' => ['png jpg jpeg svg'],
        ],
    ];
    $form['icons']['generic'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Icon Document Generic'),
      '#description' => $this->t('Icon Document Generic'),
      '#default_value' => isset($config->get('icons')['generic']) ? $config->get('icons')['generic'] : '',
      '#upload_location' => 'public://icons',
      '#upload_validators' => [
          'file_validate_extensions' => ['png jpg jpeg svg'],
        ],
    ];

    $form['digital_certificate'] = [
      '#type' => 'details',
      '#title' => $this->t('Certificado Digital'),
      '#group' => 'settings',
    ];

    $form['digital_certificate']['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enlace del nombre'),
      '#description' => $this->t('Endpoint para búsqueda por nombre'),
      '#maxlength' => 500,
      '#size' => 100,
      '#default_value' => isset($config->get('digital_certificate')['name']) ? $config->get('digital_certificate')['name'] : '',
      '#weight' => '0'
    ];
    $form['digital_certificate']['serie'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enlace de número de serie'),
      '#description' => $this->t('Enpoint para búsqueda por número de serie'),
      '#maxlength' => 500,
      '#size' => 100,
      '#default_value' => isset($config->get('digital_certificate')['serie']) ? $config->get('digital_certificate')['serie'] : '',
      '#weight' => '1'
    ];
    
    $form['digital_certificate']['download'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enlace de descarga'),
      '#description' => $this->t('Enpoint de la descarga'),
      '#maxlength' => 500,
      '#size' => 100,
      '#default_value' => isset($config->get('digital_certificate')['download']) ? $config->get('digital_certificate')['download'] : '',
      '#weight' => '2'
    ];
    $form['digital_certificate']['per_page'] = [
      '#type' => 'number',
      '#title' => $this->t('Elementos por página'),
      '#description' => $this->t('Cantidad de elemetos por página'),
      '#weight' => '3',
      '#default_value' => isset($config->get('digital_certificate')['per_page']) ? $config->get('digital_certificate')['per_page'] : 5,
     ];

    $form['digital_certificate']['not_found'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Mensaje respuesta vacia'),
      '#description' => $this->t('Mensaje para cuando no exite resultados en el servicio.'),
      '#maxlength' => 500,
      '#size' => 100,
      '#default_value' => isset($config->get('digital_certificate')['not_found']) ? $config->get('digital_certificate')['not_found'] : '',
      '#weight' => '4'
    ];
    
    $form['digital_certificate']['error'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Mensaje error servicio'),
      '#description' => $this->t('Mensaje de error en el servicio.'),
      '#maxlength' => 500,
      '#size' => 100,
      '#default_value' => isset($config->get('digital_certificate')['error']) ? $config->get('digital_certificate')['error'] : '',
      '#weight' => '5'
    ];
    
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $imagen_doc = $form_state->getValue('icons')['doc'];
    if ($imagen_doc) {
        \Drupal::service('etecsa.filepermanent')->setFileAsPermanent($imagen_doc);
    }
    $imagen_xls = $form_state->getValue('icons')['xls'];
    if ($imagen_xls) {
        \Drupal::service('etecsa.filepermanent')->setFileAsPermanent($imagen_xls);
    }
    $imagen_pdf = $form_state->getValue('icons')['pdf'];
    if ($imagen_pdf) {
        \Drupal::service('etecsa.filepermanent')->setFileAsPermanent($imagen_pdf);
    }
    $imagen_rar = $form_state->getValue('icons')['rar'];
    if ($imagen_rar) {
        \Drupal::service('etecsa.filepermanent')->setFileAsPermanent($imagen_rar);
    }
    $imagen_generic = $form_state->getValue('icons')['generic'];
    if ($imagen_generic) {
        \Drupal::service('etecsa.filepermanent')->setFileAsPermanent($imagen_generic);
    }

    $this->config('etecsa_module.etecsasettings')
    ->set('att_cliente', $form_state->getValue('att_cliente'))
    ->set('watchdog', $form_state->getValue('watchdog'))
    ->set('icons', $form_state->getValue('icons'))
    ->set('digital_certificate', $form_state->getValue('digital_certificate'))
    ->save();
  }

}
