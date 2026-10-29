<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StreamWrapper\PublicStream;

/**
 * Customer support form for atención al cliente.
 */
class CustomerSupportForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'customer_support_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $provincia = $this->getProvincia();
    $tipoAsunto = $this->getTipoAsunto();
    $tipoServicio = $this->getTipoServicio();

    $form['nombre'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nombre'),
      '#maxlength' => 50,
      '#size' => 50,
      '#weight' => '0',
      '#required' => TRUE,
      '#placeholder' => $this->t('Admite 50 caracteres'),
    ];
    $form['primer_apellido'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Primer Apellido'),
      '#maxlength' => 50,
      '#size' => 50,
      '#weight' => '0',
      '#required' => TRUE,
      '#placeholder' => $this->t('Admite 50 caracteres'),
    ];
    $form['segundo_apellido'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Segundo Apellido'),
      '#maxlength' => 50,
      '#size' => 50,
      '#weight' => '0',
      '#placeholder' => $this->t('Admite 50 caracteres'),
    ];

    $form['provincia'] = [
      '#type' => 'select',
      '#title' => $this->t('Provincia'),
      '#options' => $provincia,
      '#empty_option' => $this->t('- Select -'),
      '#weight' => '0',
      '#attributes' => [
        'name' => 'field_provincia',
      ],
    ];
    $form['tipo_asunto'] = [
      '#type' => 'select',
      '#title' => $this->t('Tipo de asunto'),
      '#options' => $tipoAsunto,
      '#empty_option' => $this->t('- Select -'),
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['tipo_servicio'] = [
      '#type' => 'select',
      '#title' => $this->t('Tipo de servicio'),
      '#options' => $tipoServicio,
      '#empty_option' => $this->t('- Select -'),
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['direccion_postal'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Direccion postal'),
      '#weight' => '0',
      '#placeholder' => $this->t('Admite 120 caracteres'),
    ];
    $form['correo_electronico'] = [
      '#type' => 'email',
      '#title' => $this->t('Correo electronico'),
      '#weight' => '0',
      '#required' => TRUE,
      '#placeholder' => $this->t('user@domain'),
    ];
    $form['servicio_telefonico'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Servicio telefonico de localizacion'),
      '#maxlength' => 15,
      '#size' => 15,
      '#weight' => '0',
      '#required' => TRUE,
      '#placeholder' => $this->t('Admite 15 caracteres'),
    ];
    $form['servicio_afectado'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Servicio afectado'),
      '#weight' => '0',
      '#placeholder' => $this->t('Admite 120 caracteres'),
    ];
    $form['descripcion'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Descripcion'),
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['file'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Archivos'),
      '#default_value' => '',
      '#upload_location' => 'public://archivos_adjuntos_qr',
      '#upload_validators' => [
        'file_validate_extensions' => ['pdf'],
      ],
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
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
    $pais_label = '';
    $prov = '';

    if ($form_state->getValue('provincia')) {
      $prov = 'Provincia: ' . $form_state->getValue('provincia') . PHP_EOL;
    }

    $new_body = 'Nombre: ' . $form_state->getValue('nombre') . PHP_EOL .
      'Primer Apellido: ' . $form_state->getValue('primer_apellido') . PHP_EOL .
      'Segundo Apellido: ' . $form_state->getValue('segundo_apellido') . PHP_EOL .
      'País: ' . $pais_label . PHP_EOL . $prov .
      'Dirección postal: ' . $form_state->getValue('direccion_postal') . PHP_EOL .
      'Correo electrónico: ' . $form_state->getValue('correo_electronico') . PHP_EOL .
      'Servicio telefónico de localización: ' . $form_state->getValue('servicio_telefonico') . PHP_EOL .
      'Tipo de asunto: ' . $form_state->getValue('tipo_asunto') . PHP_EOL .
      'Tipo de servicio: ' . $form_state->getValue('tipo_servicio') . PHP_EOL .
      'Servicio afectado: ' . $form_state->getValue('servicio_afectado') . PHP_EOL .
      'Descripción: ' . $form_state->getValue('descripcion') . PHP_EOL;

    $message['body'][] = $new_body;
    $message['headers']['Content-Type'] = 'text/plain; charset=UTF-8; format=flowed; delsp=yes';
    $subject = $form_state->getValue('tipo_asunto');

    if ($form_state->getValue('file')) {
      $fileId = $form_state->getValue('file')[0];
      if (!empty($fileId)) {
        $file = \Drupal\file\Entity\File::load($fileId);
        if ($file) {
          $attachment = [
            'filecontent' => file_get_contents($file->getFileUri()),
            'filename' => $file->getFilename(),
            'filemime' => $file->getMimeType(),
          ];
          $message['params']['attachments'][] = $attachment;
        }
      }
    }

    $mailManager = \Drupal::service('plugin.manager.mail');
    $module = 'etecsa_module';
    $key = 'send_qr';
    $to = $this->getDestinatarios();
    $params['message'] = $message;
    $params['title'] = $subject;
    $langcode = 'es';
    $send = TRUE;

    $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
    if ($result['result'] != TRUE) {
      $error_message = $this->t('There was a problem sending your email notification to @email.', ['@email' => $to]);
      \Drupal::messenger()->addMessage($error_message, 'error');
      \Drupal::logger('mail-log')->error($error_message);
      return;
    }

    $success_message = $this->t('An email notification has been sent to @email ', ['@email' => $to]);
    \Drupal::messenger()->addMessage($success_message);
    \Drupal::logger('mail-log')->notice($success_message);
  }

  /**
   * Parses key|label lines from att_cliente config.
   *
   * @param string $config_key
   *   Key under att_cliente (tipo_asunto, tipo_servicio, provincia).
   *
   * @return array
   *   Select options keyed by machine value.
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
   * Get Tipo Asunto.
   *
   * @return array
   *   Select options.
   */
  public function getTipoAsunto() {
    return $this->parseKeyLabelOptions('tipo_asunto');
  }

  /**
   * Get Tipo Servicio.
   *
   * @return array
   *   Select options.
   */
  public function getTipoServicio() {
    return $this->parseKeyLabelOptions('tipo_servicio');
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

  /**
   * Clear directory public.
   */
  public function clear_directory() {
    $pulic_path = PublicStream::basePath();
    foreach (glob($pulic_path . '/archivos_adjuntos_qr/', GLOB_ONLYDIR) as $folder) {
      $files = glob("$folder" . '{,.}[!.,!..]*', GLOB_MARK | GLOB_BRACE);
      foreach ($files as $file) {
        if (is_file($file)) {
          unlink($file);
        }
      }
    }
  }

  /**
   * Obtener destinatarios.
   *
   * @return string
   *   Comma-separated recipient list.
   */
  public function getDestinatarios() {
    $att_cliente = \Drupal::config('etecsa_module.etecsasettings')->get('att_cliente') ?? [];
    $raw = is_array($att_cliente) ? ($att_cliente['destinatario'] ?? '') : '';
    $dest = explode(PHP_EOL, (string) $raw);
    $destinatarios = '';
    foreach ($dest as $d) {
      $d = trim($d);
      if ($d !== '') {
        $destinatarios .= $d . ',';
      }
    }
    return $destinatarios;
  }

}
