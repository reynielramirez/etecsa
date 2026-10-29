<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_equipo_block",
 *      admin_label = @Translation("Bloque de equipos y accesorios.")
 * )
 */
class EquiposAccesoriosBlock extends VisibilityBlock {

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
    $termId =$etecsaService->getTaxId($vocabulary,$name);

   
    $vocabularyE = 'tipos_de_equipos';
    $tipoEquipos=Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vocabularyE);
  
    foreach ($tipoEquipos as $tipoEquipo) {     
        $tipo[] = $tipoEquipo->name;
    }
    

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'equipo')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->condition('field_destacada', 1)
      ->sort('field_precio', "ASC")
      ->execute();
    $todos = [];
    if (!empty($query)) {
      foreach ($query as $eqId) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($eqId);
        $marca = $etecsaService->getTaxTermById($node->get('field_marca')->target_id);
        $modelo = $etecsaService->getTaxTermById($node->get('field_modelo')->target_id);
        $tipoE = $etecsaService->getTaxTermById($node->get('field_tipo_de_equipos')->target_id);
        if ($marca) {
          $marca_trans= Drupal::service('entity.repository')->getTranslationFromContext($marca,$language);
          $node->marca = $marca_trans->name->value;
        }
        
        if ($modelo) {
          $modelo_trans= Drupal::service('entity.repository')->getTranslationFromContext($modelo,$language);
          $node->modelo = $modelo_trans->name->value;
        }  
        if ($tipoE) {
          $equipo_trans= Drupal::service('entity.repository')->getTranslationFromContext($tipoE,$language);
          $todos[$equipo_trans->name->value][] = $node->getTranslation($lan);
        }             
      }
    }


    $library['library'][] = 'etecsa_module/equipos-accesorios-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'equipos_accesorios',
      '#titulo' => 'Bloque para equipos y accesorios',
      '#descripcion' => 'En este bloque podra acceder a equipos y accesorios',
      '#data' => $todos,
      '#cliente' => $tipo_cliente[1],
      '#attached' => $library,
      '#visibility' => $visibility_class,
    ];
  }

}
