<?php

namespace Drupal\task_system\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityFormBuilderInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the task system routes.
 *
 * @package Drupal\task_system\Controller
 */
class TaskController extends ControllerBase {

  /**
   * The Entity Form Builder.
   *
   * @var \Drupal\Core\Entity\EntityFormBuilderInterface
   *   Entity Form Builder.
   */
  protected $entityFormBuilder;

  /**
   * The Entity Type Manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   *   Entity Type Manager.
   */
  protected $entityTypeManager;

  /**
   * TaskController constructor.
   *
   * @param \Drupal\Core\Entity\EntityFormBuilderInterface $entityFormBuilder
   *   The Entity Form Builder.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The Entity Type Manager.
   */
  public function __construct(EntityFormBuilderInterface $entityFormBuilder, EntityTypeManagerInterface $entityTypeManager) {
    $this->entityFormBuilder = $entityFormBuilder;
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.form_builder'),
      $container->get('entity_type.manager')
    );
  }

}
