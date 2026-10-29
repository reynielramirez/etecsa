<?php

namespace Drupal\etecsa_empresa_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal;
use Drupal\node\Entity\Node;
use \Symfony\Component\HttpFoundation\Request;

class EmpresaController extends ControllerBase
{
  
  public function getAllPlanes() {   

    $result=[];
    $newtpm=[];
    $descripcion=[];
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = \Drupal::service('path.current')->getPath();
    $tipo_cliente = explode("/",$current_path);

    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }
        
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $vocabularyCliente = 'tipos_de_clientes';
    $name=ucfirst($tipo_cliente[1]);
    
    $termClienteId = $etecsaService->getIdbyName($name,$vocabularyCliente);
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'planes_moviles_pospagos')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->sort("field_posiciones", "ASC")
      ->execute();
  
    if(!empty($query)){
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $tpmNode = $etecsaService->getTaxTermById($node->get('field_tipo_categoria_de_plan')->target_id);
        $tipoP = $etecsaService->getParents($node->get('field_tipo_categoria_de_plan')->target_id);
        $tpmWeight = 0;
        $tpmName = '';
       
        if($tpmNode){
          $tpmWeight = $tpmNode->getWeight();
          $tpmNode_trans = \Drupal::service('entity.repository')->getTranslationFromContext($tpmNode, $lan);
          $tpmName = $tpmNode_trans->name->value;
        }

        if($tipoP){
          $tipoWeight = $tipoP->getWeight();
          $tipo_trans= \Drupal::service('entity.repository')->getTranslationFromContext($tipoP,$lan);
          $tipoName = $tipo_trans->name->value;
        }

		
        $result[$tipoWeight]['tipo'] = $tipoName;
        $result[$tipoWeight]['tipo_value'] = str_replace(' ', '-', $tipoName);
        $result[$tipoWeight]['categorias'][$tpmWeight]['name'] = $tpmName; 
        $result[$tipoWeight]['categorias'][$tpmWeight]['description'] = $tpmNode_trans->description->value;
        $result[$tipoWeight]['categorias'][$tpmWeight]['planes'][]= [
            'svg' => $node->getTranslation($lan)->get('field_imagen_svg')->entity->uri->value,
            'enlace' => $node->getTranslation($lan)->get('field_enlace_mp')->uri,
            'enlaceText' => $node->getTranslation($lan)->get('field_enlace_mp')->title,
          ];
      }  
    }

    ksort($result);
    foreach ($result as $key => $tipo){
      $categorias = $tipo['categorias'];
      ksort($categorias);
      $result[$key]['categorias'] = $categorias;
    }
    $library['library'][] = 'etecsa_empresa_module/planesmovilesp-styling';
    return [
    '#theme' => 'planes_moviles_pospagos_all',
    '#titulo' => '',
    '#descripcion' => '',
    '#data' => $result,
    '#cliente' => $termClienteId,
    '#pregunta' => $descripcion,
    '#attached' => $library,
    ];
  }  
}

