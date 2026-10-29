<?php

namespace Drupal\etecsa_module\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\etecsa_module\Controller\EtecsaController;


class PregFrecuentesFiltroForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'faqfiltroform';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $etecsa=new EtecsaController();
    $temas=$etecsa->getFaqbyServOport();

    $form['temasfaq'] = [
      '#type' => 'select',
      '#options' => $temas,      
    ];
    $form['submit'] = array(
      '#type' => 'submit',
      '#id' => 'faqsubmit',
    );

    return $form;
  }

  
  public function submitForm(array &$form, FormStateInterface $form_state) {

    
}


}