<?php

namespace Drupal\etecsa_module\Controller;

use Drupal;
use Drupal\file\Entity\File;
use Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

  /**
   * Clase controladora.
   */
class EtecsaController extends ControllerBase {
 
  /**
   * Obtener la informacion de salas y espacios.
   */
  public function getSalasEspacios(Request $request) {
    $countEspacios = 0;
    $result = [];
    $descripcion = [];
    $idsMun = [];
    $icono = "";
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\SalasEspaciosFiltroForm');
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }

    if (!empty($request->query->get('tipo_inst')) || !empty($request->query->get('provincia')) || !empty($request->query->get('municipio'))) {
      $termInstId = $request->query->get('tipo_inst') ?? '';
      $termProvId = $request->query->get('provincia') ?? '';
      $terMunId = $request->query->get('municipio') ?? '';

    } else {
      $vocabulary = 'provincias';
      $prov = 'La Habana';
      $termProvId = $etecsaService->getIdbyName($prov,$vocabulary);
    }
   
    if (!empty($termProvId)) {
      $arrayterm = $etecsaService->getTerms('provincias', $termProvId, 1, false);
      if (!empty($arrayterm) && !isset($arrayterm['error'])) {
        $idsMun = array_keys($arrayterm);
      }
    }
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "espacios")
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $descripcion[] = $node->getTranslation($lan);

      }
    }
    $querySalas = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'espacios_publicos');
    if (!empty($termInstId)) {
      $querySalas->condition('field_tip_inst', $termInstId);
    }
    if (!empty($termProvId) && !empty($idsMun)) {
      $querySalas->condition('field_prov_sob', $idsMun, 'IN');
    }
    if (!empty($terMunId)) {
      $querySalas->condition('field_prov_sob', $terMunId);
    }
    $queryR = $querySalas->condition('langcode', $lan)
              ->condition('status', 1)
              ->sort('field_prov_sob', "ASC")
              ->execute();


    if (!empty($queryR)) {
      foreach ($queryR as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $mun = $etecsaService->getTaxTermById($node->get('field_prov_sob')->target_id);
        if($mun){
         $municipio= $mun->name->value;
        }
        $prov = $etecsaService->getParents($node->get('field_prov_sob')->target_id);
        if($prov){
          $provincia= $prov->name->value;
         }
        $salasid = $etecsaService->getTaxTermById($node->get('field_tip_inst')->target_id);
        if (!empty($node->get('field_icono_esp')->entity->uri->value)) {
          $icono = $node->getTranslation($lan)->get('field_icono_esp')->entity->uri->value;
        }
        if ($salasid->tid->value == 99) {
          $result[$provincia]['salas'][] = [
            'nombre' => $node->getTranslation($lan)->get('title')->value,
            'direccion' => $node->getTranslation($lan)->get('field_direccion')->value,
            'posiciones' => $node->getTranslation($lan)->get('field_posiciones')->value,
            'horario' => $node->getTranslation($lan)->get('field_horario')->value,
            'icono' => $icono,
            'municipio' => $municipio,
            'provincia' => $provincia,
          ];
        } else {
          $result[$provincia]['espacios'][$municipio][] = [
            'nombre' => $node->getTranslation($lan)->get('title')->value,
          ];
        
          $cantidad = isset($result[$provincia]['cantidad']) ? $result[$provincia]['cantidad']: 0;
          $result[$provincia]['cantidad']= $cantidad + 1;
        }
      }
    }
   

    $library['library'][] = 'etecsa_module/salas-styling';
    return [
      '#theme' => 'salas-espacios',
      '#titulo' => 'Block Custom Title',
      '#descripcion_block' => 'Block Custom Description',
      '#data' => $result,
      '#form' => $form,
      '#descripcion' => $descripcion,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library
    ];
  }

  /**
   * Pagina 403
   */
  public function getPage403() {
    $result['base_path'] = base_path();
    return [
      '#theme' => '403page',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#result' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

  /**
   * Pagina 404.
   */
  public function getPage404() {
    $result['base_path'] = base_path();
    return [
      '#theme' => '404page',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#result' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }
  
  /**
   * Obtener la informacion de las preguntas frecuentes.
   */
  public function getPreguntasF(Request $request) {
    $result = [];
    $nid=$request->query->get('faq');   
    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\PregFrecuentesFiltroForm');
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $lan = Drupal::languageManager()->getCurrentLanguage()->getId();
   
    $node = Drupal::entityTypeManager()->getStorage('node')->load($nid);
    if ($node->hasTranslation($lan)) {
      $node=$node->getTranslation($lan);
    }
    if (!empty($node)){
      foreach ($node->get('field_faq') as $faq) {
        $id = $faq->target_id;
        $faq_node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        if ($faq_node->hasTranslation($lan)) {
          $faq_node=$faq_node->getTranslation($lan);
        
        if(!empty($faq_node)){
        $tema = $etecsaService->getTaxTermById($faq_node->get('field_tema')->target_id);
        if($tema){
          $tema = Drupal::service('entity.repository')->getTranslationFromContext($tema, $lan);
        }
        
          foreach ($faq_node->get('field_faqs') as $key => $value) { 
            if(!empty($value->summary)){
              $pregunta=$value->summary;
          
            $result[] = [
              'preg' =>$pregunta,
              'rpta' => $value->value,
              'tema' =>$tema->name->value,
            ];
          }
        }
      }
    }
  }
}

    $library['library'][] = 'etecsa_module/preguntasf-styling';
    return [
      '#theme' => 'preguntas-frecuentes',
      '#titulo' => 'Bloque para las preguntas frecuentes',
      '#descripcion' => 'En este bloque podra acceder a las preguntas frecuentes.',
      '#data' => $result,
      '#form' => $form,
      '#attached' => $library,
    ];

  }


  /**
   * Obtener la informacion de todas las preguntas frecuentes.
   */
  public function getPreguntasFTodas(Request $request) {
   
    $result = [];
    $bandera=false;
    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\PregFrecuentesForm');
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }

    if ($request->query->get('tema') || $request->query->get('clientef')|| $request->query->get('cliente')) {
      $termTemasId = $request->query->get('tema');
      $termClienteId = $request->query->get('clientef');
      $bandera=true;
    } 
    else {
      $vocabularyCliente = 'tipos_de_clientes';
      $nameCliente="Personas";
      $vocabularyTemas = 'temas_faq';
      $nameTemas = 'Todas';
      $etecsaService = Drupal::service('etecsa.etecsa_service');
      $termClienteId = $etecsaService->getTaxId($vocabularyCliente, $nameCliente);
      $termTemasId = $etecsaService->getTaxId($vocabularyTemas, $nameTemas);
    }
   
    $queryD = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'preguntas_frecuentes')
      ->condition('langcode', $lan)
      ->condition('field_tema', $termTemasId)
      ->condition('field_tipo_de_clientes', $termClienteId)
      ->condition('status', 1)
      ->execute();
      
    
    if (!empty($queryD)) {
      foreach ($queryD as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $node=$node->getTranslation($lan);        
        foreach ($node->getTranslation($lan)->get('field_faqs') as $key => $value) {
         
          if(!empty($value->summary)){
            $pregunta=$value->summary;
         
          $result[] = [
            'preg' =>$pregunta,
            'rpta' => $value->value
          ];
        } 
      }
        
      }
    }
    
    $library['library'][] = 'etecsa_module/preguntasftodas-styling';

    return [
      '#theme' => 'preguntas-frecuentes-todas',
      '#titulo' => 'Bloque para las preguntas frecuentes',
      '#descripcion' => 'En este bloque podra acceder a las preguntas frecuentes.',
      '#data' => $result,
      '#form' => $form,
      '#bandera' => $bandera,
      '#attached' => $library,
    ];

  }
  /**
   * Obtener la informacion de preguntas frecuentes por servicio y opotunidades.
   */
  public function getFaqbyServOport() {
    $nid =  Drupal::request()->query->get('faq');;
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();

   
    $result = [];
    $node = Drupal::entityTypeManager()->getStorage('node')->load($nid);
    if ($node->hasTranslation($language)) {
      $node = $node->getTranslation($language);
    }
    
    if (!empty($node)) {
      foreach ($node->get('field_faq') as $faq) {
        $id = $faq->target_id;        
        $faq_node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        if ($faq_node->hasTranslation($language)) {
          $faq_node=$faq_node->getTranslation($language);
        }
       
        if(!empty($faq_node)){
        $tema = $etecsaService->getTaxTermById($faq_node->get('field_tema')->target_id);
        if($tema){
          $tema=Drupal::service('entity.repository')->getTranslationFromContext($tema, $language);
        }
        
        $result += [$tema->tid->value => $tema->name->value];
      }
      }
    }
    $result = array_unique($result, SORT_REGULAR);
    return $result;
  }

  public function getSolucTec() {   
    $result = [];
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = Drupal::service('path.current')->getPath();
    $tipo_cliente = explode("/",$current_path ?? '');

    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    $vocabulary = 'tipos_de_clientes';
    $name=ucfirst($tipo_cliente[1]);

    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $termId = $etecsaService->getIdbyName($name, $vocabulary);
    
    $queryNac = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'solucion')
      ->condition('field_soluc_tec_tipo', 'nacional')
      ->condition('status',1)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('langcode', $lan)
      ->sort('created','DESC')
      ->execute();

    if(!empty($queryNac)){
      foreach ($queryNac as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);     
        $node->resumen=$etecsaService->resumir($node->getTranslation($lan)->get('field_descripcion')->value,130," ","...");
        $result['nacional'][] = $node->getTranslation($lan);
      }
    }

    $queryInt = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'solucion')
      ->condition('field_soluc_tec_tipo', 'internacional')
      ->condition('status',1)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('langcode', $lan)
      ->sort('created','DESC')
      ->execute();

    if(!empty($queryInt)){
      foreach ($queryInt as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);     
        $node->resumen=$etecsaService->resumir($node->getTranslation($lan)->get('field_descripcion')->value,130," ","...");
        $result['internacional'][] = $node->getTranslation($lan);
      }
    }

    $library['library'][] = 'etecsa_module/servoportall-styling';
    return [
      '#theme' => 'solucionestecall',
      '#titulo' => 'Página para las soluciones tecnológicas',
      '#descripcion' => '',
      '#data' => $result,
      '#attached' => $library,
      '#cache'=> [
        'max-age' => 0,
      ],
    ];
  }
  public function getServOport() {
    
    $servicios = [];
    $oportunidades = [];
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

    $queryServ = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', "oportunidad")
      ->condition('status',1)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_tipo_servoportunidades', 'servicio')
      ->condition('langcode', $lan)
      ->sort('created','DESC')
      ->execute();

    if(!empty($queryServ)) {
      foreach ($queryServ as $id) {
        $nodeser = Drupal::entityTypeManager()->getStorage('node')->load($id);     
        $nodeser->resumen = $etecsaService->resumir($nodeser->getTranslation($lan)->get('field_descripcion')->value, 130, " ", "...");
        $servicios[] = $nodeser->getTranslation($lan);
      }  
    }
   
    $queryOport = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', "oportunidad")
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('field_tipo_servoportunidades', 'oportunidad')
      ->condition('status', 1)
      ->condition('langcode', $lan)
      ->sort('created', 'DESC')
      ->execute();

    if(!empty($queryOport)) {
      foreach($queryOport as $id) {
        $nodeopor = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $nodeopor->resumen = $etecsaService->resumir($nodeopor->getTranslation($lan)->get('field_descripcion')->value,130," ","...");
        $oportunidades[] = $nodeopor->getTranslation($lan);
        }
    }
    $library['library'][] = 'etecsa_module/servoportall-styling';
    $name=strtolower($name);
    return [
      '#theme' => 'servoportall',
      '#titulo' => 'Página para los servicios y las oportunidades de persona',
      '#descripcion' => '',
      '#servicios' => $servicios,
      '#cliente' => $name,
      '#oportunidades' => $oportunidades,   
      '#attached' => $library,
      '#cache' => [
        'max-age' => 0,
      ],
    ];
  }

  /**
   * Obtener la informacion de sistemas operativos.
   */ 
  public function getAllSO() {   

    $result=[];
    $newso=[];
    $descripcion=[];
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();    
    $current_path = Drupal::service('path.current')->getPath();
    $tipo_cliente = explode("/",$current_path ?? '');
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }

    if ($language == "en") {
      $lan = "en";
    }

    $vocabulary = 'tipos_de_clientes';
    $vocabularySO = 'tipos_de_so';
    $name=ucfirst($tipo_cliente[1]);
    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $termId = $etecsaService->getIdbyName($name,$vocabulary);
    
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'hospedaje_web')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('status', 1)
	  ->sort("field_posiciones", "ASC")
      ->execute();

	if(!empty($query)){
      foreach ($query as $id){
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);;
        $soNode = $etecsaService->getTaxTermById($node->get('field_sist_ope')->target_id);
        $soWeight = 0;
		
		if($soNode){
		  $soWeight = $soNode->getWeight();
          $soNode = Drupal::service('entity.repository')->getTranslationFromContext($soNode, $lan);
          $soName = $soNode->name->value;
        }
        
	    $result[$soWeight]['tipo'] = $soNode->name->value;
        $result[$soWeight]['hws'][] = [
            'svg' => $node->getTranslation($lan)->get('field_imagen_svg')->entity->uri->value,
            'enlace' => $node->getTranslation($lan)->get('field_enla')->uri,
            'subtitulo'=> $soNode->field_subtitulo->value,
            'enlaceText' => $node->getTranslation($lan)->get('field_enla')->title,            
          ];
        $descripcion[$soName]=$soNode->description->value; 
         
      }  
    }
	
    ksort($result);
    $library['library'][] = 'etecsa_module/hospweball-styling';
    return [
    '#theme' => 'hospweball',
    '#titulo' => '',
    '#descripcion' => '',
    '#data' => $result,
    '#cliente' => $termId,
    '#pregunta' => $descripcion,
    '#so' => null,
    '#attached' => $library,
    ];
  } 
  
  public function getPaquetes() {

    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    $current_path = Drupal::service('path.current')->getPath();
    $tipo_cliente = explode("/",$current_path ?? '');
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
        $lan = "en";
    }

    $etecsaService = Drupal::service('etecsa.etecsa_service');
    $vocabulary = 'tipos_de_clientes';
    $tipo_cliente[1]=="paquetes-bolsas"?$name = "Personas":$name = ucfirst($tipo_cliente[1]);
    $termId = $etecsaService->getIdbyName($name,$vocabulary);
    
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'paquete')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $termId)
      ->condition('status', 1)
      ->sort("field_posiciones", "ASC")
      ->execute();

      $newpqte = [];
      $result = [];
      $descripcion = [];
      $tipoName="";
      $tipoWeight = 0;
      $catWeight = 0;

    if (!empty($query)) {   
        foreach ($query as $id){
          $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
          $pqteNode = $etecsaService->getTaxTermById($node->get('field_tipo_de_paquete')->target_id);
          $tipoP = $etecsaService->getParents($node->get('field_tipo_de_paquete')->target_id);
          
          if($pqteNode){
            $catWeight = $pqteNode->getWeight();
            $cat_trans= Drupal::service('entity.repository')->getTranslationFromContext($pqteNode,$lan);
            $catName = $cat_trans->name->value;
          }
          if($tipoP){
            $tipoWeight = $tipoP->getWeight();
            $tipo_trans= Drupal::service('entity.repository')->getTranslationFromContext($tipoP,$lan);
            $tipoName = $tipo_trans->name->value;
          }
        
          $newpqte[]=$tipoName; 
          
          $result[$tipoWeight]['tipo'] = $tipoName; 
          $result[$tipoWeight]['categorias'][$catWeight]['name'] = $catName; 
          $result[$tipoWeight]['categorias'][$catWeight]['description'] = $cat_trans->description->value;
          $result[$tipoWeight]['categorias'][$catWeight]['subtitulo'] = $cat_trans->field_subtitulo->value;
          $result[$tipoWeight]['categorias'][$catWeight]['pqtes'][] = [ 
            'svg' => $node->getTranslation($lan)->get('field_imagen_svg')->entity->uri->value,
            'enlace' => $node->getTranslation($lan)->get('field_enlace')->uri,                       
            'enlaceText' => $node->getTranslation($lan)->get('field_enlace')->title,                       
          ];
        }
    }
    
    ksort($result);
    foreach ($result as $key => $tipo){
      $categorias = $tipo['categorias'];
      ksort($categorias);
      $result[$key]['categorias'] = $categorias;
    }

    $library['library'][] = 'etecsa_module/paquete-page-styling';
    return [
      '#theme' => 'paquetes_bolsas',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#attached' => $library,
      '#data' => $result,
      '#cliente' => $termId,      
      '#cache' => [
        'max-age' => 0,
      ] 
    ];
  }
   
  public function atencionClientes() {
    $result = [];    
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }
   
    
    $query = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'descripcion_general_de_espacios_')
      ->condition('langcode', $lan)
      ->condition('field_tipogen', "quejas")
      ->condition('status', 1)
      ->execute();

    
    if (!empty($query)) {
      foreach ($query as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $result[]=$node->getTranslation($lan);
      }
    }

    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\CustomerSupportForm');
   
    $library['library'][] = 'etecsa_module/aclientes-styling';
    return [
      '#theme' => 'atencion-clientes',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
      '#form' => $form,
    ];
  }

  /**
   * Descarga de transfremovil ruta vieja
   *
   * @param Request $request
   **/
  public function descargaTransfermovilAnterior(Request $request) {

    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $node_storage = Drupal::entityTypeManager()->getStorage('node');
    $app_id = $node_storage->getQuery()->accessCheck(FALSE)      ->condition('type', 'aplicacion')
      ->condition('status', '1')
      ->condition('langcode', $language)
      ->condition('title', 'Transfermóvil')
      ->execute();

    if (!empty($app_id)) {
      $node = Drupal::entityTypeManager()->getStorage('node')->load(reset($app_id));

      $fileId = $node->get('field_fichero')->getValue()[0]['target_id'];
                          
      if (!empty($fileId)) {
        $file = \Drupal\file\Entity\File::load($fileId);
        $filename = $file->getFilename();
        $uri_prefix = 'public://aplicaciones/';
        $uri = $uri_prefix . $filename;
        $headers = [
          'Content-Type' => 'application/vnd.android.package-archive',
          'Content-Description' => 'File Download',
          'Content-Disposition' => 'attachment; filename=' . $filename
        ];
  
        return new BinaryFileResponse($uri, 200, $headers, true);

    }
  }
   
   
  }

  /**
   * Certificado Digital
   *
   * @param Request $request
   **/
  public function certificadoDigital(Request $request) {

    $form = Drupal::formBuilder()->getForm('\Drupal\etecsa_module\Form\DigitalCertificateForm');
    $result = [];
	$digital_certificates = [];
	$without_parameters = true;
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $node_storage = Drupal::entityTypeManager()->getStorage('node');
    $query = $node_storage->getQuery()->accessCheck(FALSE)      ->condition('type', 'servicio_certificacion')
      ->condition('langcode', $language)
      ->condition('status', 1)
      ->execute();

    if (!empty($query)) {
      foreach ($query as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $result[] = $node->getTranslation($language);
      }
    }

    $config = Drupal::config('etecsa_module.etecsasettings');
    $icons_settings = (object) $config->get("icons");
    $file_icon = File::load(reset($icons_settings->generic));
    $icon_generic_path = $file_icon ? 
        Drupal::service('file_url_generator')->generateAbsoluteString($file_icon->getFileUri())
        : '';
    
	$type_request = $request->query->get('type_request');
	$name = $request->query->get('name');
	$serie = $request->query->get('serie');
	
	$library['library'][] = 'etecsa_module/digital-certificate';
	if ($type_request && ($name || $serie)){
		$service = \Drupal::service('etecsa.etecsa_service');
		$digital_certificates = $service->getCertificates($type_request, $name, $serie);
		$without_parameters = false;
	}
	$library['drupalSettings']['digital_certificates'] = $digital_certificates;
	$library['drupalSettings']['without_parameters'] = $without_parameters;
		    
    return [
      '#theme' => 'digital-certificate',
      '#titulo' => 'Block Custom Title',
      '#descripcion' => 'Block Custom Description',
      '#data' => $result,
      '#cache' => [
        'max-age' => 0,
      ],
      '#attached' => $library,
      '#form' => $form,
      '#icon_generic' => $icon_generic_path,
    ];
  }
  
}
