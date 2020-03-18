<?php


namespace Drupal\Tests\task_system_tests\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test the task form.
 *
 * @package Drupal\Tests\task_system_tests\Functional
 *
 * @group task_system_tests
 */
class TaskFormTest extends BrowserTestBase {

  /**
   * The modules to load to run the test.
   *
   * @var array
   */
  public static $modules = [
    'user',
    'task_system',
  ];

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();
  }

  function testForm() {

  }

}
