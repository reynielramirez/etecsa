<?php

namespace Drupal\etecsa_visitantes_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal;
use \Symfony\Component\HttpFoundation\Request;

  /**
   * Clase controladora.
   */
class VisitanteController extends ControllerBase {

  /**
   * Obtener la informacion de roaming.
   */
  public function getRoaming(Request $request) {
    $count = 0;
    $result = [];
    $descripcion = [];
    $paisesR=[];
    $idsPais= [];
    $cant=[];
    $bandera=false;
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_visitantes_module\Form\PaisFiltroForm');
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }

    if (!empty($request->query->get('pais'))) {
      $termPaistId = $request->query->get('pais');
      $bandera=true;

    } else {
      $manager = Drupal::entityTypeManager()->getStorage('taxonomy_term');
      $paises = $manager->loadTree('paises', 0, 1, true);
     
      foreach ($paises as $term) {
        if (empty($manager->loadParents($term->id())) && $term->get('field_destacado')->value==1) {
          if ($term->hasTranslation($language)) {
            $translated_term = Drupal::service('entity.repository')->getTranslationFromContext($term, $language);
            $paisesR[] = $translated_term->getName();
            $idsPais[] = $term->id();
          }
          else {
            $paisesR[] = $term->name->value;
            $idsPais[] = $term->id();
          }
            
        }
      }
    }

    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $language)
      ->condition('field_tipogen', "operadores")
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $descripcion[] = $node->getTranslation($language);
      }
    }
 
   $queryOperador = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'operador_roaming');
    if (!empty($termPaistId)) {
      $queryOperador->condition('field_pais', $termPaistId);
    }
    else{
      $queryOperador->condition('field_pais', $idsPais,"IN");
    }
    $queryR = $queryOperador->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    if (empty($termPaistId)) {
    if (!empty($queryR)) {
      foreach ($paisesR as $pais) {
        foreach ($queryR as $id) {
          $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
          $taxoPais = $etecsaService->getTaxTermById($node->get('field_pais')->target_id);
          $operador = $etecsaService->getTaxTermById($node->get('field_operador')->target_id);
          if ($operador) {
            $operador = Drupal::service('entity.repository')->getTranslationFromContext($operador, $lan);
          }
          if ($taxoPais->name->value===$pais) {
            $count=$count+1;
            $result[$pais][] = [
              'servicios' => $node->getTranslation($lan)->get('field_servicios')->value,
              'enlace' => $node->getTranslation($lan)->get('field_enlace_operador')->value,
              'operador' =>$operador->name->value,
            ];
          }
        }
        $cant[$pais]=$count;
        $count=0;
      }
    }
  }
  else {
    if (!empty($queryR)) {
      foreach ($queryR as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $pais = $etecsaService->getTaxTermById($node->get('field_pais')->target_id);
        $operador = $etecsaService->getTaxTermById($node->get('field_operador')->target_id);
        if($operador){
          $operador = Drupal::service('entity.repository')->getTranslationFromContext($operador, $lan);
        }
        $count= $count + 1;
        $result[$pais->name->value][] = [
            'servicios' => $node->getTranslation($lan)->get('field_servicios')->value,
            'enlace' => $node->getTranslation($lan)->get('field_enlace_operador')->value,
            'operador' =>$operador->name->value,
          ];
          
         $cant[$pais->name->value]=$count;
        }
      }
    }
    
    $library['library'][] = 'etecsa_module/salas-styling';
    return [
      '#theme' => 'roaming',
      '#titulo' => 'Block Custom Title',
      '#descripcion_block' => 'Block Custom Description',
      '#data' => $result,
      '#form' => $form,
      '#countEspacios' => $cant,
      '#bandera' => $bandera,
      '#descripcion' => $descripcion,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library
    ];
  }
}
