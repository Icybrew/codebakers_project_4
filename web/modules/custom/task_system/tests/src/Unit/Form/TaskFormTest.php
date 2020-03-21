<?php

namespace Drupal\Tests\task_system\Unit\Form;

use Drupal\Core\Form\FormState;
use Drupal\task_system\Form\TaskForm;
use Drupal\Tests\UnitTestCase;

/**
 * The class to test TaskForm class.
 *
 * @package Drupal\Tests\task_system\Unit\Form
 */
class TaskFormTest extends UnitTestCase {

  /**
   * Test for TaskForm.
   */
  public function testFields() {
    $task_form = $this->getMockBuilder(TaskForm::class)
      ->setMethods([
        't',
      ])
      ->disableOriginalConstructor()
      ->getMock();

    $task_form->method('t')
      ->will($this->returnCallback(function ($string) {
        return $string . ' (translated)';
      }));

    $output = $task_form->buildForm([], $this->getMockBuilder(FormState::class)->disableOriginalConstructor()->getMock());

    $this->assertTrue(is_array($output));
  }

}
