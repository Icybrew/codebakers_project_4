<?php

namespace Drupal\task_system\Plugin\views\field;

use Drupal\Core\Url;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * Defines Views field plugin.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("task_complete")
 */
class TaskCompleteField extends FieldPluginBase {

  /**
   * {@inheritDoc}
   */
  public function query() {

  }

  /**
   * {@inheritDoc}
   */
  public function render(ResultRow $values) {
    if (($values->_entity->access('complete'))) {
      if (strtolower($values->_entity->getStatus()) !== 'done') {
        $url = Url::fromRoute('entity.task.complete_form', ['task' => $values->_entity->id()]);
        return [
          '#type' => 'link',
          '#title' => t('Complete Task'),
          '#url' => $url,
        ];
      }
      else {
        return [
          '#type' => 'markup',
          '#markup' => 'Completed',
        ];
      }
    }


    return [];
  }

}
