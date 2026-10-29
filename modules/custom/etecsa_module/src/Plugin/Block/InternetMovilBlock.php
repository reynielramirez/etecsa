<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;

/**
 * @Block(
 *      id = "etecsa_internet_movil_block",
 *      admin_label = @Translation("Bloque de internet movil.")
 * )
 */
class InternetMovilBlock extends VisibilityBlock {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = \Drupal::service('path.current')->getPath();
    $alias = \Drupal::service('path_alias.manager')->getAliasByPath($current_path);
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
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $termId =$etecsaService->getTaxId($vocabulary,$name);
    
    $manager = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
    $catPaquetes = $manager->loadTree('tipo_paquete', 0, 2, true);
   
   
    $paquetes = [];
    foreach ($catPaquetes as $term) {
      if ($term->hasTranslation($lan)){
           $translated_term = \Drupal::service('entity.repository')->getTranslationFromContext($term, $lan);
          if (!empty($manager->loadParents($translated_term->id())
          && $translated_term->get('field_destacado')->value==1)) {
           $paquetes[] = $translated_term->name->value;
          }
      }
    }
 
      $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'paquete')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('status', 1)
      ->sort("field_posiciones", "ASC")
      ->execute();

 
   $result = [];
   $count=0;
   $newpqte=[];
    if (!empty($query)) {
      foreach($paquetes as $paquete){
        foreach ($query as $id) {
          $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
          $pqteNode = $etecsaService->getTaxTermById($node->get('field_tipo_de_paquete')->target_id);
          if ($pqteNode) {
            $pqtetrans= \Drupal::service('entity.repository')->getTranslationFromContext($pqteNode,$lan);
            $pqteName = $pqtetrans->name->value;
            if($pqteName===$paquete) {
              $count=$count+1;
              $result[$paquete][]= [
                'svg' => $node->getTranslation($lan)->get('field_imagen_svg')->entity->uri->value,
                'enlace' => $node->getTranslation($lan)->get('field_enlace')->uri,
                'enlaceText' => $node->getTranslation($lan)->get('field_enlace')->title,
              ];
          }
        }
      }
      if($count!=0){
        $newpqte[]=$paquete;
      }
      $count=0;
    }
  }
    $name=strtolower($name);
    $library['library'][] = 'etecsa_module/internet-movil-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = \Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'internet_movil',
      '#titulo' => 'Bloque para el internet movil de personas',
      '#descripcion' => 'En este bloque podra acceder a internet movil de personas.',
      '#data' => $result,
      '#cliente' => $name,
      '#pqtes' => $newpqte,
      '#attached' => $library,
      '#visibility' => $visibility_class,
    ];
  }

}
