<?php

namespace Drupal\email_attachment\Hook;

use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for email_attachment.
 */
class EmailAttachmentHooks {

  /**
   * Implements hook_mail_alter().
   *
   * Check if attachment was specified in message params.
   */
  #[Hook('mail_alter')]
  public function mailAlter(array &$message) {
    if (!empty($message['params']['attachment']) || !empty($message['params']['attachments'])) {
      _email_attachment_convert_to_multipart($message);
    }
  }

}
