<?php

namespace Drupal\Tests\task_system_statistics\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * The class to test task_system_statistics routes.
 *
 * @group task_system_statistics
 * @package Drupal\Tests\task_system_statistics\Functional
 */
class StatisticsRouteTest extends BrowserTestBase {

  /**
   * The modules to load to run the test.
   *
   * @var array
   */
  public static $modules = [
    'user',
    'task_system_statistics',
  ];

  /**
   * A simple user.
   *
   * @var \Drupal\user\Entity\User
   */
  private $user;

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->user = $this->drupalCreateUser([]);
  }

  function testRoute() {
    // Login as created user.
    $this->drupalLogin($this->user);

    // Create session.
    $session = $this->assertSession();

    // Get the statistics path from the route.
    $statistics_path = Url::fromRoute('task_system_statistics.statistics');

    // Navigate to the statistics page.
    $this->drupalGet($statistics_path);

    // Assure we loaded statistics page.
    $session->statusCodeEquals(200);
  }
}
