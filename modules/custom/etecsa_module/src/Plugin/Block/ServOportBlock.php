<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_servoportblock",
 *      admin_label = @Translation("Bloque para los servicios y oportunidades.")
 * )
 */
class ServOportBlock extends VisibilityBlock {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $result=array();
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = Drupal::service('path.current')->getPath();  
    $alias = Drupal::service('path_alias.manager')->getAliasByPath($current_path);
    $tipo_cliente = explode("/",$alias ?? '');
    
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    if($tipo_cliente[1]== t("entrepreneurs")||$tipo_cliente[1]==t("companies")||$tipo_cliente[1]==t("visitors")){
      
      $name = ucfirst($tipo_cliente[1]); 
      }
      else{
        $lan=="es"?$name = "Personas":$name = "People"; 
    }
 
    $vocabulary = 'tipos_de_clientes';
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $termId = $etecsaService->getTaxId($vocabulary,$name);
    
    if($lan=="es"){
      $name=="Personas"?$titulo = "Servicios y Oportunidades":$titulo = "Oportunidades";
    }
    else{
      $name=="People"?$titulo = "Services and Opportunities":$titulo = "Opportunities";

    }
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'oportunidad')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_tipo_servoportunidades', 'oportunidad')
      ->condition('field_destacada', 1)
      ->condition('status',1)
      ->condition('langcode', $lan)
      ->sort('created','DESC')
      ->range(0,3)
      ->execute();
     
    if(!empty($query)){
      foreach ($query as $id){
          $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
          $node->resumen=$etecsaService->resumir($node->getTranslation($lan)->get('field_descripcion')->value,130," ","...");
          $result[]=$node->getTranslation($lan);
      }
  }
  if(count($query) < 3 && ($name == "Personas" || $name == "People")) {
    $new_count=3-count($query);
    $queryS = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'oportunidad')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_tipo_servoportunidades', 'servicio')
      ->condition('field_destacada', 1)
      ->condition('status',1)
      ->condition('langcode', $lan)
      ->sort('created','DESC')
      ->range(0,$new_count)
      ->execute();
    if(!empty($queryS)){
      foreach ($queryS as $id){
          $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
          $node->resumen=$etecsaService->resumir($node->getTranslation($lan)->get('field_descripcion')->value,130," ","...");
          $result[]=$node->getTranslation($lan);
      }
  }
  }

    $library['library'][] = 'etecsa_module/serv-oport-styling';
    $name=strtolower($name);

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);
    
    return [
      '#theme' => 'servoportunidades',
      '#titulo_block' => 'Bloque para los servicios y las oportunidades de persona',
      '#descripcion' => '',
      '#data' => $result,
      '#titulo' => $titulo,
      '#cliente' => $name,
      '#attached' => $library,
      '#visibility' => $visibility_class,
      '#cache'=>[
        'max-age'=>0,
    ],
    ];
  }
}
