<?php

namespace Drupal\etecsa_visitantes_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal\node\Entity\Node;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_planes_moviles_temporales_visitantes_block",
 *      admin_label = @Translation("Bloque para Planes móviles temporales.")
 * )
 */
class PlanesMovilesTBlock extends VisibilityBlock {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'planes')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->sort("field_posiciones", "ASC")
      ->execute();

    $result = [];
    if (!empty($query)) {
      foreach ($query as $id) {
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $result[] = $node->getTranslation($lan);
        
      }
    }

    $library['library'][] = 'etecsa_visitantes_module/planesmovilest-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = \Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
    '#theme' => 'planes_moviles_temporales',
    '#titulo' => 'Bloque para los planes moviles temporales',
    '#descripcion' => '',
    '#data' => $result,
    '#attached' => $library,
    '#visibility' => $visibility_class,
    ];
  }

}
