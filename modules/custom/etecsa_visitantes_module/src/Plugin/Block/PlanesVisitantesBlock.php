<?php

namespace Drupal\etecsa_visitantes_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal\node\Entity\Node;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_planes_visitantes_block",
 *      admin_label = @Translation("Bloque para los planes de visitantes.")
 * )
 */
class PlanesVisitantesBlock extends VisibilityBlock {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $result=array();
    $recargas_node=array();
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();

    if ($language == "es" || $language == $default_laguagecode) {     
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }
     
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'enlace_auxiliar')
      ->condition('field_tipo_enl_aux', 'Plan de visitante')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $id) {
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $recargas_node[] = $node->getTranslation($lan);
      }
    }
    $result = $etecsaService->ordenarPeso($recargas_node);
    $library['library'][] = 'etecsa_visitantes_module/planesvisitantes-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = \Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'planes-visitantes',
      '#titulo' => 'Bloque para los planes de visitantes',
      '#descripcion' => '',
      '#data' => $result,
      '#attached' => $library,
      '#visibility' => $visibility_class,
      '#cache'=>[
        'max-age'=>0,
    ],
    ];
  }

}
