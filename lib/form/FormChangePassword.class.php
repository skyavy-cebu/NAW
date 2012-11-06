<?php

class FormChangePassword extends BaseForm
{
	public function configure()
	{
    // fields..
    $this->widgetSchema['reset-password'] = new sfWidgetFormInputPassword(array('label' => 'New password'));
    $this->widgetSchema['reset-cpassword'] = new sfWidgetFormInputPassword(array('label' => 'Confirm new password'));
		
    // validations..
    $this->validatorSchema['reset-password']	= new sfValidatorString(
			array('required' => true, 'trim'=>true, 'min_length'=>8, 'max_length'=>16),
			array('required' =>'Invalid password', 'min_length'=>'Password must be 8-16 characters', 'max_length'=>'Password must be 8-16 characters')
		);
		$this->validatorSchema['reset-cpassword']	= new sfValidatorString(
			array('required' => true, 'trim'=>true, 'min_length'=>8, 'max_length'=>16),
			array('required'=>'Invalid confirm password', 'min_length'=>'Confirm password must be 8-16 characters', 'max_length'=>'Confirm password must be 8-16 characters')
		);
		
		$this->validatorSchema->setPostValidator(
      new sfValidatorSchemaCompare(
        'reset-password', sfValidatorSchemaCompare::EQUAL, 'reset-cpassword',
        array('throw_global_error' => true),
        array('invalid' => 'Passwords do not match.')
      )
    );
    
		$this->widgetSchema->setNameFormat('reset[%s]');
	}
}