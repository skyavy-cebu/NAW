<?php

/**
 * EventAttendee filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEventAttendeeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'event_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'industry_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paid'        => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'event_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'industry_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'paid'        => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('event_attendee_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventAttendee';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'event_id'    => 'Number',
      'user_id'     => 'Number',
      'industry_id' => 'Number',
      'paid'        => 'Enum',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
