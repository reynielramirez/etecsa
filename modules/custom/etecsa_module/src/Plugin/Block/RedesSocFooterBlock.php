<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

use Drupal;

/**
 * @Block(
 *      id = "etecsa_redesociales_block",
 *      admin_label = @Translation("Bloque para las redes sociales que aparecen en el footer.")
 * )
 */
class RedesSocFooterBlock extends BlockBase {
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

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)        ->condition('type','enlaces_redes_sociales')
        ->condition('langcode',$lan)
        ->condition('status',1)
        ->execute();


  if(!empty($query)){
    foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);     
        $result[]=$node->getTranslation($lan);
    }
}

  $library['library'][] = 'etecsa_module/contactos-styling';

  return [
      '#theme' => 'redes-footer',
      '#titulo' => 'Bloque para las redes sociales del footer',
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
