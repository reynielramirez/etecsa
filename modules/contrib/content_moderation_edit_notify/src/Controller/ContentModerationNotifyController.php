<?php

namespace Drupal\content_moderation_edit_notify\Controller;

use Drupal\content_moderation\ModerationInformationInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Utility\Token;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Returns responses for Moderation Notify module routes.
 */
final class ContentModerationNotifyController extends ControllerBase {

  /**
   * The moderation information service.
   *
   * @var \Drupal\content_moderation\ModerationInformationInterface
   */
  private $moderationInfo;

  /**
   * The token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  private $token;

  /**
   * Constructs a ContentModerationNotify object.
   *
   * @param \Drupal\content_moderation\ModerationInformationInterface $moderation_information
   *   The moderation information service.
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   */
  public function __construct(
      ModerationInformationInterface $moderation_information,
      Token $token
    ) {
    $this->moderationInfo = $moderation_information;
    $this->token = $token;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): ContentModerationNotifyController {
    return new static(
      $container->get('content_moderation.moderation_information'),
      $container->get('token')
    );
  }

  /**
   * Check if a new revision exist for a node and return message.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request of the page.
   * @param \Drupal\node\NodeInterface $node
   *   The node that need to be checked.
   * @param int $vid
   *   Current vid to check for.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   The Ajax response.
   */
  public function checkNewRevision(Request $request, NodeInterface $node, int $vid): AjaxResponse {

    $response = new AjaxResponse();

    $nodeId = $node->id();
    if (NULL === $nodeId) {
      return $response;
    }

    // Get last revision for this node.
    $node_storage = $this->entityTypeManager()->getStorage('node');
    $latest_revision_vid = $node_storage->getLatestRevisionId($nodeId);
    if (NULL === $latest_revision_vid) {
      return $response;
    }

    /** @var \Drupal\node\NodeInterface $latest_revision */
    $latest_revision = $node_storage->loadRevision($latest_revision_vid);

    // Check if revision translation is affected. If not, no message necessary.
    $lang_code = $this->languageManager()->getCurrentLanguage(LanguageInterface::TYPE_CONTENT)->getId();
    if ($node->hasTranslation($lang_code)) {
      if (!$latest_revision->getTranslation($lang_code)->isRevisionTranslationAffected()) {
        return $response;
      }
    }

    // If current user is editing the last revision we can stop here.
    if ((int) $latest_revision_vid === $vid) {
      return $response;
    }

    $config = $this->config('content_moderation_edit_notify.settings');

    // A "live" entity revision is one whose latest revision is also the
    // default, and whose moderation state, if any, is a published state.
    if ($this->moderationInfo->isLiveRevision($latest_revision)) {
      $message = $config->get('message_published');
      $type = 'error';
    }
    else {
      $message = $config->get('message_unpublished');
      $type = 'warning';
    }
    if (!is_string($message)) {
      return $response;
    }
    $message = $this->token->replace($message, ['node' => $latest_revision]);
    $response->addCommand(new MessageCommand($message, NULL, ['type' => $type]));
    return $response;
  }

}
