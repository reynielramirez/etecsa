<?php

namespace Drupal\Tests\content_moderation_edit_notify\FunctionalJavascript;

use Behat\Mink\Session;

/**
 * Tests Functional Javascript.
 *
 * @group content_moderation_edit_notify
 */
class ContentModerationNotifyLocaleJsTest extends ContentModerationNotifyTestBase {

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
    'locale',
    'content_translation',
  ];
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
    'create content translations',
    'update content translations',
    'translate any entity',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->drupalLogin($this->rootUser);
    $this->drupalGet('admin/config/regional/language/add');
    // Add French languages.
    $this->submitForm(['predefined_langcode' => 'fr'], $this->t('Add language'));
    // Enable content translation on pages.
    $this->drupalGet('admin/config/regional/content-language');
    $edit = [
      'entity_types[node]' => TRUE,
      'settings[node][page][translatable]' => TRUE,
      'settings[node][page][settings][language][language_alterable]' => TRUE,
    ];
    $this->submitForm($edit, $this->t('Save configuration'));
    // Adding languages requires a container rebuild in the test running
    // environment so that multilingual services are used.
    $this->rebuildContainer();
    $this->drupalLogout();
  }

  /**
   * Tests a node that is concurrently edited in two different languages.
   *
   * Test on the full node form in two different languages. Must have no
   * messages for different languages edition.
   */
  public function testConcurrentEditLocaleDiff() {
    $assert = $this->assertSession();
    // Editor 1 login to create an English and French translation.
    $this->drupalLogin($this->editor1);
    $this->drupalGet('node/add/page');

    // Create new moderated content in draft in English.
    $this->submitForm([
      'title[0][value]' => 'English node Draft',
      'langcode[0][value]' => 'en',
      'body[0][value]' => 'First version of the page in ENGLISH.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page English node Draft has been created.');

    $node = $this->drupalGetNodeByTitle('English node Draft');
    $nid = $node->id();
    $en_edit_path = 'node/' . $nid . '/edit';
    $fr_edit_path = 'fr/node/' . $nid . '/edit';

    $this->assertEquals($node->language()->getId(), 'en');

    // Add a French translation.
    $this->drupalGet('node/' . $nid . '/translations');
    $this->clickLink($this->t('Add'));
    $edit = [
      'title[0][value]' => 'French node Draft',
      'body[0][value]' => 'First version of the page in FRENCH.',
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, $this->t('Save (this translation)'));

    // Open English version for editing.
    $this->drupalGet($en_edit_path);
    $assert->pageTextContains('Edit Basic page English node Draft');

    // Switch to a concurrent session and save an edit change.
    // We need to do some bookkeeping to keep track of the logged in user.
    $loggedInEditor1 = $this->loggedInUser;
    $this->loggedInUser = FALSE;
    // Register a session to preform concurrent editing.
    $driver = $this->getDefaultDriverInstance();
    $session = new Session($driver);
    $this->mink->registerSession('concurrent', $session);
    $this->mink->setDefaultSessionName('concurrent');
    $this->initFrontPage();

    // As editor 2 we edit the French version.
    $this->drupalLogin($this->editor2);
    $this->drupalGet($fr_edit_path);

    $assert = $this->assertSession();
    $page = $this->getSession()->getPage();

    // Ensure different save timestamps for field editing.
    sleep(2);

    $this->submitForm([
      'title[0][value]' => 'French node Draft EDITED',
      'body[0][value]' => 'Edited version of the page in FRENCH.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page French node Draft EDITED has been updated.');

    $loggedInEditor2 = $this->loggedInUser;

    // Switch back to the default session for editor1.
    $this->mink->setDefaultSessionName('default');
    $this->loggedInUser = $loggedInEditor1;

    // Wait for the js message to appear.
    // Method assertWaitOnAjaxRequest is not working probably because of
    // sessions switch.
    sleep($this->interval);

    $this->createScreenshot($this->root. '/sites/simpletest/browser_output/edit_page_draft_locale_diff_no_message.png');

    // We want no message.
    $this->assertSession()->pageTextNotContains('unpublished revision');
    $this->assertSession()->pageTextNotContains('published revision');

    // Refresh the edit page.
    $this->drupalGet($en_edit_path);

    // Switch back to the concurrent session for editor2 and publish French.
    $this->mink->setDefaultSessionName('concurrent');

    $this->loggedInUser = $loggedInEditor2;
    $this->drupalGet($fr_edit_path);
    $this->submitForm([
      'title[0][value]' => 'French node Published EDITED',
      'body[0][value]' => 'Edited version of the page in FRENCH - Published.',
      'moderation_state[0][state]' => 'published',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page French node Published EDITED has been updated.');

    // Check message for editor 1.
    $this->mink->setDefaultSessionName('default');
    $this->loggedInUser = $loggedInEditor1;

    // Wait for the js message to appear.
    sleep($this->interval);

    $this->createScreenshot($this->root . '/sites/simpletest/browser_output/edit_page_published_locale_diff_no_message.png');

    // We want no message.
    $this->assertSession()->pageTextNotContains('unpublished revision');
    $this->assertSession()->pageTextNotContains('published revision');
  }

  /**
   * Tests a node that is concurrently edited in the same language.
   *
   * Test on the full node form in the same language. Must have messages for
   * same language edition.
   */
  public function testConcurrentEditLocaleSame() {
    $assert = $this->assertSession();
    // Editor 1 login to create an English and French translation.
    $this->drupalLogin($this->editor1);
    $this->drupalGet('node/add/page');

    // Create new moderated content in draft in English.
    $this->submitForm([
      'title[0][value]' => 'English node Draft',
      'langcode[0][value]' => 'en',
      'body[0][value]' => 'First version of the page in ENGLISH.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page English node Draft has been created.');

    $node = $this->drupalGetNodeByTitle('English node Draft');
    $nid = $node->id();
    $fr_edit_path = 'fr/node/' . $nid . '/edit';

    $this->assertEquals($node->language()->getId(), 'en');

    // Add a French translation.
    $this->drupalGet('node/' . $nid . '/translations');
    $this->clickLink($this->t('Add'));
    $edit = [
      'title[0][value]' => 'French node Draft',
      'body[0][value]' => 'First version of the page in FRENCH.',
      'moderation_state[0][state]' => 'draft',
    ];
    $this->submitForm($edit, $this->t('Save (this translation)'));

    // Open French version for editing.
    $this->drupalGet($fr_edit_path);
    $assert->pageTextContains('Edit Basic page French node Draft [French translation]');

    // Switch to a concurrent session and save an edit change.
    // We need to do some bookkeeping to keep track of the logged in user.
    $loggedInEditor1 = $this->loggedInUser;
    $this->loggedInUser = FALSE;
    // Register a session to preform concurrent editing.
    $driver = $this->getDefaultDriverInstance();
    $session = new Session($driver);
    $this->mink->registerSession('concurrent', $session);
    $this->mink->setDefaultSessionName('concurrent');
    $this->initFrontPage();

    // As editor 2 we edit the French version.
    $this->drupalLogin($this->editor2);
    $this->drupalGet($fr_edit_path);
    $assert->pageTextContains('Edit Basic page French node Draft [French translation]');

    $assert = $this->assertSession();
    $page = $this->getSession()->getPage();

    // Ensure different save timestamps for field editing.
    sleep(2);
    $this->submitForm([
      'title[0][value]' => 'French node Draft EDITED',
      'body[0][value]' => 'Edited version of the page in FRENCH.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page French node Draft EDITED has been updated.');

    $loggedInEditor2 = $this->loggedInUser;

    // Switch back to the default session for editor1.
    $this->mink->setDefaultSessionName('default');
    $this->loggedInUser = $loggedInEditor1;

    // Wait for the js message to appear.
    // Method assertWaitOnAjaxRequest is not working probably because of
    // sessions switch.
    sleep($this->interval);

    $this->createScreenshot($this->root. '/sites/simpletest/browser_output/edit_page_draft_locale_message.png');

    $this->assertSession()->pageTextContains('unpublished revision');

    // Refresh the edit page.
    $this->drupalGet($fr_edit_path);

    // Switch back to the concurrent session for editor 2 and publish French.
    $this->mink->setDefaultSessionName('concurrent');

    $this->loggedInUser = $loggedInEditor2;
    $this->drupalGet($fr_edit_path);
    $this->submitForm([
      'title[0][value]' => 'French node Published EDITED',
      'body[0][value]' => 'Edited version of the page in FRENCH - Published.',
      'moderation_state[0][state]' => 'published',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page French node Published EDITED has been updated.');

    // Check message for editor 1.
    $this->mink->setDefaultSessionName('default');
    $this->loggedInUser = $loggedInEditor1;

    // Wait for the js message to appear.
    sleep($this->interval);

    $this->createScreenshot($this->root . '/sites/simpletest/browser_output/edit_page_published_locale_message.png');
    $this->assertSession()->pageTextContains('published revision');
  }

}
