<?php

namespace Drupal\task_system;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\UserInterface;

/**
 * Provides an interface defining a task entity type.
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
   * Sets task entity title.
   *
   * @param string $title
   *   The task entity title.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setTitle($title);

  /**
   * Gets the task entity description.
   *
   * @return string
   *   Description of the task entity.
   */
  public function getDescription();

  /**
   * Sets task entity description.
   *
   * @param string $description
   *   The task entity description.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setDescription($description);

  /**
   * Gets the task entity status.
   *
   * @return string
   *   Status of the task entity.
   */
  public function getStatus();

  /**
   * Sets task entity status.
   *
   * @param string $status
   *   The task entity status.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setStatus($status);

  /**
   * Gets the task entity external link.
   *
   * @return string
   *   Description of the task entity.
   */
  public function getExternalLink();

  /**
   * Sets task entity external link.
   *
   * @param string $external_link
   *   The task entity external link.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setExternalLink($external_link);

  /**
   * Gets the task entity assigned user.
   *
   * @return int
   *   Assigned user of the task entity.
   */
  public function getAssignedUser();

  /**
   * Sets task entity assigned user.
   *
   * @param int $user
   *   The task entity assigned user.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setAssignedUser($user);

  /**
   * Gets the task entity time taken.
   *
   * @return int
   *   Time taken of the task entity.
   */
  public function getTimeTaken();

  /**
   * Sets task entity time taken.
   *
   * @param int $time_taken
   *   The task entity time taken.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setTimeTaken($time_taken);

  /**
   * Gets the task entity time expected.
   *
   * @return int
   *   Time expected of the task entity.
   */
  public function getTimeExpected();

  /**
   * Sets task entity time expected.
   *
   * @param int $time
   *   The task entity time expected.
   *
   * @return \Drupal\task_system\TaskInterface
   *   The called task entity.
   */
  public function setTimeExpected($time);

  /**
   * Gets the task creation timestamp.
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

}
