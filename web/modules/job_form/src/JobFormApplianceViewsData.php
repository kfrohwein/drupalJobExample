<?php

namespace Drupal\job_form;

use Drupal\views\EntityViewsData;

/**
 * Provides the views data for the job form appliance entity type.
 */
class JobFormApplianceViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['job_form_appliance']['table']['base']['help'] = $this->t(
      'Job appliances.'
    );

    $data['job_form_appliance']['table']['wizard_id'] = 'job_form_appliance';

    return $data;
  }

}
