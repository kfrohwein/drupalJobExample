<?php

namespace Drupal\job_form\Plugin\Block;

use Drupal;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * @Block(
 *   id = "jobform_block",
 *   admin_label = @Translation("Job Form Block"),
 *   category = @Translation("Custom"),
 * )
 */
class JobFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return Drupal::formBuilder()->getForm('Drupal\job_form\Form\JobForm');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    return parent::blockForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    // Create entity
  }

}
