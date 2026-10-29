<?php

namespace Drupal\Tests\content_moderation_edit_notify\FunctionalJavascript;

use Behat\Mink\Session;

/**
 * Tests Functional Javascript.
 *
 * @group content_moderation_edit_notify
 */
class ContentModerationNotifyJsTest extends ContentModerationNotifyTestBase {

  /**
   * Tests a node that is concurrently edited on the full node form.
   */
  public function testConcurrentEdit() {
    $assert = $this->assertSession();
    // Editor 1 login to create a moderated content.
    $this->drupalLogin($this->editor1);
    $this->drupalGet('node/add/page');

    // Create new moderated content in draft.
    $this->submitForm([
      'title[0][value]' => 'Draft page',
      'body[0][value]' => 'First version of the page.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page Draft page has been created.');

    $node = $this->drupalGetNodeByTitle('Draft page');
    $nid = $node->id();
    $edit_path = 'node/' . $nid . '/edit';

    // Open version for editing.
    $this->drupalGet($edit_path);
    $assert->pageTextContains('Edit Basic page Draft page');

    // Switch to a concurrent session and save a node change.
    // We need to do some bookkeeping to keep track of the logged in user.
    $loggedInEditor1 = $this->loggedInUser;
    $this->loggedInUser = FALSE;
    // Register a session to preform concurrent editing.
    $driver = $this->getDefaultDriverInstance();
    $session = new Session($driver);
    $this->mink->registerSession('concurrent', $session);
    $this->mink->setDefaultSessionName('concurrent');
    $this->initFrontPage();

    // As editor 2 we edit the content and save.
    $this->drupalLogin($this->editor2);
    $this->drupalGet($edit_path);

    $assert = $this->assertSession();
    $page = $this->getSession()->getPage();

    // Ensure different save timestamps for field editing.
    sleep(2);

    $this->submitForm([
      'title[0][value]' => 'Draft page EDITED',
      'body[0][value]' => 'Edited version of the page.',
      'moderation_state[0][state]' => 'draft',
    ], $this->t('Save'));

    $assert->pageTextContains('Basic page Draft page EDITED has been updated.');

    $loggedInEditor2 = $this->loggedInUser;

    // Switch back to the default session for editor 1.
    $this->mink->setDefaultSessionName('default');
    $this->loggedInUser = $loggedInEditor1;

    // Wait for the js message to appear.
    // Method assertWaitOnAjaxRequest is not working probably because of
    // sessions switch.
    sleep($this->interval);

    $this->createScreenshot($this->root . '/sites/simpletest/browser_output/edit_page_draft_message.png');

    $this->assertSession()->pageTextContains('unpublished revision');

    // Refresh the edit page.
    $this->drupalGet($edit_path);

    // Switch back to the concurrent session for editor 2 and publish.
    $this->mink->setDefaultSessionName('concurrent');

    $this->loggedInUser = $loggedInEditor2;
    $this->drupalGet($edit_path);
    $this->submitForm([
      'title[0][value]' => 'Published page',
      'body[0][value]' => 'Published version of the page.',
      'moderation_state[0][state]' => 'published',
    ], $this->t('Save'));
    $assert->pageTextContains('Basic page Published page has been updated.');

    // Check message for editor 1.
    $this->mink->setDefaultSessionName('default');
    $this->loggedInUser = $loggedInEditor1;

    // Wait for the js message to appear.
    sleep($this->interval);

    $this->createScreenshot($this->root . '/sites/simpletest/browser_output/edit_page_published_message.png');

    $this->assertSession()->pageTextContains('published revision');
  }

}
