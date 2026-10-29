<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\AjaxResponse;


class SalasEspaciosFiltroForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'salasespaciosfiltro';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $Inst = [];
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $provincias = $etecsaService->getTerms('provincias',0,1,false);     
    $tipoInst = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'tipo_de_instalacion']);
      
    foreach ($tipoInst as $term) {
      $translated_term = \Drupal::service('entity.repository')->getTranslationFromContext($term, $language);
      $name=$translated_term->name->value;
      $id = $translated_term->tid->value;
      $Inst +=array($id => $name);
    }
    $municipios=[];
    $prov=\Drupal::request()->get('provincia');
    $mun=\Drupal::request()->get('municipio');
    if(!empty($prov)){
      $municipios=$etecsaService->getTerms('provincias',$prov, 1, false);
    }
    $ajax_wrapper = 'etecsa-ajax-wrapper';
    $form['provincias'] = [
      '#type' => 'select',
      '#title' => t('Province'),
      '#default_value' => $prov,
      '#empty_option' => t('- Select -'),
      '#options' => !isset($provincias['error']) ? $provincias : [],
     '#ajax' => [
        'callback' => '::cargarMunicipios',
        'event' => 'change',
        'wrapper' => 'states-to-update',
        'progress' => array(
          'message' => '',
        ), 
      ],
    ];
    // Build a wrapper for the ajax response.
    $form['municipios'] = [
      '#type' => 'select',
      '#title' => t('Municipality'),
      '#empty_option' => t('- Select -'),
      '#default_value' => $mun,
      '#options' => !isset($municipios['error']) ? $municipios : [],
      '#validated' => TRUE,

    ];

    $form['tipo_inst'] = [
      '#type' => 'select',
      '#title' => t('Type of installation'),
      '#default_value' => \Drupal::request()->get('tipo_inst'),
      '#empty_option' => t('- Select -'),
      '#options' => $Inst,
    ];

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Search'),
      '#id' => 'espaciossubmit',
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
    $municipios = $etecsaService->getTerms('provincias',$value, 1, false);
      
    $wrapper_id = $triggeringElement["#ajax"]["wrapper"];
    $renderedField = "<option value='' >".t('- Select -')."</option>";

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
    
    $form_state->setRedirect('etecsa.salasespacios',  array(
      'municipio' => $form_state->getValue('municipios'),
      'provincia' => $form_state->getValue('provincias'),
      'tipo_inst' => $form_state->getValue('tipo_inst')
    ));
  }
  

}