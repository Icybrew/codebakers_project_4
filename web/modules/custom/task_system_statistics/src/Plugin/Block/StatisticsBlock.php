<?php

namespace Drupal\task_system_statistics\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\task_system\Entity\Task;

/**
 * Provides an task system statistics block.
 *
 * @Block(
 *   id = "task_system_statistics_block",
 *   admin_label = @Translation("Tasks Statistics"),
 *   category = @Translation("Task system")
 * )
 */
class StatisticsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $tasks = Task::loadMultiple();

    $todo = count(array_filter($tasks, function ($task) {
      return $task->getStatus() === 'to_do';
    }));
    $inProgress = count(array_filter($tasks, function ($task) {
      return $task->getStatus() === 'in_progress';
    }));
    $done = count(array_filter($tasks, function ($task) {
      return $task->getStatus() === 'Done';
    }));

    return [
      '#theme' => 'statistics-block',
      '#attached' => [
        'library' => [
          'task_system_statistics/task_system_statistics_block',
        ],
        'drupalSettings' => [
          'tasks' => [
            'todo' => $todo,
            'inProgress' => $inProgress,
            'done' => $done,
          ],
        ],
      ],
    ];
  }

}
