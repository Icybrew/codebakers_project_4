<?php


namespace Drupal\task_system;


use Drupal\views\EntityViewsData;

class TaskViewsData extends EntityViewsData {

  public function getViewsData() {
    $data = parent::getViewsData();

    $data['views']['create_task_button'] = [
      'group' => t('Task'),
      'title' => t('Create Task button'),
      'help' => t('This creates add task button.'),
      'area' => [
        'id' => 'create_task_button',
      ],
    ];

    $data['views']['link_to_task_complete'] = [
      'group' => t('Task'),
      'title' => t('Link to complete Task'),
      'field' => [
        'help' => t('Provides a link to task complete form.'),
        'id' => 'task_complete',
      ],
    ];

    return $data;
  }

}
