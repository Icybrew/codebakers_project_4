<?php


namespace Drupal\task_system\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityFormBuilderInterface;
use Drupal\user\UserStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class RegisterController.
 *
 * @package Drupal\task_system\Controller
 */
class RegisterController extends ControllerBase {

  /**
   * Entity form builder.
   *
   * @var \Drupal\Core\Entity\EntityFormBuilderInterface
   */
  protected $entityFormBuilder;

  /**
   * User storage.
   *
   * @var \Drupal\user\UserStorageInterface
   */
  protected $userStorage;

  /**
   * RegisterController constructor.
   *
   * @param \Drupal\Core\Entity\EntityFormBuilderInterface $entityFormBuilder
   *   Entity Type Builder.
   *
   * @param \Drupal\user\UserStorageInterface $userStorage
   *   User Storage.
   */
  public function __construct(EntityFormBuilderInterface $entityFormBuilder, UserStorageInterface $userStorage) {
    $this->entityFormBuilder = $entityFormBuilder;
    $this->userStorage = $userStorage;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.form_builder'),
      $container->get('entity_type.manager')->getStorage('user')
    );
  }

  /**
   * Returns developer registration form.
   *
   * @return array
   *   Returns render array representing developer registration form.
   */
  public function registerDeveloperForm() {
    $user = $this->userStorage->create();
    $content['register_developer'] = $this->entityFormBuilder->getForm($user, 'register_developer');
    return $content;
  }

  /**
   * Returns team lead registration form.
   *
   * @return array
   *   Returns render array representing team lead registration form.
   */
  public function registerTeamLeadForm() {
    return $this->entityFormBuilder->getForm($this->userStorage->create(), 'register_team_lead');
  }

}
