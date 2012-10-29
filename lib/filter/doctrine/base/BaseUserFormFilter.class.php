<?php

/**
 * User filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pass'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fname'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lname'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dob'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'type_id'       => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1))),
      'app_type'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'app_id'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activation'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_login_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'active'        => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'email'         => new sfValidatorPass(array('required' => false)),
      'pass'          => new sfValidatorPass(array('required' => false)),
      'fname'         => new sfValidatorPass(array('required' => false)),
      'lname'         => new sfValidatorPass(array('required' => false)),
      'dob'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'type_id'       => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1))),
      'app_type'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'app_id'        => new sfValidatorPass(array('required' => false)),
      'activation'    => new sfValidatorPass(array('required' => false)),
      'last_login_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'active'        => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'email'         => 'Text',
      'pass'          => 'Text',
      'fname'         => 'Text',
      'lname'         => 'Text',
      'dob'           => 'Date',
      'type_id'       => 'Enum',
      'app_type'      => 'Number',
      'app_id'        => 'Text',
      'activation'    => 'Text',
      'last_login_at' => 'Date',
      'active'        => 'Enum',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
