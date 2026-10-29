<?php

namespace Drupal\Tests\content_moderation_edit_notify\Functional;

use Drupal\filter\Entity\FilterFormat;
use Drupal\Tests\BrowserTestBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Test module settings.
 *
 * @group content_moderation_edit_notify
 */
class ContentModerationNotifyConfigTest extends BrowserTestBase {
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'node',
    'filter',
    'content_moderation',
    'content_moderation_edit_notify',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * An user with admin permissions.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    // Set up the filter formats used by this test.
    $basic_html_format = FilterFormat::create([
      'format' => 'basic_html',
      'name' => 'Basic HTML',
      'filters' => [
        'filter_html' => [
          'status' => 1,
          'settings' => [
            'allowed_html' => '<p> <br> <strong> <a> <em>',
          ],
        ],
      ],
    ]);
    $basic_html_format
      ->save();

    $this->adminUser = $this
      ->drupalCreateUser([
        'administer site configuration',
        $basic_html_format
          ->getPermissionName(),
      ]);

  }

  /**
   * Tests the config form.
   */
  public function testConfigForm() {
    // Login.
    $this->drupalLogin($this->adminUser);

    // Access config page.
    $this->drupalGet('admin/config/system/content_moderation_edit_notify');
    $this->assertSession()->statusCodeEquals(200);

    // Test the form elements exist and have defaults.
    $config = $this->config('content_moderation_edit_notify.settings');

    $this->assertSession()->fieldValueEquals(
      'edit-message-unpublished-value',
      $config->get('message_unpublished')
    );
    $this->assertSession()->fieldValueEquals(
      'edit-message-published-value',
      $config->get('message_published')
    );
    $this->assertSession()->fieldValueEquals(
      'interval',
      $config->get('interval')
    );

    // Test form submission.
    $txt_unpublished = 'Test unpublished \nTest unpublished';
    $txt_published = 'Test published \nTest published';
    $this->submitForm([
      'interval' => '20',
      'edit-message-unpublished-value' => $txt_unpublished,
      'edit-message-published-value' => $txt_published,
    ], $this->t('Save configuration'));

    $this->assertSession()->pageTextContains('The configuration options have been saved.');

    $this->assertSession()->fieldValueEquals(
      'edit-message-unpublished-value',
      $txt_unpublished
    );
    $this->assertSession()->fieldValueEquals(
      'edit-message-published-value',
      $txt_published
    );
    $this->assertSession()->fieldValueEquals(
      'interval',
      '20'
    );

  }

}
