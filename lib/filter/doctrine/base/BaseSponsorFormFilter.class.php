<?php

/**
 * Sponsor filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSponsorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'position'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_full'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_small' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'position'    => new sfValidatorPass(array('required' => false)),
      'company'     => new sfValidatorPass(array('required' => false)),
      'image_full'  => new sfValidatorPass(array('required' => false)),
      'image_small' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sponsor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sponsor';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'position'    => 'Text',
      'company'     => 'Text',
      'image_full'  => 'Text',
      'image_small' => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
