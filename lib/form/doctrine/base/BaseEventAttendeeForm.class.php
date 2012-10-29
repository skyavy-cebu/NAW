<?php

/**
 * EventAttendee form base class.
 *
 * @method EventAttendee getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventAttendeeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'event_id'    => new sfWidgetFormInputText(),
      'user_id'     => new sfWidgetFormInputText(),
      'industry_id' => new sfWidgetFormInputText(),
      'paid'        => new sfWidgetFormChoice(array('choices' => array(0 => 0, 1 => 1))),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'event_id'    => new sfValidatorInteger(array('required' => false)),
      'user_id'     => new sfValidatorInteger(array('required' => false)),
      'industry_id' => new sfValidatorInteger(array('required' => false)),
      'paid'        => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('event_attendee[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventAttendee';
  }

}
