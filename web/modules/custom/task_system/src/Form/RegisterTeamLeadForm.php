<?php

namespace Drupal\task_system\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\RegisterForm;

/**
 * Class RegisterTeamLeadForm.
 *
 * @package Drupal\task_system\Form
 */
class RegisterTeamLeadForm extends RegisterForm {

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['form_title'] = [
      '#type' => 'inline_template',
      '#template' => $this->t('<h1>Register as a <strong>Team Lead</strong></h1>'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritDoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $role_id = 'task_system.team_lead';
    $this->entity->set('roles', $role_id);
    parent::save($form, $form_state);
  }

}
