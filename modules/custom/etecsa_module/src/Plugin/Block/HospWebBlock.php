<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal;

/**
 * Class HospWebBlock.
 *
 * @Block(
 *      id = "etecsa_hospedaje_web_block",
 *      admin_label = @Translation("Bloque para los servicios de hospedaje web.")
 * )
 */
class HospWebBlock extends VisibilityBlock {

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
 
    $vocabularyCliente = 'tipos_de_clientes';
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $termClienteId =$etecsaService->getTaxId($vocabularyCliente,$name);

    $vocabularySO = 'tipos_de_so';
    $sos=[];
    
    $manager = Drupal::entityTypeManager()->getStorage('taxonomy_term');
    $sistOps = $manager->loadTree('tipos_de_so', 0, 1, TRUE);
   
    foreach ($sistOps as $term) {
      if ($term->hasTranslation($lan)){
        $translated_term = Drupal::service('entity.repository')->getTranslationFromContext($term, $lan);
       if (empty($manager->loadParents($translated_term->id()) && $translated_term->get('field_destacado')->value==1)) {   
        $sos[] = $translated_term->name->value;
       }   
      }
    }
    
  
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'hospedaje_web')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $termClienteId)
      ->condition('status', 1)
      ->sort("field_posiciones", "ASC")
      ->execute();

   
    $result = [];
    $cant=[];
    $count=0;
    $newso=[];
    if (!empty($query)) {
      foreach($sos as $so){
        foreach ($query as $id) {
          $node = Drupal::entityTypeManager()->getStorage('node')->load($id);;
          $soNode = $etecsaService->getTaxTermById($node->get('field_sist_ope')->target_id);
          if ($soNode) { 
            $sotrans= Drupal::service('entity.repository')->getTranslationFromContext($soNode,$lan);
            $soName = $sotrans->name->value;
            if($soName===$so){ 
            $count=$count+1;
            $result[$so][]= [
              'svg' => $node->getTranslation($lan)->get('field_imagen_svg')->entity->uri->value,
              'enlace' => $node->getTranslation($lan)->get('field_enla')->uri,
              'enlaceText' => $node->getTranslation($lan)->get('field_enla')->title,
            ];
          }
        }
      }
      if($count!=0){
        $newso[]=$so;        
      }
      $count=0;
    }   
    }
    $name=strtolower($name);
    $library['library'][] = 'etecsa_module/hospweb-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'hospweb',
      '#titulo' => 'Bloque para el card flotante',
      '#descripcion' => 'En este bloque podra acceder a card flotante',
      '#data' => $result,
      '#cliente' => $name,
      '#so' => $newso,
      '#attached' => $library,
      '#visibility' => $visibility_class,
    ];
  }

}
