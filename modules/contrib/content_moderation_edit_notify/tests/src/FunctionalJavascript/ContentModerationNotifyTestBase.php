<?php

namespace Drupal\Tests\content_moderation_edit_notify\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\Tests\content_moderation\Traits\ContentModerationTestTrait;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Defines a base class for content moderation notify tests.
 */
abstract class ContentModerationNotifyTestBase extends WebDriverTestBase {
  use ContentModerationTestTrait;
  use StringTranslationTrait;

  /**
   * Permissions to grant admin user.
   *
   * @var array
   */
  protected $editorPermissions = [
    'view latest version',
    'view any unpublished content',
    'use editorial transition create_new_draft',
    'use editorial transition publish',
    'use editorial transition archive',
    'use editorial transition archived_draft',
    'use editorial transition archived_published',
    'create page content',
    'edit any page content',
    'view page revisions',
  ];

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'block',
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
   * An user with permissions to create and edit articles.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $editor1;

  /**
   * An user with permissions to create and edit articles.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $editor2;

  /**
   * Time to wait for the notification, in s.
   *
   * @var int
   */
  protected $interval;

  /**
   * Root path for images.
   *
   * @var string
   */
  protected $root;

  /**
   * Sets the test up.
   */
  protected function setUp(): void {
    parent::setUp();
    $this->root = \Drupal::root();

    // Create content type.
    $this->drupalCreateContentType([
      'type' => 'page',
      'name' => 'Basic page',
    ]);
    // Create a workflow on this content type.
    $workflow = $this->createEditorialWorkflow();

    $workflow->getTypePlugin()->addEntityTypeAndBundle('node', 'page');
    $workflow->save();
    $this->drupalPlaceBlock('local_tasks_block', ['id' => 'tabs_block']);
    $this->drupalPlaceBlock('page_title_block');
    $this->drupalPlaceBlock('local_actions_block', ['id' => 'actions_block']);
    // Create editors.
    $this->editor1 = $this->drupalCreateUser($this->editorPermissions);
    $this->editor2 = $this->drupalCreateUser($this->editorPermissions);

    $assert = $this->assertSession();
    // Reduce notify interval to 5s to speed our tests.
    $this->drupalLogin($this->rootUser);

    $edit = [
      'message_unpublished[format]' => 'plain_text',
      'message_published[format]' => 'plain_text',
      'interval' => 5,
    ];
    $this->interval = 6;
    $this->drupalGet('admin/config/system/content_moderation_edit_notify');
    $this->submitForm($edit, $this->t('Save configuration'));

    $assert->pageTextContains('The configuration options have been saved.');
    $this->drupalLogout();
  }

}
