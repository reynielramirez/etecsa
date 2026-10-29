<?php
namespace Drupal\etecsa_module\Plugin\rest\resource;

use Drupal\Component\Utility\Xss;
use Drupal\rest\ResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "digital_certificate_rest-resource",
 *   label = @Translation("Rest for digital certificate"),
 *   uri_paths = {
 *     "canonical" = "/api/digital-certificate"
 *   }
 * )
 */
class DigitalCertificateRestResource extends ResourceBase {

  public bool $serial_and_name;

  /**
   * Responds to GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response object.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
  public function get(Request $request) {

    $type = $request->get('type') ? Xss::filter($request->get('type')) : '';
    $name = $request->get('name') ? Xss::filter($request->get('name')) : '';
    $serie = $request->get('serie') ? Xss::filter($request->get('serie')) : '';
    $data = [];
	$this->serial_and_name = false;
    $criteria = $this->buildCriteria($type, $name, $serie);

    if ($type && $criteria) {
      $service = \Drupal::service('etecsa.etecsa_service');
      $certificates = $service->getDigitalCertificate($criteria, $type);
      $config = \Drupal::config('etecsa_module.etecsasettings');
      $link = $config->get('digital_certificate')['download'];

	  $error = is_array($certificates) ? $certificates['error'] : $certificates->error;
	  
      if (isset($error)) {
        $result['error'] = $error;
        \Drupal::logger('etecsa_api')->error($this->t('Error en el servicio code = @code, mensaje = @message',
        ['@code' => $certificates['code'], '@message' =>  $certificates['message']]));
        $result['message'] = $config->get('digital_certificate')['error'];
      }
      if (empty($certificates)) {
        $result['not_found'] = true;
        $result['message'] = $config->get('digital_certificate')['not_found'];
      }
	  if ($certificates && !isset($error)) {
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

    return new ResourceResponse($result);
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
		$cn = end(explode(',', $cert->subject));
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