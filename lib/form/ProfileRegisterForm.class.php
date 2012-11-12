<?php

/**
 * Profile form.
 *
 * @package    naw
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileRegisterForm extends BaseProfileForm
{
  public function configure()
  {
	
	unset( 
			$this['created_at'], $this['updated_at'],
      $this['image_small'], $this['title'],
			$this['company'], $this['state_id'],
      $this['city_id'], $this['address']
    );
		
	$dbIndustry = IndustryTable::getInstance()->getAllIndustry();
	$industry = array('NONE'=>'Add Industry');
	foreach ($dbIndustry as $s) $industry[$s['id']] = $s['name'];
	
	$this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'ido'          => new sfWidgetFormTextarea(),
			'industry1'    => new sfWidgetFormSelect(array('choices' => $industry)),
			'industry2'    => new sfWidgetFormSelect(array('choices' => $industry)),
			'industry3'    => new sfWidgetFormSelect(array('choices' => $industry)),
			'industry4'    => new sfWidgetFormSelect(array('choices' => $industry)),
      'to_meet'      => new sfWidgetFormTextarea(),
      'image_full'   => new sfWidgetFormInputFile(),
      'linkedin_url' => new sfWidgetFormInputText(),
      'fb_url'       => new sfWidgetFormInputText(),
      'twitter_url'  => new sfWidgetFormInputText()    
    ));
		
		$this->widgetSchema->setNameFormat('user[%s]');
		
		$this->widgetSchema->setLabels(array(
			'ido'    		   => 'What I do:',
			'industry1'     => 'Industries I want to meet:',
			'industry2'    => ' ',
      'industry3'    => ' ',
			'industry4'    => ' ',
			'to_meet'			 => 'Who I want to meet: ',
      'image_full'   => 'Upload Profile Photo:',
			'linkedin_url' => 'Linked In profile URL:',
      'fb_url'       => 'Facebook profile URL:',
			'twitter_url'  => 'Twitter profile URL:'
		));
		
		$this->setValidators(array(
			'id'           => new sfValidatorString(array('required' => false)),
      'ido'          => new sfValidatorString(array('required' => false)),
      'industry1'    => new sfValidatorString(array('required' => false)),
      'industry2'    => new sfValidatorString(array('required' => false)),
      'industry3'    => new sfValidatorString(array('required' => false)),
			'industry4'    => new sfValidatorString(array('required' => false)),
			'to_meet'      => new sfValidatorString(array('required' => false)),
      'image_full'   => new sfValidatorString(array('required' => false)),
			'linkedin_url' => new sfValidatorString(array('required' => false)),
      'fb_url'       => new sfValidatorString(array('required' => false)),
			'twitter_url'  => new sfValidatorString(array('required' => false))
    ));
		
		$this->validatorSchema['image_full'] = new sfValidatorFile(array(
			'required'   => false,
			'path'       => sfConfig::get('sf_upload_dir').'/users/temp',
			'mime_types' => 'web_images',
		));
  }
}
