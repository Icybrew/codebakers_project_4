<?php

namespace Drupal\Tests\task_system\Unit\Controller;

use Drupal\task_system\Controller\TaskController;
use Drupal\Tests\UnitTestCase;

/**
 * The class to test TaskController class.
 *
 * @group task_system
 * @package Drupal\Tests\task_system\Unit\Controller
 */
class TaskControllerTest extends UnitTestCase {

  /**
   * Test for TaskController.
   */
  public function testController() {
    $controller = $this->getMockBuilder(TaskController::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertEquals(TRUE, is_object($controller));
  }

}
