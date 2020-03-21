<?php

namespace Drupal\Tests\register_role_selection\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * The class to test UserRegisterForm class.
 *
 * @group register_role_selection
 * @package Drupal\Tests\register_role_selection\Functional
 */
class UserRegisterFormTest extends BrowserTestBase {

  /**
   * The modules to load to run the test.
   *
   * @var array
   */
  public static $modules = [
    'user',
    'register_role_selection',
  ];

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();
  }

  /**
   * Test for the drupal register form.
   */
  public function testLoginForm() {
    // Creating session.
    $session = $this->assertSession();

    // Get the user register form path from route.
    $user_login_form_route = Url::fromRoute('user.register');

    // Navigate to the user register form.
    $this->drupalGet($user_login_form_route);

    // Assure we loaded login form.
    $session->statusCodeEquals(200);

    // Check if field 'role' exists.
    $session->fieldExists('role');
  }

}
