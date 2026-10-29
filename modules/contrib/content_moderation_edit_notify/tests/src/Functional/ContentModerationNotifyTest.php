<?php

namespace Drupal\Tests\content_moderation_edit_notify\Functional;

use Drupal\filter\Entity\FilterFormat;
use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\content_moderation\Traits\ContentModerationTestTrait;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Test module main functionality.
 *
 * @group content_moderation_edit_notify
 */
class ContentModerationNotifyTest extends BrowserTestBase {
  use ContentModerationTestTrait;
  use StringTranslationTrait;

  /**
   * Permissions to grant admin user.
   *
   * @var array
   */
  protected $permissions = [
    'view latest version',
    'view any unpublished content',
    'use editorial transition create_new_draft',
    'use editorial transition publish',
    'use editorial transition archive',
    'use editorial transition archived_draft',
    'use editorial transition archived_published',
    'use text format basic_html',
    'create page content',
    'edit any page content',
  ];

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
   * An user with editing permissions.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $editor1;

  /**
   * An user with editing permissions.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $editor2;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    // Create a content type.
    $this->drupalCreateContentType(
      [
        'type' => 'page',
        'name' => 'Basic page',
      ]
    );

    // Create a workflow on this content type.
    $workflow = $this
      ->createEditorialWorkflow();
    $workflow
      ->getTypePlugin()
      ->addEntityTypeAndBundle('node', 'page');
    $workflow
      ->save();

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

    $this->editor1 = $this
      ->drupalCreateUser($this->permissions);

    $this->editor2 = $this
      ->drupalCreateUser($this->permissions);
  }

  /**
   * Tests the Controller.
   */
  public function testController() {
    $config = $this->config('content_moderation_edit_notify.settings');
    /** @var \Drupal\token\Token $tokenService */
    $tokenService = \Drupal::service('token');

    // Login.
    $this->drupalLogin($this->editor1);
    $this->drupalGet('node/add/page');

    // Create new moderated content in draft.
    $this->submitForm([
      'title[0][value]' => 'Draft page',
      'body[0][value]' => 'First version of the page.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));

    $node_draft = $this->drupalGetNodeByTitle('Draft page');
    $nid = $node_draft->id();
    $vid_draft = $node_draft->vid->value;

    $checkUrl = '/content_moderation_edit_notify/' . $nid . '/' . $vid_draft . '/check';
    $this->drupalGet($checkUrl);
    // Result is good as no change occur.
    $this->assertSession()->responseContains("[]");

    $this->drupalGet('node/' . $nid . '/edit');

    // Update the node.
    $this->submitForm([
      'title[0][value]' => 'Draft node rev2',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));

    $node_draft2 = $this->drupalGetNodeByTitle('Draft node rev2');
    $vid_draft_edited = $node_draft2->vid->value;

    $checkUrl = '/content_moderation_edit_notify/' . $nid . '/' . $vid_draft . '/check';
    $this->drupalGet($checkUrl);
    $page = $this->getSession()->getPage()->getContent();
    $json = json_decode($page);
    $config_message = $tokenService
      ->replace($config->get('message_unpublished'), ['node' => $node_draft2]);
    // Test if we have the unpublished message.
    $this->assertEquals($config_message, $json[2]->message);

    $json = $config_message = '';
    $this->drupalGet('node/' . $nid . '/edit');

    // Now make it published.
    $this->submitForm([
      'title[0][value]' => 'Published node',
      'moderation_state[0][state]' => 'published',
    ], $this->t('Save'));

    $node = $this->drupalGetNodeByTitle('Published node');
    $checkUrl = '/content_moderation_edit_notify/' . $nid . '/' . $vid_draft_edited . '/check';
    $this->drupalGet($checkUrl);
    $page = $this->getSession()->getPage()->getContent();
    $json = json_decode($page);
    $config_message = $config->get('message_published');
    // Force status replaced as token will not be refreshed.
    $config_message = str_replace('[node:latest_revision_state]', 'published', $config_message);

    $config_message = $tokenService
      ->replace($config_message, ['node' => $node]);
    // Test if we have the published message.
    $this->assertEquals(strip_tags($config_message), strip_tags($json[2]->message));
  }

}
