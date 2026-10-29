<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

use Drupal;

/**
 * @Block(
 *      id = "etecsa_menupc_block",
 *      admin_label = @Translation("Bloque para el menú en Protección al consumidor.")
 * )
 */
class MenuProteConsumidorBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build(){
    
    $result=array();
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();

    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'sobre_nos_topics')  
    ->condition('status',1)
    ->condition('langcode', $lan)
    ->condition('field_tipo', 'proteccion_consumidor')
    ->execute();

  if(!empty($query)){
    foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;     
        $result[]=$node->getTranslation($lan);
    }
}

  $library['library'][] = 'etecsa_module/enlaces-tpocis-styling';

  return [
      '#theme' => 'menu-enlaces-topics',
      '#titulo' => 'Bloque para el menú en proteccion al consumidor',
      '#descripcion' => '',
      '#data' => $result,
      '#attached' => $library,
      '#cache'=>[
        'max-age'=>0,
    ],
    ];
}
}
?>
