<?php

namespace Drupal\task_system\Entity\Routing;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\AdminHtmlRouteProvider;
use Symfony\Component\Routing\Route;

/**
 * Provides routes for Task entity.
 *
 * @package Drupal\task_system\Entity\Routing
 */
class TaskHtmlRouteProvider extends AdminHtmlRouteProvider {

  /**
   * {@inheritDoc}
   */
  public function getRoutes(EntityTypeInterface $entity_type) {
    $routes = parent::getRoutes($entity_type);

    if ($complete_form_route = $this->getCompleteFormRoute($entity_type)) {
      $routes->add("entity.{$entity_type->id()}.complete_form", $complete_form_route);
    }

    return $routes;
  }

  /**
   * Returns complete form route.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   Takes entity type.
   *
   * @return \Symfony\Component\Routing\Route
   *   Returns complete form route.
   */
  protected function getCompleteFormRoute(EntityTypeInterface $entity_type) {
    if ($entity_type->hasLinkTemplate('complete-form')) {
      $entity_type_id = $entity_type->id();
      $route = new Route($entity_type->getLinkTemplate('complete-form'));

      // Use the confirm form handler, if available, otherwise default.
      $operation = 'default';
      if ($entity_type->getFormClass('complete')) {
        $operation = 'complete';
      }
      $route
        ->setDefaults([
          '_entity_form' => "{$entity_type_id}.{$operation}",
          '_title_callback' => '\\Drupal\\Core\\Entity\\Controller\\EntityController::editTitle',
        ])
        ->setRequirement('_entity_access', "{$entity_type_id}.update")
        ->setOption('parameters', [
          $entity_type_id => [
            'type' => 'entity:' . $entity_type_id,
          ],
        ]);

      // Entity types with serial IDs can specify this in their route
      // requirements, improving the matching process.
      if ($this->getEntityTypeIdKeyType($entity_type) === 'integer') {
        $route->setRequirement($entity_type_id, '\\d+');
      }
      return $route;
    }
  }

}
