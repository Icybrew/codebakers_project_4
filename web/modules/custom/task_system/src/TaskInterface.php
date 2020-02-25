<?php

namespace Drupal\task_system;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a task entity entity type.
 */
interface TaskInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the task entity title.
   *
   * @return string
   *   Title of the task entity.
   */
  public function getTitle();

  /**
   * Sets the task entity title.
   *
   * @param string $title
   *   The task entity title.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity entity.
   */
  public function setTitle($title);

  /**
   * Gets the task entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the task entity.
   */
  public function getCreatedTime();

  /**
   * Sets the task entity creation timestamp.
   *
   * @param int $timestamp
   *   The task entity creation timestamp.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Sets the task entity status.
   *
   * @param bool $status
   *   TRUE to enable this task entity, FALSE to disable.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity entity.
   */
  public function setStatus($status);

}
