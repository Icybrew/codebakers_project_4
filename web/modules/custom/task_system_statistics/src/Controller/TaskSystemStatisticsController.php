<?php

namespace Drupal\task_system_statistics\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\task_system\Entity\Task;

/**
 * Returns responses for Task system statistics routes.
 */
class TaskSystemStatisticsController extends ControllerBase {

  /**
   * Statistics response.
   */
  public function statistics() {
    $tasks = Task::loadMultiple();

    $total = count($tasks);
    $done = count(array_filter($tasks, function ($task) {
      return $task->getStatus() === 'Done';
    }));
    $todo = count(array_filter($tasks, function ($task) {
      return $task->getStatus() === 'to_do';
    }));
    $inProgress = count(array_filter($tasks, function ($task) {
      return $task->getStatus() === 'in_progress';
    }));

    return [
      '#theme' => 'statistics',
      '#attached' => [
        'library' => [
          'task_system_statistics/task_system_statistics',
        ],
        'drupalSettings' => [
          'tasks' => [
            'total' => $total,
            'done' => $done,
            'todo' => $todo,
            'inProgress' => $inProgress,
          ],
        ],
      ],
    ];

  }

}
