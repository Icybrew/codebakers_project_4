<?php


namespace Drupal\task_system;

use Drupal\views\EntityViewsData;

/**
 * Provides task data for views.
 *
 * @package Drupal\task_system
 */
class TaskViewsData extends EntityViewsData {

  /**
   * {@inheritDoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['views']['create_task_button'] = [
      'group' => $this->t('Task'),
      'title' => $this->t('Create Task button'),
      'help' => $this->t('This creates add task button.'),
      'area' => [
        'id' => 'create_task_button',
      ],
    ];

    $data['views']['link_to_task_complete'] = [
      'group' => $this->t('Task'),
      'title' => $this->t('Link to complete Task'),
      'field' => [
        'help' => $this->t('Provides a link to task complete form.'),
        'id' => 'task_complete',
      ],
    ];

    return $data;
  }

}
