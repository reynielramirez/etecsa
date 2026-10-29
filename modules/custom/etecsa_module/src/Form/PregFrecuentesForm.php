<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\AjaxResponse;


class PregFrecuentesForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'pregfrecuentestodas';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state,$arg = NULL) {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();    
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $resultC=[]; 
    $clientes = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['vid' => 'tipos_de_clientes']);
      
    foreach ($clientes as $term) {
      $translated_term = \Drupal::service('entity.repository')->getTranslationFromContext($term, $language);
      $name=$translated_term->name->value;
      $id = $translated_term->tid->value;
      $resultC +=array($id => $name);
    } 
    $temas=$etecsaService->getTemasbyCliente(116);
    $cliente=\Drupal::request()->get('clientef');   
    if(!empty($cliente)){
      $temas=$etecsaService->getTemasbyCliente($cliente);
    }
    $form['clientes'] = [
      '#type' => 'select',
      '#options' => $resultC,
      '#default_value' => \Drupal::request()->get('clientef'),
      '#ajax' => [
        'callback' => '::cargarTemas',
        'event' => 'change',
        'progress' => array(
          'message' => '',
        ),         
      ],     
    ];
    
  
    $form['temas'] = [
      '#type' => 'select',
      '#empty_option' => t('- Select -'),
      '#default_value' => \Drupal::request()->get('tema'),
      '#options' => $temas,
      '#validated' => TRUE,
    ];
    
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Search'),
      '#id' => 'pregfrecuentessubmit',
    );

    return $form;
  }
  public function cargarTemas(array $form, FormStateInterface $form_state) {
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $triggeringElement = $form_state->getTriggeringElement();
    $value = $triggeringElement['#value'];
   
    $temas= $etecsaService->getTemasbyCliente($value);
   
    $renderedField = "<option value='' selected=''>".t('- Seleccionar -')."</option>";
    $sel="";
    foreach ($temas as $key => $value) {
      
      if($value=="Todas"){
        $sel="selected";
      }
      $renderedField .= "<option value='".$key."'.$sel>".$value."</option>";
    }
    $response = new AjaxResponse();
    $response->addCommand(new HtmlCommand("#edit-temas", $renderedField));
    return $response;
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $form_state->setRedirect('etecsa.faqtodas',  array(
      'tema' => $form_state->getValue('temas'),
      'clientef' => $form_state->getValue('clientes'),
    )); 
   
    
    
}


}
