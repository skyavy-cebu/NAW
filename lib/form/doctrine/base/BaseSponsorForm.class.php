<?php

/**
 * Sponsor form base class.
 *
 * @method Sponsor getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSponsorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'position'    => new sfWidgetFormInputText(),
      'company'     => new sfWidgetFormInputText(),
      'image_full'  => new sfWidgetFormInputText(),
      'image_small' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'position'    => new sfValidatorString(array('max_length' => 1)),
      'company'     => new sfValidatorString(array('max_length' => 150)),
      'image_full'  => new sfValidatorString(array('max_length' => 150)),
      'image_small' => new sfValidatorString(array('max_length' => 150)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sponsor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sponsor';
  }

}
