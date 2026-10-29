<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_card_flotante_interno_block",
 *      admin_label = @Translation("Bloque de card flotante paginas internas.")
 * )
 */
class CardInternoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    $path = Drupal::service('path.current')->getPath();
    $alias = Drupal::service('path_alias.manager')->getAliasByPath($path);
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
   
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'cart_flotante')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('status', 1)
      ->execute();

    $card = [];
    if (!empty($query)) {
      foreach ($query as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $node = $node->getTranslation($lan);
        $card[] = $node;
      }
    }

    return [
    '#theme' => 'card_interno',
    '#titulo' => 'Bloque para el card flotante que aparece paginas internas',
    '#descripcion' => 'En este bloque podra acceder a card flotante en las paginas internas.',
    '#data' => $card,
    '#cliente' => $name,
    ];
  }

}
