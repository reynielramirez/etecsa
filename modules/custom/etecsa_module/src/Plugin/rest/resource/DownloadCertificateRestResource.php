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
 *   id = "download_certificate_rest-resource",
 *   label = @Translation("Rest for download certificate"),
 *   uri_paths = {
 *     "canonical" = "/api/download-certificate"
 *   }
 * )
 */
class DownloadCertificateRestResource extends ResourceBase
{
  /**
   * Responds to GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response object.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
  public function get(Request $request)
  {
    $serial = Xss::filter($request->get('serial'));
    $document = [];

    if ($serial) {
      $service = \Drupal::service('etecsa.etecsa_service');
      $document = $service->getDownloadCertificate($serial);
    }
    $result['document'] = $document[0]->response;
    return new ResourceResponse($result);
  }
}