<?php

namespace Drupal\etecsa_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

use Drupal;

/**
 * @Block(
 *      id = "etecsa_compartir_block",
 *      admin_label = @Translation("Bloque para compartir el contenido en las redes sociales.")
 * )
 */
class CompartirBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build(){
   

    $path = \Drupal::service('path.current')->getPath();
    $url = \Drupal::service('path_alias.manager')->getAliasByPath($path);
    $node = NULL;
    if (preg_match('/\/node\/(\d+)/', $path, $matches)) {
      $node = Node::load($matches[1]);
    }
    if (!$node) {
      $route_node = \Drupal::routeMatch()->getParameter('node');
      if ($route_node instanceof Node) {
        $node = $route_node;
      }
    }
    if (!$node) {
      return [];
    }
    $title = $node->getTitle();

    $library['library'][] = 'etecsa_module/compartir-styling';

  return [
      '#theme' => 'compartir',
      '#titulo' => 'Bloque para el menú en Sobre nosotros',
      '#descripcion' => '',
      '#title' => $title,
      '#url' => $url,
      '#attached' => $library,
      '#cache'=>[
        'max-age'=>0,
    ],
    ];
}
}
?>
