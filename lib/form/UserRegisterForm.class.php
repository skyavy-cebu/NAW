<?php

/**
 * User register form.
 *
 * @package    naw
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserRegisterForm extends BaseUserForm
{
  public function configure()
  {
	
	unset( 
			$this['created_at'], $this['updated_at'],
      $this['last_login_at'], $this['active'],
			$this['activation'], $this['app_id'],
      $this['app_type'], $this['type_id']
    );
		
	$dbState = CityTable::getInstance()->getAllCities();
	$state = array('NONE'=>'Select State');
	foreach ($dbState as $s) $state[$s['id']] = $s['name'];
	
	$dbIndustry = IndustryTable::getInstance()->getAllIndustry();
	$industry = array('NONE'=>'Add Industry');
	foreach ($dbIndustry as $s) $industry[$s['id']] = $s['name'];
	
		
	$this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
			'fname'         => new sfWidgetFormInputText(),
      'lname'         => new sfWidgetFormInputText(),
      'dob'           => new sfWidgetFormDate(),
			'city'          => new sfWidgetFormSelect(array('choices' => $state)),
      'industry1'     => new sfWidgetFormSelect(array('choices' => $industry)),
			'industry2'     => new sfWidgetFormSelect(array('choices' => $industry)),
      'email'         => new sfWidgetFormInputText(),
			'email2'        => new sfWidgetFormInputText(),
      'pass'          => new sfWidgetFormInputPassword(),
			'pass2'         => new sfWidgetFormInputPassword()     
    ));
		
		$this->widgetSchema->setNameFormat('user[%s]');
		
		$this->widgetSchema->setLabels(array(
			'fname'    => 'First Name',
			'lname'    => 'Last Name',
			'dob'    => 'Date of Birth',
      'city'   => 'City',
			'industry1' => 'My Industry',
      'industry2' => ' ',
			'email'    => 'Email Address',
      'email2'   => 'Confirm Email',
			'pass'   => 'Password',
      'pass2' => 'Confirm Password'
		));
		
		$this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'fname'         => new sfValidatorString(array('max_length' => 150, 'required' => true)),
      'lname'         => new sfValidatorString(array('max_length' => 150, 'required' => true)),
      'dob'           => new sfValidatorDate(array('required' => true)),
			'city'      		=> new sfValidatorString(array('max_length' => 150, 'required' => true)),
			'industry1'     => new sfValidatorString(array('max_length' => 150, 'required' => true)),
      'industry2'     => new sfValidatorString(array('max_length' => 150)),
			'email'         => new sfValidatorEmail(array('required' => true),array('required' => 'Please enter email.','invalid' => 'Invalid email.')),
      'email2'        => new sfValidatorString(array('required' => true),array('required' => 'Please repeat email.')),
			'pass'          => new sfValidatorString(array('max_length' => 32, 'required' => true)),
			'pass2'         => new sfValidatorString(array('max_length' => 32, 'required' => true))
    ));
		
		$this->mergePostValidator(new sfValidatorSchemaCompare('email', sfValidatorSchemaCompare::IDENTICAL, 'email2', array(), array('invalid'=>'Email Doesn\'t match.')));
		$this->mergePostValidator(new sfValidatorSchemaCompare('pass', sfValidatorSchemaCompare::IDENTICAL, 'pass2', array(), array('invalid'=>'Password Doesn\'t match')));
	
	$this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback'=>array($this, 'validateForm'))));

	}
	
	public function validateForm($validator, $values)
	{
		
		$user_email = $values['email'] ? $values['email'] : '';
		$aeUser = Doctrine_Core::getTable('user')->findOneByEmail($user_email);
		
		if ($aeUser)
		{
			$error = new sfValidatorError($validator, 'This email is already registered.');
			throw new sfValidatorErrorSchema($validator, array('email'=>$error));
		}
		
		return $values;
	}
	
}
