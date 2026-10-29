<?php

namespace Drupal\content_moderation_edit_notify\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
 * Configure content moderation notify settings.
 */
class ContentModerationNotifySettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'content_moderation_edit_notify_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['content_moderation_edit_notify.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('content_moderation_edit_notify.settings');
    $token_help = $this->t('All nodes tokens are available plus: [node:latest_revision_author], [node:latest_revision_changed], [node:latest_revision_log], [node:url:unaliased:absolute], [node:latest_revision_state], [node:latest_revision_url], [node:latest_revision_link] (full link in a new window on word <em>revision</em>).');

    $form['message_unpublished'] = [
      '#type' => 'text_format',
      '#format' => 'basic_html',
      '#title' => $this->t('Warning unpublished'),
      '#default_value' => $config->get('message_unpublished'),
      '#description' => $this->t('Warning display to the user on the node edit form when an other user save a new unpublished revision.') . '<br>' . $token_help,
      '#required' => TRUE,
    ];
    $form['message_published'] = [
      '#type' => 'text_format',
      '#format' => 'basic_html',
      '#title' => $this->t('Alert published'),
      '#default_value' => $config->get('message_published'),
      '#description' => $this->t('Alert display to the user on the node edit form when an other user save a new published revision.') . '<br>' . $token_help,
      '#required' => TRUE,
    ];
    $form['interval'] = [
      '#type' => 'number',
      '#title' => $this->t('Interval'),
      '#description' => $this->t('On an edit node form, how often should we check for a new revision in seconds.'),
      '#default_value' => $config->get('interval'),
      '#min' => 5,
      '#step' => 1,
      '#field_suffix' => 's',
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    // Save message as formatted.
    $message_unpublished = $form_state->getValue('message_unpublished');
    if (!is_array($message_unpublished)) {
      return;
    }
    if (!isset($message_unpublished['value']) || !isset($message_unpublished['format'])) {
      return;
    }
    $message_unpublished = check_markup($message_unpublished['value'], $message_unpublished['format']);

    $message_published = $form_state->getValue('message_published');
    if (!is_array($message_published)) {
      return;
    }
    if (!isset($message_published['value']) || !isset($message_published['format'])) {
      return;
    }
    $message_published = check_markup($message_published['value'], $message_published['format']);

    $this->config('content_moderation_edit_notify.settings')
      ->set('interval', $form_state->getValue('interval'))
      ->set('message_unpublished', $message_unpublished)
      ->set('message_published', $message_published)
      ->save();

    parent::submitForm($form, $form_state);
  }

}
