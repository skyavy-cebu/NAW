<?php

/**
 * Profile filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'state_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'i_do'         => new sfWidgetFormFilterInput(),
      'to_meet'      => new sfWidgetFormFilterInput(),
      'image_full'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_small'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'linkedin_url' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fb_url'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'twitter_url'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'title'        => new sfValidatorPass(array('required' => false)),
      'company'      => new sfValidatorPass(array('required' => false)),
      'state_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'      => new sfValidatorPass(array('required' => false)),
      'i_do'         => new sfValidatorPass(array('required' => false)),
      'to_meet'      => new sfValidatorPass(array('required' => false)),
      'image_full'   => new sfValidatorPass(array('required' => false)),
      'image_small'  => new sfValidatorPass(array('required' => false)),
      'linkedin_url' => new sfValidatorPass(array('required' => false)),
      'fb_url'       => new sfValidatorPass(array('required' => false)),
      'twitter_url'  => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'title'        => 'Text',
      'company'      => 'Text',
      'state_id'     => 'Number',
      'city_id'      => 'Number',
      'address'      => 'Text',
      'i_do'         => 'Text',
      'to_meet'      => 'Text',
      'image_full'   => 'Text',
      'image_small'  => 'Text',
      'linkedin_url' => 'Text',
      'fb_url'       => 'Text',
      'twitter_url'  => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
