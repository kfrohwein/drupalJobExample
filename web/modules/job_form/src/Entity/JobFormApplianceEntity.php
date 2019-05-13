<?php

namespace Drupal\job_form\Entity;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Entity\Annotation\ContentEntityType;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines a simple entity to store the job appliances
 *
 * @ingroup job_form
 *
 * @ContentEntityType(
 *   id = "job_form_appliance",
 *   label = @Translation("Job Form Appliance"),
 *   base_table = "job_form_appliance",
 *   entity_keys = {
 *     "id" = "id",
 *     "salutation" = "salutation",
 *     "first_name" = "first_name",
 *     "surname" = "surname",
 *     "email" = "email",
 *     "telephone" = "telephone",
 *   },
 *   handlers = {
 *     "views_data" = "Drupal\job_form\JobFormApplianceViewsData",
 *   },
 * )
 */
class JobFormApplianceEntity extends ContentEntityBase implements ContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type
  ) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setReadOnly(TRUE);

    $fields['salutation'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Salutation'))
      ->setSettings(
        [
          'max_length' => 4,
        ]
      );
    $fields['first_name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First Name'))
      ->setSettings(
        [
          'max_length' => 255,
        ]
      );
    $fields['surname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Surname'))
      ->setSettings(
        [
          'max_length' => 255,
        ]
      );
    $fields['email'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Email Address'))
      ->setSettings(
        [
          'max_length' => 255,
        ]
      );
    $fields['telephone'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Telephone'))
      ->setSettings(
        [
          'max_length' => 255,
        ]
      );

    return $fields;
  }
}
