<?php

namespace Drupal\accessibility\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\Config;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'AccessibilityBlock' block.
 *
 * @Block(
 *   id = "accessibility_block",
 *   admin_label = @Translation("Accessibility"),
 *
 * )
 */
class AccessibilityBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Site location services.
   *
   * @var \Drupal\Core\Config\Configurationaccessvariable
   */
  protected $accessConfig = NULL;

  /**
   * Static create function provided by the ContainerFactoryPluginInterface.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')->get('accessibility.settings')
    );
  }

  /**
   * BlockBase plugin constructor that's expecting the create().
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, Config $accessibility_settings) {
    // Instantiate the BlockBase parent first.
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    // Save the service passed to this constructor via dependency injection.
    $this->accessConfig = $accessibility_settings;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    global $language;
    $attached['library'][]= 'accessibility/accessibility';

    $attached['drupalSettings']['accessibility'] = [
      'menu_opened' => $this->accessConfig->get('menu_opened'),
      'highlighted_links' => $this->accessConfig->get('highlighted_links'),
      'mobile_enabled' => $this->accessConfig->get('mobile_enabled'),
      'text_selector' => $this->accessConfig->get('text_selector'),
      'icon_size' => $this->accessConfig->get('icon_size'),
    ];

	return [
		'#theme' => 'accessibility_block',
		'#titulo' => 'Block Custom Title',
		'#descripcion' => 'Block Custom Description',
		'#language' => $language,
        '#attached' => $attached, 
		'#cache' => [
			'max-age' => 0,
		],
	];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
