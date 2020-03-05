<?php


namespace Drupal\task_system;


use Drupal\views\EntityViewsData;

class TaskViewsData extends EntityViewsData {

  public function getViewsData() {
    $data = parent::getViewsData();

    $data['views']['create_task_button'] = [
      'group' => t('Task System'),
      'title' => t('Create Task button'),
      'help' => t('This creates add task button.'),
      'area' => [
        'id' => 'create_task_button',
      ],
    ];

    return $data;
  }

}
