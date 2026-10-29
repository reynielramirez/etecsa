<?php

namespace Drupal\Tests\email_attachment\Kernel;

use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use Drupal\Core\File\Exception\FileNotExistsException;
use Drupal\KernelTests\Core\Entity\EntityKernelTestBase;

/**
 * Tests the sending of customer emails.
 */
#[RunTestsInSeparateProcesses]
class EmailAttachmentTest extends EntityKernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'email_attachment',
  ];

  /**
   * The mail manager.
   *
   * @var \Drupal\Core\Mail\MailManagerInterface
   */
  private $mailManager;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->mailManager = \Drupal::service('plugin.manager.mail');
  }

  /**
   * Test invalid attachment type.
   */
  public function testInvalidParamType() {
    $this->expectException(\TypeError::class);
    $params['attachment'] = 'this_should_be_an_array';

    /** @var \Drupal\Core\Mail\MailManager $mail_manager */
    $mail_manager = \Drupal::service('plugin.manager.mail');
    $mail_manager->mail('email_attachment', 'test_key', 'tester@the-best-domain.com', 'en', $params);
  }

  /**
   * Test valid attachment.
   */
  public function testValidAttachment() {
    $params['attachment'] = [
      'filename' => '/home/www/data/用户.txt',
      'filecontent' => 'A',
    ];

    $this->assertBody($params);
  }

  /**
   * Test an attachment with long filename.
   */
  public function testVeryLongFilename() {
    $long_string =
      "0_________1_________2_________3_________4________" .
      "5_________6_________7_________8_________9________" .
      "10________11________12________13________14_______" .
      "15________16________17________18________19________20";
    $params['attachment'] = [
      'filename' => $long_string,
      'filecontent' => $long_string,
    ];

    $output = $this->mailManager->mail('email_attachment', 'test_key', 'tester@the-best-domain.com', 'en', $params);

    /* phpcs:disable Drupal.Strings.UnnecessaryStringConcat.Found */
    /* @noinspection SpellCheckingInspection */
    self::assertStringContainsString("Content-Type: application/octet-stream;\n" .
      "    name*0=\"0_________1_________2_________3_________4________5_________6\";\n" .
      "    name*1=\"_________7_________8_________9________10________11________12\";\n" .
      "    name*2=\"________13________14_______15________16________17________18_\";\n" .
      "    name*3=\"_______19________20\"\n" .
      "Content-Transfer-Encoding: base64\n" .
      "Content-Disposition: attachment;\n" .
      "    filename*0=\"0_________1_________2_________3_________4________5______\";\n" .
      "    filename*1=\"___6_________7_________8_________9________10________11__\";\n" .
      "    filename*2=\"______12________13________14_______15________16________1\";\n" .
      "    filename*3=\"7________18________19________20\"\n\n" .
      "MF9fX19fX19fXzFfX19fX19fX18yX19fX19fX19fM19fX19fX19fXzRfX19fX19fXzVfX19fX19f\n" .
      "X182X19fX19fX19fN19fX19fX19fXzhfX19fX19fX185X19fX19fX18xMF9fX19fX19fMTFfX19f\n" .
      "X19fXzEyX19fX19fX18xM19fX19fX19fMTRfX19fX19fMTVfX19fX19fXzE2X19fX19fX18xN19f\n" .
      "X19fX19fMThfX19fX19fXzE5X19fX19fX18yMA==\n\n", $output['body']);
    /* phpcs:enable */
  }

  /**
   * Test multiple valid attachments.
   */
  public function testValidAttachments() {
    $params['attachments'] =
      [
        [
          'filename' => '/home/www/data/用户.txt',
          'filecontent' => 'A',
        ],
      ];

    $this->assertBody($params);
  }

  /**
   * Test missing file attachment.
   */
  public function testWithMissingFile() {
    $this->expectException(FileNotExistsException::class);
    $this->assertBody(['attachment' => ['filename' => 'missing.txt']]);
  }

  /**
   * Test file attachment.
   */
  public function testWithExistingFile() {
    $filename = '/tmp/用户.txt';
    file_put_contents($filename, 'A');
    $this->assertBody(['attachment' => ['filename' => $filename]]);
  }

  /**
   * Check email attachment.
   */
  private function assertBody($params): void {
    $output = $this->mailManager->mail('email_attachment', 'test_key', 'tester@the-best-domain.com', 'en', $params);
    self::assertStringContainsString('Content-Type: text/plain;
    name*0="yonghu.txt"
Content-Transfer-Encoding: base64
Content-Disposition: attachment;
    filename*0="yonghu.txt"

QQ==
', $output['body']);
  }

}
