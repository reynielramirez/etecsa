<?php
namespace Drupal\etecsa_module\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CustomerSupportForm.
 */
class DigitalCertificateForm extends FormBase
{

  public function getFormId()
  {
    return 'digital_certificate_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form['type_request'] = [
      '#type' => 'select',
      '#title' => $this->t('Búsqueda por'),
      '#options' => ['name' => $this->t('Nombre(s) y Apellidos'), 'serie' => $this->t('Número de serie')],
      '#weight' => '0',
	  '#default_value' => \Drupal::request()->get('type_request'),
      '#atributes' => [
        'name' => 'field_search',
      ],
	  '#required' => true
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nombre común'),
      '#maxlength' => 30,
      '#size' => 15,
      '#placeholder' => $this->t('Nombre'),
      '#weight' => '1',
      '#required' => true,
	  '#default_value' => \Drupal::request()->get('name'),
    ];

    $form['serie'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Número de serie'),
      '#maxlength' => 50,
      '#size' => 15,
      '#placeholder' => $this->t('No. serie'),
      '#weight' => '2',
      '#required' => false,
	  '#default_value' => \Drupal::request()->get('serie'),
    ];

/*     $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Search'),
      '#ajax' => [
        'callback' => '::myAjaxCallback',
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Verifying entry...'),
        ],
      ],
      '#weight' => '3',
    ]; */
	
	$form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Search'),
	  '#weight' => '4',
    ];

    return $form;
  }
  
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state)
  {

	$type_request = $form_state->getValue('type_request') ? Xss::filter($form_state->getValue('type_request')) : '';
    $name = $form_state->getValue('name') ? Xss::filter($form_state->getValue('name')) : '';
    $serie = $form_state->getValue('serie') ? Xss::filter($form_state->getValue('serie')) : '';
	  
	  $form_state->setRedirect('etecsa.certificados', [
      'type_request' => $type_request,
      'name' => $name,
	  'serie' => $serie,
  ]);
  }

  /**
   * An Ajax callback.
   */
  public function myAjaxCallback(array &$form, FormStateInterface $form_state)
  {
    $type_request = Xss::filter($form_state->getValue('type_request'));
    $name = Xss::filter($form_state->getValue('name'));
    $serie = Xss::filter($form_state->getValue('serie'));

    $response = new AjaxResponse();
    $response->addCommand(new InvokeCommand(null, 'myAjaxCallback', [
      $type_request,
      $name,
      $serie,
      '/api/digital-certificate?format=json',
    ]));
    return $response;
  }

}