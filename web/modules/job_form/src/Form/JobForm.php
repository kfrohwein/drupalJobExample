<?php

namespace Drupal\job_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\job_form\Entity\JobFormApplianceEntity;

class JobForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'Job appliance form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['salutation'] = [
      '#type' => 'select',
      '#title' => $this->t('Salutation'),
      '#options' => ['Mx.' => 'Mx.', 'Mrs.' => 'Mrs.', 'Mr.' => 'Mr.'],
    ];

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
    ];

    $form['surname'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => $this->t('Surname'),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#required' => TRUE,
      '#title' => $this->t('Email'),
    ];

    $form['telephone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Telephone number'),
      '#description' => $this->t(
        'Please start with a 00'
      ),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Apply'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    // Just an example for additional validation.
    // @todo This should check if the length of the strings is valid for our entity.
    $email = $form_state->getValue('email');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName(
        'email',
        $this->t('Please enter a valid email address.')
      );
    }


  }

  /**
   * {@inheritdoc}
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // save entity
    $appliance = JobFormApplianceEntity::create(
      [
        'salutation' => $form_state->getValue('salutation'),
        'first_name' => $form_state->getValue('first_name'),
        'surname' => $form_state->getValue('surname'),
        'email' => $form_state->getValue('email'),
        'telephone' => $form_state->getValue('telephone'),
      ]
    );
    $appliance->save();
  }
}
