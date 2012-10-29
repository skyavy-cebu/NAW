<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'email'         => new sfWidgetFormInputText(),
      'pass'          => new sfWidgetFormInputText(),
      'fname'         => new sfWidgetFormInputText(),
      'lname'         => new sfWidgetFormInputText(),
      'dob'           => new sfWidgetFormDateTime(),
      'type_id'       => new sfWidgetFormChoice(array('choices' => array(0 => 0, 1 => 1))),
      'app_type'      => new sfWidgetFormInputText(),
      'app_id'        => new sfWidgetFormInputText(),
      'activation'    => new sfWidgetFormInputText(),
      'last_login_at' => new sfWidgetFormDateTime(),
      'active'        => new sfWidgetFormChoice(array('choices' => array(0 => 0, 1 => 1))),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 150)),
      'pass'          => new sfValidatorString(array('max_length' => 32)),
      'fname'         => new sfValidatorString(array('max_length' => 150)),
      'lname'         => new sfValidatorString(array('max_length' => 150)),
      'dob'           => new sfValidatorDateTime(array('required' => false)),
      'type_id'       => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1), 'required' => false)),
      'app_type'      => new sfValidatorInteger(array('required' => false)),
      'app_id'        => new sfValidatorString(array('max_length' => 150)),
      'activation'    => new sfValidatorString(array('max_length' => 150)),
      'last_login_at' => new sfValidatorDateTime(array('required' => false)),
      'active'        => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
