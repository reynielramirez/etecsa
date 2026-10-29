<?php

namespace Drupal\etecsa_empresa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;

/**
 * @Block(
 *      id = "etecsa_planes_moviles_pospago_empresa_block",
 *      admin_label = @Translation("Bloque para Planes moviles pospagos.")
 * )
 */
class PlanesMovilesPBlock extends VisibilityBlock {

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

    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $resultP = [];
    $newP = [];

    $manager = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
    $planes = $manager->loadTree('tipo_categoria_de_plan', 0, 2, true);

    foreach ($planes as $term) {
      if ($term->hasTranslation($lan)) {
        $translated_term = \Drupal::service('entity.repository')->getTranslationFromContext($term, $lan);
        if (
          !empty($manager->loadParents($translated_term->id())
          && $translated_term->get('field_destacado')->value == 1)
        ) {
          $resultP[] = $translated_term->id();
        }
      }
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'planes_moviles_pospagos')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->sort("field_posiciones", "ASC")
      ->execute();

    $result = [];
    if (!empty($query)) {
      foreach ($resultP as $tax) {
        foreach ($query as $id) {
          $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
          $tipo_categoria_de_plan_id = $node->get('field_tipo_categoria_de_plan')->target_id;
          $tpmNode = $etecsaService->getTaxTermById($tipo_categoria_de_plan_id);
          $tipoP = $etecsaService->getParents($tipo_categoria_de_plan_id);
          $tpmWeight = 0;
          $tpmName = '';

          if ($tpmNode) {
            $tpmWeight = $tpmNode->getWeight();
            $tpmNode_trans = \Drupal::service('entity.repository')->getTranslationFromContext($tpmNode, $lan);
            $tpmName = $tpmNode_trans->name->value;
          }

          if ($tipoP) {
            $tipoWeight = $tipoP->getWeight();
            $tipo_trans = \Drupal::service('entity.repository')->getTranslationFromContext($tipoP, $lan);
            $tipoName = $tipo_trans->name->value;
          }
          if ($tipo_categoria_de_plan_id === $tax) {
            $result[$tipoWeight]['tipo'] = $tipoName;
            $result[$tipoWeight]['tipo_value'] = str_replace(' ', '-', $tipoName);
            $result[$tipoWeight]['categorias'][$tpmWeight]['name'] = $tpmName;
            $result[$tipoWeight]['categorias'][$tpmWeight]['name_value'] = str_replace(' ', '-', $tpmName);
            $result[$tipoWeight]['categorias'][$tpmWeight]['description'] = $tpmNode_trans->description->value;
            $result[$tipoWeight]['categorias'][$tpmWeight]['planes'][] = [
              'svg' => $node->getTranslation($lan)->get('field_imagen_svg')->entity->uri->value,
              'enlace' => $node->getTranslation($lan)->get('field_enlace_mp')->uri,
              'enlaceText' => $node->getTranslation($lan)->get('field_enlace_mp')->title,
            ];
          }
        }
      }
    }

    ksort($result);
    foreach ($result as $key => $tipo) {
      $categorias = $tipo['categorias'];
      ksort($categorias);
      $result[$key]['categorias'] = $categorias;
    }

    $library['library'][] = 'etecsa_empresa_module/planesmovilesp-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = \Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'planes_moviles_pospagos',
      '#titulo' => 'Bloque para el card flotante',
      '#descripcion' => 'En este bloque podra acceder a card flotante',
      '#data' => $result,
      '#planes' => $newP,
      '#attached' => $library,
      '#visibility' => $visibility_class,
    ];
  }

}
