<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_soluciones_tecnologicas_block",
 *      admin_label = @Translation("Bloque para las soluciones tecnológicas.")
 * )
 */
class SolucionesTecBlock extends VisibilityBlock {
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
    
 
    $vocabulary = 'tipos_de_clientes';
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $termId =$etecsaService->getTaxId($vocabulary,$name);
   
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'solucion')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_soluc_tec_tipo', 'internacional')
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

    $count = count($query);

    if($count < 3){
      $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'solucion')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_soluc_tec_tipo', 'nacional')
      ->condition('field_destacada', 1)     
      ->condition('status',1)
      ->condition('langcode', $lan)
      ->sort('created','DESC')
      ->range(0,3 - $count)
      ->execute();

      if(!empty($query)){
        foreach ($query as $id){
            $node = Drupal::entityTypeManager()->getStorage('node')->load($id);     
            $node->resumen=$etecsaService->resumir($node->getTranslation($lan)->get('field_descripcion')->value,130," ","...");
            $result[]=$node->getTranslation($lan);
        }
      }
    }
    
    $library['library'][] = 'etecsa_module/serv-oport-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'solucionestec',
      '#titulo' => 'Bloque para las soluciones tecnológicas',
      '#descripcion' => '',
      '#data' => $result,
      '#cliente' => $tipo_cliente[1],
      '#attached' => $library,
      '#visibility' => $visibility_class,
      '#cache'=>[
        'max-age'=>0,
    ],
    ];
  }
}
