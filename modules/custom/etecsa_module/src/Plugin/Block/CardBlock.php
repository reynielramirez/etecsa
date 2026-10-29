<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_card_flotante_block",
 *      admin_label = @Translation("Bloque de card flotante.")
 * )
 */
class CardBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = \Drupal::service('path.current')->getPath();
    $tipo_cliente = substr($current_path, 1);

    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    $vocabulary = 'tipos_de_clientes';
    $tipo_cliente=="inicio"?$name = "Personas":$name = ucfirst($tipo_cliente);
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $termId = $etecsaService->getIdbyName($name,$vocabulary);

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'cart_flotante')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('status', 1)
      ->execute();

    $card = [];
    if (!empty($query)) {
      foreach ($query as $id) {
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $node = $node->getTranslation($lan);
        $card[] = $node;
      }
    }
    
    $library['library'][] = 'etecsa_module/card-styling';

    return [
    '#theme' => 'card',
    '#titulo' => 'Bloque para el card flotante',
    '#descripcion' => 'En este bloque podra acceder a card flotante',
    '#data' => $card,
    '#cliente' => $name,
    '#attached' => $library,
    ];
  }

}
