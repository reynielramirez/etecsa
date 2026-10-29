<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal;

/**
 * @Block(
 *      id = "etecsa_carousel",
 *      admin_label = @Translation("Bloque para el Carousel de Promociones de ETECSA")
 * )
 */
class CarouselBlock extends BlockBase {
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
    $termId =$etecsaService->getTaxId($vocabulary,$name);
    $carousel_images = [];
    $carousel_imagesok = [];
    $fecha_actual = date('Y-m-d');
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'promocion')
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_fecha_fin', $fecha_actual, '>=')
      ->condition('field_fechainicio', $fecha_actual, '<=')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $imageId) {
        $carouselImage = Drupal::entityTypeManager()->getStorage('node')->load($imageId);
          $carousel_images[] = $carouselImage->getTranslation($lan);
      }
    }

    $carousel_imagesok = $etecsaService->ordenarPeso($carousel_images);

    $library['library'][] = 'etecsa_module/carousel-styling';

    return [
      '#theme' => 'carousel',
      '#titulo' => 'Bloque para el carousel',
      '#descripcion' => 'En este bloque podra acceder a las promociones',
      '#data' => $carousel_imagesok,
      '#attached' => $library,
    ];
  }

}
