<?php

namespace Drupal\etecsa_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\HttpFoundation\Request;

  /**
   * Clase controladora.
   */
class NosotrosController extends ControllerBase {

 

  /**
   * Obtener la informacion de proteccion al consumidor.
   */
  public function pConsumidor(Request $request) {
    $result = [];
    $bandera=false;
    $form = \Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\ProvMunSegmFiltroForm');
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $etecsaService = \Drupal::service('etecsa.etecsa_service');

    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }
   
    $contactos = [];
    $contactos_ids = [];

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'proteccion_al_consumidor')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

      if (!empty($query)) {
        foreach ($query as $id) {
          $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;

          $result['pconsumidor']=$node->getTranslation($lan);
        }
      }
    
    $idsMun = [];
    $filter = [];

    if (!empty($request->query->get('provincia')) || !empty($request->query->get('segmento')) || !empty($request->query->get('municipio'))) {
      $filter['seg'] = $request->query->get('segmento');
      $filter['prov'] = $request->query->get('provincia');
      $filter['mun'] = $request->query->get('municipio');
      $bandera=true;

    }
    else {
      $vocabulary = 'provincias';
      $prov = 'La Habana';
      $filter['prov'] = $etecsaService->getIdbyName($prov,$vocabulary);
    }
    if (!empty($filter['prov'])) {
        $arrayterm = $etecsaService->getTerms('provincias_consumidor', $filter['prov'], 1, false);
        if (!empty($arrayterm) && !isset($arrayterm['error'])) {
          $idsMun = array_keys($arrayterm);
        }
    }
   
    $queryD = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'prot_cons_contactos');
      if (!empty($filter['prov']) && 
        empty($filter['mun']) &&
        !empty($idsMun)) {
        $queryD->condition('field_field_provincia_consumidor', $idsMun, "IN");
      }

      if (!empty($filter['mun'])) {
        $queryD->condition('field_field_provincia_consumidor', $filter['mun']);
      }
      if (!empty($filter['seg'])) {
        $queryD->condition('field_segmento', $filter['seg']);
      }
  
      $queryR = $queryD->condition('langcode', $lan)
                ->condition('status', 1)
                ->sort('field_field_provincia_consumidor', "ASC")
                ->execute();


    if (!empty($queryR)) {
      $contactos = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($queryR);
      
      $result['contactos'] = $etecsaService->groupContactoMunicipio($contactos);
    }

    $library['library'][] = 'etecsa_module/pconsumidor-styling';
    return [
      '#theme' => 'etecsa_p_consumidor',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#form' => $form,
      '#bandera' => $bandera,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library
    ];
  }


  /**
   * Obtener la informacion sobre la empresa.
   */
  public function sobreNosotros() {
    $result = [];
    $consejos = [];
    $topics= [];
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }
 
    $queryD = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'sobre_de_nosotros')
      ->condition('langcode', $lan)
      ->condition('status', 1)
      ->execute();

    if (!empty($queryD)) {
      foreach ($queryD as $id) {
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $node = $node->getTranslation($lan);
        $topic_ids = [];
        foreach ($node->get('field_enlace_topics') as $key => $value) {
          $node_topic = \Drupal::entityTypeManager()->getStorage('node')->load($value->target_id);
          if ($node_topic->hasTranslation($lan)) {
            $topics[] = $node_topic->getTranslation($lan);
          }
        }
        $consejos_ids = [];
        foreach ($node->get('field_consejos_utiles') as $key => $value) {
          $consejo = \Drupal::entityTypeManager()->getStorage('node')->load($value->target_id);
          if ($consejo->hasTranslation($lan)) {
            $consejos[] = $consejo->getTranslation($lan);
          }
         
        }
        
        $result['topics'] = $topics;
        $result['consejos'] = $consejos;
        $result['nosotros'] = $node;
      }
    }

    $queryDirec = \Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'directivos')
    ->condition('field_destacada', 1)
    ->condition('langcode', $lan)
    ->condition('status', 1)
    ->execute();
       
  if (!empty($queryDirec)) {
    foreach ($queryDirec as $id) {
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
      $result['directivos'][]=$node->getTranslation($lan);
    }
  }
    $library['library'][] = 'etecsa_module/nosotros-styling';
    return [
      '#theme' => 'etecsa_sobre_nosotros',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  }

  /**
   * Obtener la informacion de red comercial de la empresa.
   */
  public function redComercial(Request $request) {
    
    $result = [];
    $bandera=false;
    $form = \Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\ProvinciaMunicipioFiltroForm');
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }
   
    
    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "red")
      ->condition('status', 1)
      ->execute();

    
    if (!empty($query)) {
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $result['redcomercial'][]=$node->getTranslation($lan);
      }
    }

    $idsMun = [];
    $filter = [];

    if (!empty($request->query->get('provincia')) || !empty($request->query->get('municipio'))) {
      $filter['prov'] = $request->query->get('provincia');
      $filter['mun'] = $request->query->get('municipio');
      $bandera=true;

    }
    else {
      $vocabulary = 'provincias';
      $prov = 'La Habana';
      $filter['prov'] = $etecsaService->getIdbyName($prov,$vocabulary);
    }
    if (!empty($filter['prov'])) {
        $arrayterm = $etecsaService->getTerms('provincias', $filter['prov'], 1, false);
        if (!empty($arrayterm) && !isset($arrayterm['error'])) {
          $idsMun = array_keys($arrayterm);
        }
    }
 
    $queryD = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'establecimiento');
    if (!empty($filter['prov'])&& empty($filter['mun']) && !empty($idsMun)) {
      $queryD->condition('field_pro_red', $idsMun, "IN");
    }

    if (!empty($filter['mun'])) {
      $queryD->condition('field_pro_red', $filter['mun']);
    }
    $queryR = $queryD->condition('langcode', $lan)
              ->condition('status', 1)
              ->execute();

    if (!empty($queryR)) {
      $establecimientos = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($queryR);
      $result['establecimientos'] = $etecsaService->groupEstabMunicipio($establecimientos);

    }

    $library['library'][] = 'etecsa_module/rcomercial-styling';
    return [
      '#theme' => 'etecsa_red_comercial',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#form' => $form,
      '#bandera' => $bandera,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  }

  public function getRevistaTono() {

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
   
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
        $lan = "en";
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "revista")
      ->condition('status', 1)
      ->execute();

    
    $result=[];      
    if (!empty($query)) {     
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $result[]=$node->getTranslation($lan);
      }  
    }

    $library['library'][] = 'etecsa_module/revista-styling';
    return [
      '#theme' => 'revista-tono',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  }

  public function getCentroAT() {

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
   
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
        $lan = "en";
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "centro")
      ->condition('status', 1)
      ->execute();

    $result=[];   
    if (!empty($query)) {     
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $result['centro'][]=$node->getTranslation($lan);
      }  
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'servicio_de_atencion_telefonica')
    ->condition('langcode', $lan)
    ->condition('status', 1)
    ->execute();
   
  if (!empty($query)) {     
    foreach ($query as $id){
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);;
      $result['servicios'][]=$node->getTranslation($lan);
    }  
  }
    $library['library'][] = 'etecsa_module/preguntasftodas-styling';
    return [
      '#theme' => 'atencion-telefonica',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  } 
 
  public function getDirectivos() {

    $directivosAll = array();
    $etecsaService = \Drupal::service('etecsa.etecsa_service');
    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
   
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
        $lan = "en";
    }
	
	  $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "directivos")
      ->condition('status', 1)
      ->execute();

    $texto=[];      
    if (!empty($query)) {     
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $texto[]=$node->getTranslation($lan);
      }  
    }
	
	  $queryTax = \Drupal::entityQuery('taxonomy_term')->accessCheck(FALSE)	    ->condition('vid','categoria_de_directivo')
      ->execute();
		
    if (!empty($queryTax)) {     
      foreach ($queryTax as $tax_id){
        $tax = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tax_id);
        $tax_name = $tax->getTranslation($lan)->getName();
	
        $queryDirectivos = \Drupal::entityQuery('node')->accessCheck(FALSE)          ->condition('type', 'directivos')
          ->condition('field_directivos_categoria', $tax_id)    
          ->condition('langcode', $lan)
          ->condition('status', 1)
          ->execute();  
        
        if (!empty($queryDirectivos)) {  
          $result = array();
          foreach ($queryDirectivos as $id_directivo){
            $node = \Drupal::entityTypeManager()->getStorage('node')->load($id_directivo);
            $result[] = $node->getTranslation($lan);
          }  

          $directivos['list'] = $etecsaService->ordenarPeso($result);
          $directivos['tax'] = $tax_name;
          $directivosAll[] = $directivos;
        }
      }  
    }

    $library['library'][] = 'etecsa_module/revista-styling';
    return [
      '#theme' => 'directivos',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
	    '#texto' => $texto,
      '#data' => $directivosAll,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  }


  /**
   * Get a list of plazas
   *
   * @return array
   **/
  public function getPlaza(Request $request) {

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $form = \Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\ProvForm');
    $plazas = [];
   
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
        $lan = "en";
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "plazas")
      ->condition('status', 1)
      ->execute();

    
    if (!empty($query)) {
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $plazas['general'] = $node->getTranslation($lan);
      }
    }

    $fecha = date('Y-m-d H:i:s');

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'plaza')
    ->condition('langcode', $lan)
    ->condition('status', 1)
    ->condition('field_fecha_publicacion', $fecha, '<=')
    ->condition('field_fecha_vigente', $fecha, '>=');
    
    if (!empty($request->query->get('prov'))) {
      $prov_name = $request->query->get('prov');
      $query->condition('field_provincia', $prov_name);
    }

    $query->sort('field_fecha_publicacion', "ASC");
    $nodes_ids = $query->execute();
       
  if (!empty($nodes_ids)) {
    foreach ($nodes_ids as $id){
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
      $plazas['plazas'][] = $node->getTranslation($lan);
    }
  }
   
    $library['library'][] = 'etecsa_module/plaza-styling';
    return [
      '#theme' => 'plazas',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#plazas' => $plazas,
      '#form' => $form,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  }

   /**
   * Obtener hitos de la historia
   *
   * @return array
   **/
  public function getHitos(Request $request) {

    $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = \Drupal::languageManager()->getDefaultLanguage()->getId();
    $hitos = [];
   
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
        $lan = "en";
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "hitos")
      ->condition('status', 1)
      ->execute();

    
    if (!empty($query)) {
      foreach ($query as $id){
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        $hitos['general'][] = $node->getTranslation($lan);
      }
    }

    $query = \Drupal::entityQuery('node')->accessCheck(FALSE)    ->condition('type', 'hitos')
    ->condition('langcode', $lan)
    ->condition('status', 1);
    
    $query->sort('field_posiciones', "ASC");
    $nodes_ids = $query->execute();
       
  if (!empty($nodes_ids)) {
    foreach ($nodes_ids as $id){
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
      $hitos['hitos'][] = $node->getTranslation($lan);
    }
  }
   
    $library['library'][] = 'etecsa_module/hitos-styling';
    return [
      '#theme' => 'hitos',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#hitos' => $hitos,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
    ];
  }
  
}
