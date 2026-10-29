<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_promcortas_movil_block",
 *      admin_label = @Translation("Bloque de promociones cortas movil.")
 * )
 */
class PromCortasMovilBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = \Drupal::service('path.current')->getPath();
    $tipo_cliente=substr($current_path,1);
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    $prom = [];
    
    $vocabulary = 'tipos_de_clientes';
    $tipo_cliente=="inicio"?$name = "Personas":$name = ucfirst($tipo_cliente);
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $termId = $etecsaService->getIdbyName($name,$vocabulary);

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'promocion_corta')
      ->condition('field_tipo_de_clientes', $termId)
	  ->condition('field_fecha_inicio', date('Y-m-d-h-i-s'), '<=')
	  ->condition('field_fecha_fin', date('Y-m-d-h-i-s'), '>=') 
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $promId) {
        $promNode = \Drupal::entityTypeManager()->getStorage('node')->load($promId);
        $promNode->resumen = $etecsaService->resumir($promNode->getTranslation($lan)->get('field_subtitulo')->value, 110, " ", "...");
        $prom[] = $promNode->getTranslation($lan);
      }
    }

    $library['library'][] = 'etecsa_module/promcortasmovil-styling';

    return [
      '#theme' => 'promcortasmovil',
      '#titulo' => 'Bloque para las promcortas',
      '#descripcion' => 'En este bloque podra acceder a las promociones cortas.',
      '#data' => $prom,
      '#attached' => $library,
    ];
  }

}
