<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

use Drupal;

/**
 * @Block(
 *      id = "etecsa_contactos_block",
 *      admin_label = @Translation("Bloque para los contactos.")
 * )
 */
class ContactosBlock extends BlockBase {
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

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'etecsa')  
    ->condition('status',1)
    ->condition('langcode', $lan)
    ->sort('created','DESC')
    ->execute();

  if(!empty($query)){
    foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;     
        $result[]=$node->getTranslation($lan);
    }
}

  $library['library'][] = 'etecsa_module/contactos-styling';

  return [
      '#theme' => 'contactos',
      '#titulo' => 'Bloque para los servicios y las oportunidades de persona',
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
