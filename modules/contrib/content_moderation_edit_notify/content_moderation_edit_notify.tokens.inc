<?php

/**
 * @file
 * Token integration for the Content moderation edit notify module.
 */

use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Implements hook_token_info_alter().
 */
function content_moderation_edit_notify_token_info_alter(array &$data): void {
  $data['tokens']['node']['latest_revision_log'] = [
    'name' => t('Latest revision log'),
    'description' => t('The latest node revision log message.'),
  ];
  $data['tokens']['node']['latest_revision_author'] = [
    'name' => t('Latest revision author'),
    'description' => t('The latest node revision author display name.'),
  ];
  $data['tokens']['node']['latest_revision_created'] = [
    'name' => t('Latest revision created date'),
    'description' => t('The latest node revision created date.'),
  ];
  $data['tokens']['node']['latest_revision_url'] = [
    'name' => t('Latest revision url'),
    'description' => t('The latest node revision raw url.'),
  ];
  $data['tokens']['node']['latest_revision_link'] = [
    'name' => t('Latest revision link'),
    'description' => t('The latest node revision full link on word <em>revision</em>.'),
  ];
  $data['tokens']['node']['latest_revision_state'] = [
    'name' => t('Latest revision state'),
    'description' => t('The latest node revision moderation state.'),
  ];
}

/**
 * Implements hook_tokens().
 */
function content_moderation_edit_notify_tokens(string $type, array $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata): array {
  $replacements = [];

  if ('node' !== $type || empty($data['node'])) {
    return [];
  }

  /** @var \Drupal\node\NodeInterface $node */
  $node = $data['node'];
  $nodeId = $node->id();
  if (NULL === $nodeId) {
    return [];
  }

  $node_storage = \Drupal::service('entity_type.manager')->getStorage('node');
  $latest_revision_id = $node_storage->getLatestRevisionId($nodeId);

  if (NULL === $latest_revision_id) {
    return [];
  }

  /** @var \Drupal\Core\Entity\RevisionLogInterface $latest_revision */
  $latest_revision = $node_storage->loadRevision($latest_revision_id);

  foreach ($tokens as $name => $original) {
    switch ($name) {
      case 'latest_revision_created':
        $replacements[$original] = \Drupal::service('date.formatter')->format($latest_revision->getRevisionCreationTime());
        break;

      case 'latest_revision_log':
        $log_message = $latest_revision->getRevisionLogMessage();
        $replacements[$original] = !empty($log_message) ? $log_message : t('This new revision has no log message.');
        break;

      case 'latest_revision_author':
        $replacements[$original] = $latest_revision->getRevisionUser()->getDisplayName();
        break;

      case 'latest_revision_url':
        $replacements[$original] = Url::fromRoute(
          'entity.node.revision',
          [
            'node' => $node->id(),
            'node_revision' => $latest_revision->getRevisionId(),
          ],
          [
            'attributes' => ['_target' => 'blank'],
          ])->toString();
        break;

      case 'latest_revision_link':
        $replacements[$original] = Link::createFromRoute(
          t('revision'), 'entity.node.revision',
          [
            'node' => $node->id(),
            'node_revision' => $latest_revision->getRevisionId(),
          ],
          [
            'attributes' => ['_target' => 'blank'],
          ])->toString();
        break;

      case 'latest_revision_state':
        // @phpstan-ignore-next-line
        $replacements[$original] = $latest_revision->moderation_state->value;
        break;
    }
  }

  return $replacements;
}
