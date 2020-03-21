<?php

namespace Drupal\Tests\mail_auth\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Class MailAuthLoginTest.
 *
 * @package Drupal\Tests\mail_auth\Functional
 */
class MailAuthLoginTest extends BrowserTestBase {

  /**
   * The modules to load to run the test.
   *
   * @var array
   */
  public static $modules = [
    'user',
    'mail_auth',
  ];

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();
  }

  /**
   * Test for the drupal login form.
   */
  public function testLoginForm() {
    // Creating user.
    $user = $this->drupalCreateUser([], 'testUser123');

    // Creating session.
    $session = $this->assertSession();

    // Get the user login form path from route.
    $user_login_form_route = Url::fromRoute('user.login');

    // Navigate to the user login form.
    $this->drupalGet($user_login_form_route);

    // Assure we loaded login form.
    $session->statusCodeEquals(200);

    // Check if field 'name' exists.
    $session->fieldExists('name');
  }

}
