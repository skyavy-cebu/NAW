<?php

class ForgotPasswordForm extends BaseForm
{
  public function configure()
  {
    $this->setWidget('email', new sfWidgetFormInputText(
      array(),
      array(
        'class' => 'data_entered',
        'style' => 'width:320px',
        'placeholder' => 'Please enter your email address'
      )
    ));
    
    $this->setValidator('email', new sfValidatorEmail(
      array(
        'required' => true,
        'trim'     => true
      ),
      array(
        'required' => 'Please enter your email address.',
        'invalid'  => 'Invalid Email address.'
      )
    ));
    
		$this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback'=>array($this, 'validateForm'))));
    $this->widgetSchema->setNameFormat('forgotpassword[%s]');
  }
	
	public function validateForm($validator, $values)
	{
		if (isset($values['email']))
		{
      $oUser = UserTable::getInstance()->findOneByEmail($values['email']);
      
			if ( ! $oUser)
			{
				$error = new sfValidatorError($validator, 'E-mail address not found.');
				throw new sfValidatorErrorSchema($validator, array('email' => $error));
			}
		}
		
		return $values;
	}
}