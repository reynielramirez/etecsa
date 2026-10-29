<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\etecsa_module\Plugin\Block\VisibilityBlock;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_noticas_block",
 *      admin_label = @Translation("Bloque de noticias.")
 * )
 */
class NoticiasBlock extends VisibilityBlock {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = Drupal::service('path.current')->getPath();  
    $alias = Drupal::service('path_alias.manager')->getAliasByPath($current_path);
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
    $sos=[];
    $fecha_actual = date('Y-m-d');
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'noticia')
      ->condition('field_fecha_publicacion_noti', $fecha_actual, '<=')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->sort("field_fecha_publicacion_noti", "DESC")
      ->range(0, 3)
      ->execute();
  
    $noticias = [];
    if (!empty($query)) {
      foreach ($query as $newsId) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($newsId);
        $node->resumen = $etecsaService->resumir($node->getTranslation($lan)->get('field_descripcion')->value, 200, " ", "...");
        $noticias[] = $node->getTranslation($lan);
      }
    }
    $name=strtolower($name);
    $library['library'][] = 'etecsa_module/noticias-styling';

    // Obtener visibilidad del bloque
    $visibility = parent::getVisibility();
    $library['drupalSettings']['visibility'] = $visibility;
    $visibility_class = Drupal::service('etecsa.etecsa_service')->formatVisibility($visibility);

    return [
      '#theme' => 'noticias',
      '#titulo' => 'Bloque para las noticias',
      '#descripcion' => 'En este bloque podra acceder a las noticias.',
      '#data' => $noticias,
      '#cliente' => $name,
      '#attached' => $library,
      '#visibility' => $visibility_class,
    ];
  }

}
