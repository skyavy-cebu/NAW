<?php

/**
 * Event form base class.
 *
 * @method Event getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'description'       => new sfWidgetFormInputText(),
      'start'             => new sfWidgetFormDateTime(),
      'end'               => new sfWidgetFormDateTime(),
      'state_id'          => new sfWidgetFormInputText(),
      'city_id'           => new sfWidgetFormInputText(),
      'address'           => new sfWidgetFormInputText(),
      'prepay_slots'      => new sfWidgetFormInputText(),
      'max_capacity'      => new sfWidgetFormInputText(),
      'admission_prepay'  => new sfWidgetFormInputText(),
      'admission_at_door' => new sfWidgetFormInputText(),
      'admission_no_rsvp' => new sfWidgetFormInputText(),
      'image_full'        => new sfWidgetFormInputText(),
      'image_small'       => new sfWidgetFormInputText(),
      'event_admin1'      => new sfWidgetFormInputText(),
      'event_admin2'      => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 150)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'start'             => new sfValidatorDateTime(array('required' => false)),
      'end'               => new sfValidatorDateTime(array('required' => false)),
      'state_id'          => new sfValidatorInteger(array('required' => false)),
      'city_id'           => new sfValidatorInteger(array('required' => false)),
      'address'           => new sfValidatorPass(array('required' => false)),
      'prepay_slots'      => new sfValidatorInteger(array('required' => false)),
      'max_capacity'      => new sfValidatorInteger(array('required' => false)),
      'admission_prepay'  => new sfValidatorNumber(array('required' => false)),
      'admission_at_door' => new sfValidatorNumber(array('required' => false)),
      'admission_no_rsvp' => new sfValidatorNumber(array('required' => false)),
      'image_full'        => new sfValidatorString(array('max_length' => 150)),
      'image_small'       => new sfValidatorString(array('max_length' => 150)),
      'event_admin1'      => new sfValidatorInteger(array('required' => false)),
      'event_admin2'      => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }

}
