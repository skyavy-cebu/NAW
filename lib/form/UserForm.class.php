<?php
class UserForm extends BaseUserForm{
  
  public function configure(){
   
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
      'email1' => new sfWidgetFormInputText(array(),array('placeholder'=>$this->getObject()->get('email'))),
      'email2' => new sfWidgetFormInputText(),
      'pass1' => new sfWidgetFormInputPassword(),
      'pass2' => new sfWidgetFormInputPassword(),
      'pass3' => new sfWidgetFormInputPassword()
    ));
    
    $this->setValidators(array(
      'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email1' => new sfValidatorEmail(array('max_length' => 150,'required' => false),
      array('required' => 'Please Enter Email.','invalid' => 'Invalid Email.')),
      'email2' => new sfValidatorEmail(array('max_length' => 150,'required' => false),
      array('required' => 'Please Enter Email Confirm.','invalid' => 'Invalid Email Confirm.')),
      'pass1' => new sfValidatorString(array('max_length' => 32,'required' => true),
      array('required' => 'Please Enter Current Password.')),
      'pass2' => new sfValidatorString(array('max_length' => 32,'required' => false),
      array('required' => 'Please Enter New Password.')),
      'pass3' => new sfValidatorString(array('max_length' => 32,'required' => false),
      array('required' => 'Please Re-Enter Password.'))
    ));
    
    $this->widgetSchema->setLabels(array(
			'email1' => 'Email Address',
      'email2' => 'Confirm Email Address',
      'pass1' => 'Old Password',
      'pass2' => 'New Password',
      'pass3' => 'Re-Enter Password'
		));
        
    $this->widgetSchema->setNameFormat('user[%s]');
    
    $this->mergePostValidator(new sfValidatorSchemaCompare('email1', sfValidatorSchemaCompare::IDENTICAL, 'email2', array(), array('invalid'=>'Email Doesn\'t match.')));
		$this->mergePostValidator(new sfValidatorSchemaCompare('pass2', sfValidatorSchemaCompare::IDENTICAL, 'pass3', array(), array('invalid'=>'New Password Doesn\'t match')));
	
	$this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback'=>array($this, 'validateForm'))));
  }
  
  public function validateForm($validator, $values){
    $id = $this->getObject()->get('id');
  
    if($values['email1']){
      $user_email = $values['email1'] ? $values['email1'] : '';
      $aeUser = Doctrine_Core::getTable('User')->findOneByEmail($user_email);
      if($aeUser){
        $error = new sfValidatorError($validator, 'This email is already registered.');
        throw new sfValidatorErrorSchema($validator, array('email1'=>$error));
      }
    }
    
    if($values['email1'] && !$values['email2']){
      $error = new sfValidatorError($validator, 'Please Enter Email Confirm.');
      throw new sfValidatorErrorSchema($validator, array('email2'=>$error));
    }
    
    if($values['pass1']){
      $pass = md5hash($values['pass1']);
      $user = Doctrine_Core::getTable('User')->find($id);
      if($user->getPass() != $pass){
        $error = new sfValidatorError($validator, 'Invalid Current Password');
        throw new sfValidatorErrorSchema($validator, array('pass1'=>$error));
      }
    }
    
    if($values['pass2'] != $values['pass3']){
      $error = new sfValidatorError($validator, 'New Password Doesn\'t match');
      throw new sfValidatorErrorSchema($validator, array('pass2'=>$error));
    }
		
		return $values;
  }
  
}