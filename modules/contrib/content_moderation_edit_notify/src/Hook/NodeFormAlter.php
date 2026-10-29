<?php

namespace Drupal\content_moderation_edit_notify\Hook;

use Drupal\content_moderation\ModerationInformationInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Implements hook_form_node_form_alter().
 */
final class NodeFormAlter implements ContainerInjectionInterface {

  /**
   * The moderation information service.
   *
   * @var \Drupal\content_moderation\ModerationInformationInterface
   */
  private $moderationInfo;

  /**
   * The current user service.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  private $currentUser;

  /**
   * The configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  private $configFactory;

  /**
   * Constructs a new instance.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\content_moderation\ModerationInformationInterface $moderation_info
   *   The moderation information service.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   */
  public function __construct(
      ConfigFactoryInterface $config_factory,
      ModerationInformationInterface $moderation_info,
      AccountInterface $current_user
    ) {
    $this->configFactory = $config_factory;
    $this->moderationInfo = $moderation_info;
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): NodeFormAlter {
    return new static(
      $container->get('config.factory'),
      $container->get('content_moderation.moderation_information'),
      $container->get('current_user')
    );
  }

  /**
   * Alter the node form.
   *
   * @param array $form
   *   Nested array of form elements that comprise the form.
   * @param \Drupal\node\NodeInterface $node
   *   The node related by this form.
   */
  public function alter(array &$form, NodeInterface $node): void {

    if (!$this->moderationInfo->isModeratedEntity($node)) {
      return;
    }

    if (!$this->currentUser->isAuthenticated()) {
      return;
    }

    $uid = $this->currentUser->id();

    // When coming back from preview, getRevisionId is empty.
    $vid = $node->getRevisionId();
    if (NULL === $vid) {
      $vid = $node->getLoadedRevisionId();
    }

    if (NULL == $vid) {
      return;
    }

    $config = $this->configFactory->get('content_moderation_edit_notify.settings');
    $notifyInterval = $config->get('interval');

    // Add our scripts for ajax request on revision based on current version.
    $form['#attached']['library'][] = 'content_moderation_edit_notify/content-moderation-edit-notify';
    $form['#attached']['drupalSettings']['content_moderation_edit_notify'] = [
      'interval' => $notifyInterval * 1000,
      $uid => [
        'node' => [
          'nid' => $node->id(),
          'vid' => $vid,
        ],
      ],
    ];
  }

}
