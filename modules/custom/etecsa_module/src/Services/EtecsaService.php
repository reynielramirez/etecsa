<?php

namespace Drupal\etecsa_module\Services;

use Drupal;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;

/**
 * Class EtecsaService.
 *
 * @package Drupal\etecsa_module\Services
 */
class EtecsaService
{
	use StringTranslationTrait;
	public bool $serial_and_name;
	
	
	public function __constructor(TranslationInterface $string_translation) {
		$this->stringTranslation = $string_translation;
	}

  /**
   * Obtener el id de termino de taxonomia.
   */
  public function getTaxId($vocabulary, $name)
  {
    $query = Drupal::entityQuery('taxonomy_term')->accessCheck(FALSE);
    $query->condition('vid', $vocabulary);
    $tids = $query->execute();

    $tid = '';
    foreach ($tids as $id) {
      $term = $this->getTaxTermById($id);
      if ($term->getName() == $name) {
        $tid = $term->id();
      }
    }

    return $tid;
  }

  public function getIdbyName($name = NULL, $vid = NULL)
  {
    $properties = [];
    if (!empty($name)) {
      $properties['name'] = $name;
    }
    if (!empty($vid)) {
      $properties['vid'] = $vid;
    }
    $terms = Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties($properties);
    $term = reset($terms);

    return !empty($term) ? $term->id() : 0;
  }
  /**
   * Obtener el termino de taxonomia.
   */
  public function getTaxTermById($id)
  {
    $term = Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($id);
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();

    if ($term) {
      if ($term->hasTranslation($language)) {
        $translated_term = Drupal::service('entity.repository')->getTranslationFromContext($term, $language);
        return $translated_term;
      } else {
        return $term;
      }
    }
    return FALSE;
  }

  public function getTerms($vocabulary, $tidsp, $level, $loadentity)
  {
    $result = [];
    try {
      $terms = Drupal::entityTypeManager()
        ->getStorage('taxonomy_term')
        ->loadTree($vocabulary, $tidsp, $level, $loadentity);

      foreach ($terms as $term) {
        $id = $term->tid;
        $name = $term->name;
        $result += [$id => $name];
      }
    } catch (\Exception $e) {
      return ['error' => TRUE];
    }

    return $result;
  }

  public function getParents($tid)
  {
    $parent = Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadParents($tid);
    $parent = reset($parent);


    return $parent;
  }

  /**
   * Ordenar por peso.
   */
  public function ordenarPeso($ca)
  {
    $temp = [];
    for ($i = 0; $i < count($ca); $i++) {
      for ($j = 0; $j < count($ca); $j++) {
        if ($ca[$i]->field_peso->value < $ca[$j]->field_peso->value) {
          $temp[0] = $ca[$j];
          $ca[$j] = $ca[$i];
          $ca[$i] = $temp[0];
        }
      }
    }

    return $ca;
  }

  /**
   * Resumir
   */
  public function resumir($texto, $limite, $car = " ", $final = ".")
  {
    if (strlen($texto ?? '') <= $limite)
      return $texto;
    if (false !== ($breakpoint = strpos($texto, $car, $limite))) {
      $val = strlen($texto ?? '') - 1;
      if ($breakpoint < $val) {
        $texto = substr($texto, 0, $breakpoint) . $final;
      }
    }

    return $texto;
  }

