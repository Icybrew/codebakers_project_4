<?php


namespace Drupal\task_system\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityFormBuilderInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\task_system\TaskInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class TaskController.
 *
 * @package Drupal\task_system\Controller
 */
class TaskController extends ControllerBase {

  protected $entityFormBuilder;

  protected $entityTypeManager;


  public function __construct(EntityFormBuilderInterface $entityFormBuilder, EntityTypeManagerInterface $entityTypeManager) {
    $this->entityFormBuilder = $entityFormBuilder;
    $this->entityTypeManager = $entityTypeManager;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.form_builder'),
      $container->get('entity_type.manager')
    );
  }

//  function completeTask(TaskInterface $task) {
//    $form = $this->entityFormBuilder->getForm($task, 'complete');
//    return $form;
//  }
}
