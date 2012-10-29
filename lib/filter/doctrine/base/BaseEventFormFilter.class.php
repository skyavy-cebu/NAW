<?php

/**
 * Event filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'       => new sfWidgetFormFilterInput(),
      'start'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'state_id'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city_id'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'           => new sfWidgetFormFilterInput(),
      'prepay_slots'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'max_capacity'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'admission_prepay'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'admission_at_door' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'admission_no_rsvp' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_full'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_small'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'event_admin1'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'event_admin2'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'start'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'state_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'           => new sfValidatorPass(array('required' => false)),
      'prepay_slots'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_capacity'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'admission_prepay'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'admission_at_door' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'admission_no_rsvp' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'image_full'        => new sfValidatorPass(array('required' => false)),
      'image_small'       => new sfValidatorPass(array('required' => false)),
      'event_admin1'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_admin2'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'description'       => 'Text',
      'start'             => 'Date',
      'end'               => 'Date',
      'state_id'          => 'Number',
      'city_id'           => 'Number',
      'address'           => 'Text',
      'prepay_slots'      => 'Number',
      'max_capacity'      => 'Number',
      'admission_prepay'  => 'Number',
      'admission_at_door' => 'Number',
      'admission_no_rsvp' => 'Number',
      'image_full'        => 'Text',
      'image_small'       => 'Text',
      'event_admin1'      => 'Number',
      'event_admin2'      => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