  function formatBytes($bytes, $precision = 2)
  {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow];
  }

  function getTemasbyCliente($cliente)
  {
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $default_laguagecode = Drupal::languageManager()->getDefaultLanguage()->getId();
    if ($language == "es" || $language == $default_laguagecode) {
      $lan = "es";
    }
    if ($language == "en") {
      $lan = "en";
    }

    $result = [];
    $queryD = Drupal::entityQuery('node')->accessCheck(FALSE)      ->condition('type', 'preguntas_frecuentes')
      ->condition('langcode', $lan)
      ->condition('field_tipo_de_clientes', $cliente)
      ->condition('status', 1)
      ->execute();

    if (!empty($queryD)) {
      foreach ($queryD as $id) {
        $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
        $tema = $this->getTaxTermById($node->get('field_tema')->target_id);
        if ($tema) {
          $translated_term = Drupal::service('entity.repository')->getTranslationFromContext($tema, $language);
          $t = [
            'tid' => $translated_term->tid->value,
            'name' => $translated_term->name->value,
            'weight' => $translated_term->weight->value
          ];
          array_push($result, $t);
        }
      }
    }

    $result = array_unique($result, SORT_REGULAR);
    $keys = array_column($result, 'weight');
    array_multisort($keys, SORT_ASC, $result);
    return $this->preparingData($result);
  }

  public function groupEstabMunicipio($establecimientos)
  {
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $estabByMun = [];
    foreach ($establecimientos as $key => $value) {

      $taxType = $this->getTaxTermById($value->get('field_tipo_de_esta')->target_id);
      if ($taxType) {
        $type_term = Drupal::service('entity.repository')->getTranslationFromContext($taxType, $language);
        $tipo = $type_term->getName();

      }
      $taxMun = $this->getTaxTermById($value->get('field_pro_red')->target_id);
      $taxProv = $this->getParents($value->get('field_pro_red')->target_id);
      $prov_term = Drupal::service('entity.repository')->getTranslationFromContext($taxProv, $language);
      $mun_term = Drupal::service('entity.repository')->getTranslationFromContext($taxMun, $language);
      $keyp = $prov_term->getName();
      $keym = $mun_term->getName();
      $value_trans = $value->getTranslation($language);
      $estab = [
        'nombre' => $value_trans->get('title')->value,
        'direccion' => $value_trans->get('field_direccion')->value,
        'horario' => $value_trans->get('field_horario')->value,
        'tipo' => $tipo
      ];

      $estabByMun[$keyp][$keym]['estab'][] = $estab;
    }

    return $estabByMun;
  }

  public function groupContactoMunicipio($contactos)
  {
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $contactByMun = [];
    foreach ($contactos as $key => $value) {
      $value_trans = $value->getTranslation($language);
      $contacto = [
        'nombre' => $value_trans->get('title')->value,
        'direccion' => $value_trans->get('field_direccion')->value,
        'horario' => $value_trans->get('field_horario')->value,
        'correo' => $value_trans->get('field_correodir')->value,
        'telefono' => $value_trans->get('field_telefono')->value,
      ];
      $taxType = $this->getTaxTermById($value->get('field_tipo_de_establecimiento')->target_id);
      if ($taxType) {
        $type_term = Drupal::service('entity.repository')->getTranslationFromContext($taxType, $language);
        $contacto['tipo'] = $type_term->getName();
      }
      $taxCargo = $this->getTaxTermById($value->get('field_cargo')->target_id);
      if ($taxCargo) {
        $cargo_term = Drupal::service('entity.repository')->getTranslationFromContext($taxCargo, $language);
        $contacto['cargo'] = $cargo_term->getName();
      }
      $taxMun = $this->getTaxTermById($value->get('field_prov_prot')->target_id);
      $taxProv = $this->getParents($value->get('field_prov_prot')->target_id);
      $prov_term = Drupal::service('entity.repository')->getTranslationFromContext($taxProv, $language);
      $mun_term = Drupal::service('entity.repository')->getTranslationFromContext($taxMun, $language);
      $keyp = $prov_term->getName();
      $keym = $mun_term->getName();
      $keyt = $type_term->getName();
      $contactByMun[$keyp]['muns'][$keym]['tipo'][$keyt]['contactos'][] = $contacto;
      $cantidad = isset($contactByMun[$keyp]['muns'][$keym]['cantidad_contacto']) ? $contactByMun[$keyp]['muns'][$keym]['cantidad_contacto'] : 0;
      $contactByMun[$keyp]['muns'][$keym]['cantidad_contacto'] = $cantidad + 1;


    }
    return $contactByMun;
  }

  /**
   * Devuelve los ids de los hijos de una taxonomia.
   * @param $taxNameSystem
   *  Nombre del sistema de la taxonomia.
   * @param $provId
   *  Id de la taxomonia padre.
   * @param $level
   *  Nivel a buscar.
   *
   * @return array
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function getTaxChild($taxNameSystem, $provId, $level)
  {
    $tids = [];
    $load_entities = FALSE;
    $child_tids = Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($taxNameSystem, $provId, $level, $load_entities);
    foreach ($child_tids as $child) {
      $tids[] = $child->tid;
    }
    return $tids;
  }

  /**
   * Return structure of taxonomy
   * @param array $array
   * 
   * @return array
   */
  public function preparingData($array)
  {
    $r = [];
    foreach ($array as $item) {
      $r += [$item['tid'] => $item['name']];
    }
    return $r;
  }

  /**
   * format visibility information
   *
   * @param array $visibility
   * @return string
   **/
  public function formatVisibility(array $visibility): string
  {
    $class = $c = '';
    $current_path = Drupal::service('path.current')->getPath();
    $alias = Drupal::service('path_alias.manager')->getAliasByPath($current_path);
    $client = explode("/", $alias ?? '')[1];
    if ($client == t("entrepreneurs") || $client == t("emprendedores")) {
      $c = 'entrepreneurs';
    } elseif ($client == t("companies") || $client == t("empresas")) {
      $c = 'companies';
    } elseif ($client == t("visitors") || $client == t("visitantes")) {
      $c = 'visitors';
    } else {
      $c = 'people';
    }
    $visibility['mobile'][$c] == 1 ? $class .= 'd-block ' : $class .= 'd-none ';
    $visibility['tablet'][$c] == 1 ? $class .= 'd-md-block ' : $class .= 'd-md-none ';
    $visibility['desktop'][$c] == 1 ? $class .= 'd-lg-block ' : $class .= 'd-lg-none ';

    return $class;
  }

  /**
   * Get Digital Certificate
   *
   * @param string $var Description
   * @param string $type_request Description
   **/
  public function getDigitalCertificate(string $val, string $type_request) {
    $client = Drupal::httpClient();
    $config = Drupal::config('etecsa_module.etecsasettings');
    $path_service = $config->get('digital_certificate')[$type_request];
    $path = str_replace(':val', $val, $path_service);
    $data = [];
    try {
      $request = $client->get($path);
      $response = $request->getBody()->getContents();
	  $data = json_decode($response);
	}
    catch (\Exception $e) {
      $data = [
        'error' => true,
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
      ];
    }

    return $data;
  }

  /**
   * Responds to GET requests.
   *
   */
  public function getCertificates(string $type, string $name, string $serie) {

    $data = [];
	$this->serial_and_name = false;
    $criteria = $this->buildCriteria($type, $name, $serie);

    if ($type && $criteria) {
      $certificates = $this->getDigitalCertificate($criteria, $type);
      $config = \Drupal::config('etecsa_module.etecsasettings');
      $link = $config->get('digital_certificate')['download'];

	  if (is_array($certificates)) {
		$error = $certificates['error'] ?? '';
	  }
	  else {
		$error = $certificates->error ?? '';
	  }
	  
      if (isset($error) && !empty($error)) {
        $result['error'] = $error;
        \Drupal::logger('etecsa_api')->error($this->t('Error en el servicio code = @code, mensaje = @message',
        ['@code' => $certificates['code'], '@message' =>  $certificates['message']]));
        $result['message'] = $config->get('digital_certificate')['error'];
      }
      if (empty($certificates)) {
        $result['not_found'] = true;
        $result['message'] = $config->get('digital_certificate')['not_found'];
      }
	  if ($certificates && !isset($error) || empty($error)) {
        $data = $this->processData($certificates);
      }
      $per_page = $config->get('digital_certificate')['per_page'];
      $result['item_page'] = $per_page;
      $result['data'] = $data;
    }
	$result['display_status'] = $this->serial_and_name;
    $result['labels'] = [
      'subject' => $this->t('Subject'),
      'serial_number' => $this->t('Serial Number'),
      'issuer' => $this->t('Issuer'),
      'created' => $this->t('Created on'),
      'revoked' => $this->t('Revoked'),
      'download' => $this->t('Download'),
	  'status' => $this->t('Status'),
	  'revocation_date' => $this->t('Revocation Date'),
    ];
	
    return $result;
  }

  public function buildCriteria(
    string $type,
    string $name,
    string $serie) {
    if ($type === 'name') {
      return $name;
    }
    if ($type === 'serie' && !empty($serie) && !empty($name)) {
      $this->serial_and_name = true;
      return $serie . '/' . $name;
    }
    if ($type === 'serie' && !empty($serie)) {
      return $serie;
    }
  }

  public function processData($certificates) {
    $data = [];
    if (!$this->serial_and_name) {
      $config = \Drupal::config('etecsa_module.etecsasettings');
      $link = $config->get('digital_certificate')['download'];
      foreach ($certificates as $cert) {
        $link_download = str_replace(':val', $cert->serial_number, $link);
        $revoked = 'No';
        if ($cert->revoked) {
          $timetamp_revoked = strtotime($cert->revocation_date);
          $revoked = date('Y-m-d', $timetamp_revoked);
        }
        $timetamp_created = strtotime($cert->created);
		$subject_array = explode(',', $cert->subject);
		$cn = end($subject_array);
        $subject = substr($cn, 3);
        $cert = [
          'ra_cert' => $cert->ra_cert,
          'serial_number' => $cert->serial_number,
          'subject' => $subject,
          'issuer' => $cert->issuer,
          'public_key' => $cert->public_key,
          'revoked' => $revoked,
          'created' => date('Y-m-d', $timetamp_created),
          'link_download' => $link_download,
        ];
        array_push($data, $cert);
      }
      return $data;
    }
    return ['status' => $certificates->estado];
    
  }
}