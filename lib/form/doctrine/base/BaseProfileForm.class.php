<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInputText(),
      'company'      => new sfWidgetFormInputText(),
      'state_id'     => new sfWidgetFormInputText(),
      'city_id'      => new sfWidgetFormInputText(),
      'address'      => new sfWidgetFormInputText(),
      'i_do'         => new sfWidgetFormInputText(),
      'to_meet'      => new sfWidgetFormInputText(),
      'image_full'   => new sfWidgetFormInputText(),
      'image_small'  => new sfWidgetFormInputText(),
      'linkedin_url' => new sfWidgetFormInputText(),
      'fb_url'       => new sfWidgetFormInputText(),
      'twitter_url'  => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 5)),
      'company'      => new sfValidatorString(array('max_length' => 150)),
      'state_id'     => new sfValidatorInteger(array('required' => false)),
      'city_id'      => new sfValidatorInteger(array('required' => false)),
      'address'      => new sfValidatorString(array('max_length' => 255)),
      'i_do'         => new sfValidatorPass(array('required' => false)),
      'to_meet'      => new sfValidatorPass(array('required' => false)),
      'image_full'   => new sfValidatorString(array('max_length' => 150)),
      'image_small'  => new sfValidatorString(array('max_length' => 150)),
      'linkedin_url' => new sfValidatorString(array('max_length' => 150)),
      'fb_url'       => new sfValidatorString(array('max_length' => 150)),
      'twitter_url'  => new sfValidatorString(array('max_length' => 150)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}
