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
	
	$this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'ido'          => new sfWidgetFormInputText(),
			'industry'     => new sfWidgetFormInputText(),
			'industry2'    => new sfWidgetFormInputText(),
			'industry3'    => new sfWidgetFormInputText(),
			'industry4'    => new sfWidgetFormInputText(),
      'to_meet'      => new sfWidgetFormInputText(),
      'image_full'   => new sfWidgetFormInputFile(),
      'linkedin_url' => new sfWidgetFormInputText(),
      'fb_url'       => new sfWidgetFormInputText(),
      'twitter_url'  => new sfWidgetFormInputText()    
    ));
		
		$this->widgetSchema->setLabels(array(
			'ido'    		   => 'What I do:',
			'industry'     => 'Industries I want to meet:',
			'industry2'    => ' ',
      'industry3'    => ' ',
			'industry4'    => ' ',
			'to_meet'			 => 'Who I want to meet: ',
      'image_full'   => 'upload Profile Photo:',
			'linkedin_url' => 'Linked In profile URL:',
      'fb_url'       => 'Facebook profile URL:',
			'twitter_url'  => 'Twitter profile URL:'
		));
		
		$this->validatorSchema['image_full'] = new sfValidatorFile(array(
			'required'   => false,
			'path'       => sfConfig::get('sf_upload_dir').'/users/temp',
			'mime_types' => 'web_images',
		));
  }
}
