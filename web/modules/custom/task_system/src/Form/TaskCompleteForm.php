<?php

namespace Drupal\task_system\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the task entity complete forms.
 *
 * @package Drupal\task_system\Form
 */
class TaskCompleteForm extends ContentEntityConfirmFormBase {

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    $form['time_taken'] = [
      '#type' => 'number',
      '#title' => t('Time taken'),
      '#description' => t('The time it took to complete the task.'),
      '#required' => TRUE,
    ];

    $form['description'] = [
      '#markup' => t('Mark this task as completed?'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $task = $this->getEntity();

    if (strtolower($task->getStatus()) !== 'done') {
      $task->setStatus('Done');
      $task->setTimeTaken($form_state->getValue('time_taken'));
      $task->save();

      $link = $task->toLink($this->t('View'))->toRenderable();

      $this->messenger()
        ->addStatus($this->t('Task @label marked as completed.', ['@label' => $task->label()]));
      $this->logger('task_system')
        ->notice('Task @label has been marked as completed.',
          ['@label' => $task->label(), 'link' => render($link)]);
    }
    else {
      $this->messenger()
        ->addStatus($this->t('Task @label is already marked as completed!', ['@label' => $task->label()]));
    }

    $form_state->setRedirect('entity.task.canonical', ['task' => $task->id()]);

    //parent::submitForm($form, $form_state);
  }

  /**
   * @inheritDoc
   */
  public function getQuestion() {
    // TODO: Implement getQuestion() method.
  }

  /**
   * @inheritDoc
   */
  public function getCancelUrl() {
    // TODO: Implement getCancelUrl() method.
  }

}
