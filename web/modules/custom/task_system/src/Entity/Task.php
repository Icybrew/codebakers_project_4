<?php

namespace Drupal\task_system\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\task_system\TaskInterface;
use Drupal\user\UserInterface;

/**
 * Defines the task entity class.
 *
 * @ContentEntityType(
 *   id = "task",
 *   label = @Translation("Task"),
 *   label_collection = @Translation("Tasks"),
 *   handlers = {
 *     "view_builder" = "Drupal\task_system\Entity\TaskViewBuilder",
 *     "list_builder" = "Drupal\task_system\TaskListBuilder",
 *     "views_data" = "Drupal\task_system\TaskViewsData",
 *     "access" = "Drupal\task_system\TaskAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\task_system\Form\TaskForm",
 *       "edit" = "Drupal\task_system\Form\TaskForm",
 *       "delete" = "Drupal\task_system\Form\TaskDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "task",
 *   data_table = "task_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer task entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "langcode" = "langcode",
 *     "label" = "title",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/content/task/add",
 *     "canonical" = "/task/{task}",
 *     "edit-form" = "/admin/content/task/{task}/edit",
 *     "delete-form" = "/admin/content/task/{task}/delete",
 *     "collection" = "/admin/content/task"
 *   },
 *   field_ui_base_route = "entity.task.settings"
 * )
 */
class Task extends ContentEntityBase implements TaskInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   *
   * When a new task entity is created, set the uid entity reference to
   * the current user as the creator of the entity.
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += ['uid' => \Drupal::currentUser()->id()];
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->get('title')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTitle($title) {
    $this->set('title', $title);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->get('description')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setDescription($description) {
    $this->set('description', $description);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getStatus() {
    return $this->get('status')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setStatus($status) {
    $this->set('status', $status);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getExternalLink() {
    return $this->get('external_link')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setExternalLink($external_link) {
    $this->set('external_link', $external_link);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAssigneduser() {
    return $this->get('assigned_user')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setAssignedUser($user) {
    $this->set('assigned_user', $user);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTakenTime() {
    return $this->get('time_taken')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTimeTaken($time_taken) {
    $this->set('time_taken', $time_taken);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTimeExpected() {
    return $this->get('time_expected')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTimeExpected($time_expected) {
    $this->set('time_expected', $time_expected);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('uid')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('uid')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('uid', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('uid', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setTranslatable(TRUE)
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the task.'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['description'] = BaseFieldDefinition::create('text_long')
      ->setTranslatable(TRUE)
      ->setLabel(t('Description'))
      ->setDescription(t('A description of the task.'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
        'settings' => [
          'rows' => 5,
        ],
        'weight' => 2,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'text_default',
        'label' => 'above',
        'weight' => 2,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['status'] = BaseFieldDefinition::create('list_string')
      ->setTranslatable(TRUE)
      ->setLabel(t('Status'))
      ->setDescription(t('A status indicating task progress.'))
      ->setRequired(TRUE)
      ->setDefaultValue('')
      ->setSettings([
        'allowed_values' => [
          'to_do' => 'To do',
          'in_progress' => 'In progress',
          'done' => 'Done',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => 4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'above',
        'weight' => 4,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['external_link'] = BaseFieldDefinition::create('link')
      ->setLabel(t('Task external link'))
      ->setDescription(t('Task external link (YouTrack, GitHub...).'))
      ->setRequired(FALSE)
      ->setDefaultValue('')
      ->setSettings([
        'max_length' => '255',
      ])
      ->setDisplayOptions('form', [
        'type' => 'url',
        'weight' => 6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'above',
        'weight' => 6,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['assigned_user'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Assigned to'))
      ->setDescription(t('User to whom this task will be assigned.'))
      ->setRequired(TRUE)
      ->setSetting('target_type', 'user')
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'placeholder' => '',
          'filter' => [], // TODO filter by the role from configuration
        ],
        'weight' => 8,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 8,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['time_taken'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Time taken'))
      ->setDescription(t('Time taken to complete the task.'))
      ->setRequired(FALSE)
      ->setDefaultValue('')
      ->setSettings([
        'max_length' => 100,
      ])
      ->setDisplayOptions('form', [
        'type' => 'integer',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'integer',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['time_expected'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Expected time'))
      ->setDescription(t('Expected completion time.'))
      ->setRequired(TRUE)
      ->setDefaultValue('')
      ->setSettings([
        'max_length' => 100,
      ])
      ->setDisplayOptions('form', [
        'type' => 'integer',
        'weight' => 12,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'integer',
        'weight' => 12,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['assigned_mentor'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Assigned mentor'))
      ->setDescription(t('User who will manage this task.'))
      ->setRequired(TRUE)
      ->setSetting('target_type', 'user')
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'placeholder' => '',
          'filter' => [], // TODO filter by the role from configuration
        ],
        'weight' => 8,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 8,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Author'))
      ->setDescription(t('Task author.'))
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback('Drupal\\node\\Entity\\Node::getCurrentUserId');

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setTranslatable(TRUE)
      ->setLabel(t('Created at'))
      ->setDescription(t('Time that task was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setTranslatable(TRUE)
      ->setLabel(t('Updated'))
      ->setDescription(t('The last time that the task was updated.'));

    return $fields;
  }

}
