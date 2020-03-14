<?php


namespace Drupal\register_role_selection\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides register role selection settings form.
 *
 * @package Drupal\register_role_selection\Form
 */
class RegisterRoleSelectionAdminSettings extends ConfigFormBase {

  /**
   * @inheritDoc
   */
  protected function getEditableConfigNames() {
    return [
      'register_role_selection.admin_settings',
    ];
  }

  /**
   * @inheritDoc
   */
  public function getFormId() {
    return 'register_role_selection.admin_settings';
  }

  /**
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    $roles = array_map(function ($role) {
      return $role->label();
    }, user_roles());

    $config = \Drupal::configFactory()->getEditable('register_role_selection.admin_settings');
    $configRoles = $config->get('roles') ?? [];

    $form['roles'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Select roles'),
      '#description' => $this->t('These roles will be shown on registration'),
      '#default_value' => $configRoles,
      '#options' => $roles,
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $roles = array_filter($form_state->getValue('roles'));
    sort($roles);
dd($roles);

    $this->config('register_role_selection.admin_settings')
      ->set('roles', $roles)
      ->save();

    parent::submitForm($form, $form_state);
  }

}
