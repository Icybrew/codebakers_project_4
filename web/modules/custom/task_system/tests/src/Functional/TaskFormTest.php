<?php

namespace Drupal\Tests\task_system\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * The class to test TaskForm.
 *
 * @group task_system
 * @package Drupal\Tests\task_system\Functional
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
   * Simple user.
   *
   * @var \Drupal\user\Entity\User
   */
  private $user;

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->user = $this->drupalCreateUser([
      'create task entity',
    ], 'simple_user');
  }

  /**
   * Test for the task entity form.
   *
   * @throws \Behat\Mink\Exception\ElementNotFoundException
   * @throws \Behat\Mink\Exception\ExpectationException
   */
  function testForm() {
    // Login as created user.
    $this->drupalLogin($this->user);

    // Create session.
    $session = $this->assertSession();

    // Get the task add form path from the route.
    $task_add_form = Url::fromRoute('entity.task.add_form');

    // Navigate to the task add form.
    $this->drupalGet($task_add_form);

    // Assure we loaded settings with proper permissions.
    $session->statusCodeEquals(200);

    // Check if all fields exists.
    $session->fieldExists('title');
    $session->fieldExists('description');
    $session->fieldExists('status');
    $session->fieldExists('external_link');
    $session->fieldExists('assigned_user');
    $session->fieldExists('assigned_mentor');
    $session->fieldExists('time_taken');
    $session->fieldExists('time_expected');

    // Field data for new task.
    $new_task = [
      'title' => 'simple task',
      'description' => 'Lorem ipsum',
      'status' => 'to_do',
      'assigned_user' => 'simple_user',
      'assigned_mentor' => 'simple_user',
      'time_expected' => 10,
    ];

    // Create new task.
    $this->drupalPostForm($task_add_form, $new_task, 'Save');

    // Check if response is 200.
    $session->statusCodeEquals(200);
  }

}
