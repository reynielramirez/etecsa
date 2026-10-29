<?php

namespace Drupal\etecsa_persona_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal\node\Entity\Node;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_utilidades_persona_block",
 *      admin_label = @Translation("Bloque para las Utilidades en personas.")
 * )
 */
class UtilidadesPersonaBlock extends VisibilityBlock {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $result=array();
    $utilidades_node=array();
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
      ->condition('field_tipo_enl_aux', 'Utilidad')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    $utilidades_node = [];
    if (!empty($query)) {
      foreach ($query as $id) {
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $utilidades_node[] = $node->getTranslation($lan);
      }
    }
    $result = $etecsaService->ordenarPeso($utilidades_node);
    $library['library'][] = 'etecsa_persona_module/recargas-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = \Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'utilidades-persona',
      '#titulo' => 'Bloque para el promcortas de personas',
      '#descripcion' => 'En este bloque podra acceder a las promociones cortas.',
      '#data' => $result,
      '#attached' => $library,
      '#visibility' => $visibility_class,
      '#cache'=>[
        'max-age'=>0,
    ],
    ];
  }

}
