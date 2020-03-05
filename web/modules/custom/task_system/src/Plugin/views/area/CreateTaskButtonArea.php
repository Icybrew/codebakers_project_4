<?php

namespace Drupal\task_system\Plugin\views\area;

use Drupal\Core\Url;
use Drupal\views\Plugin\views\area\AreaPluginBase;

/**
 * Defines Views area plugin.
 *
 * @ingroup views_area_handlers
 *
 * @ViewsArea("create_task_button")
 */
class CreateTaskButtonArea extends AreaPluginBase {

  /**
   * @inheritDoc
   */
  public function render($empty = FALSE) {
    $url = Url::fromRoute('entity.task.add_form');
    return [
      '#markup' => '<a href="' . $url->toString() . '"><button>Create new Task</button></a>',
    ];
  }

}
