<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\AjaxResponse;


class ProvinciaMunicipioFiltroForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'provMunFilter';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $provincias = $etecsaService->getTerms('provincias',0,1,false);
    $municipios = [];
    $prov=\Drupal::request()->get('provincia');
    if(!empty($prov)){
      $municipios=$etecsaService->getTerms('provincias',$prov, 1, false);
    }
    $ajax_wrapper = 'my-ajax-wrapper';
    $form['provincias'] = [
      '#type' => 'select',
      '#title' => t('Province'),
      '#empty_value' => '',
      '#empty_option' => t('- Select -'),
      '#options' => !isset($provincias['error']) ? $provincias : [],
      '#default_value' => \Drupal::request()->get('provincia'),
      '#ajax' => [
        'callback' => '::cargarMunicipios',
        'event' => 'change',
        'wrapper' => 'edit-output',
        'progress' => array(
          'message' => '',
        ),
      ],
    ];
    
    // Build a wrapper for the ajax response.
    $form['municipios'] = [
      '#type' => 'select',
      '#title' => t('Municipality'),
      '#empty_value' => '',
      '#empty_option' => t('- Select -'),
      '#default_value' => \Drupal::request()->get('municipio'),
      '#options' => !isset($municipios['error']) ? $municipios : [],
      '#validated' => TRUE,
    ];

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Search'),
      '#id' => 'provMun',
    );

    return $form;
  }

  /**
   * The callback function for when the `my_select` element is changed.
   *
   * What this returns will be replace the wrapper provided.
   */
  public function cargarMunicipios(array $form, FormStateInterface $form_state) {

    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $triggeringElement = $form_state->getTriggeringElement();
    $value = $triggeringElement['#value'];
    $municipios= $etecsaService->getTerms('provincias',$value, 1, false);

    $wrapper_id = $triggeringElement["#ajax"]["wrapper"];
    $renderedField = "<option value='' selected=''>".t('-Todos-')."</option>";

    if (!isset($municipios['error'])) {
      foreach ($municipios as $key => $value) {
        $renderedField .= "<option value='".$key."'>".$value."</option>";
      }
    }

    $response = new AjaxResponse();
    $response->addCommand(new HtmlCommand("#edit-municipios", $renderedField));
    return $response;
  }

 
  
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  
    $form_state->setRedirect('etecsa.red', [
      'municipio' => $form_state->getValue('municipios'),
      'provincia' => $form_state->getValue('provincias')
    ]);
  }

}