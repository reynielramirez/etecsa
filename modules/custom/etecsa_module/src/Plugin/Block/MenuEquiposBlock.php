<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_menu_equipos_block",
 *      admin_label = @Translation("Bloque de menu de equipos.")
 * )
 */
class MenuEquiposBlock extends BlockBase {   

  /**
   * {@inheritdoc}
   */
  public function build() {
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
    
 
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'equipo')  
    ->condition('status',1)
    ->condition('langcode', $lan)
    ->condition('field_tipo_de_clientes', $termId)
    ->execute();

  $result=[];
  if(!empty($query)){
    foreach ($query as $id){
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $tipoEquipo = $etecsaService->getTaxTermById($node->get('field_tipo_de_equipos')->target_id); 
        if($tipoEquipo){
          $tipoEquipo = Drupal::service('entity.repository')->getTranslationFromContext($tipoEquipo, $lan);
        }  
        $tipo=$tipoEquipo->name->value;
        if(!in_array($tipo, $result)){
          $result[]=$tipo;
        }           
    }
  }
  $name=strtolower($name);
  $library['library'][] = 'etecsa_module/enlaces-tpocis-styling';
    return [
      '#theme' => 'menu-equipos',
      '#titulo' => 'Bloque de menu de equipos',
      '#descripcion' => 'En este bloque podra acceder al menu de equipos',
      '#data' => $result,
      '#cliente' => $name,
      '#attached' => $library,
    ];
  }

}
