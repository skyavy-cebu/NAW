<?php 
sfContext::getInstance()->getConfiguration()->loadHelpers(array('Mix'));
class AdminEventAttendeeForm extends BaseEventAttendeeForm{
  public function configure(){
    
    $id = $this->getObject()->get('id');
    $user = Doctrine_Core::getTable('User')->find($this->getObject()->get('user_id'));
    if($user && $user->getId()){
      $email = $user->getEmail();
      $fname = $user->getFname();
      $lname = $user->getLname();
      $dob = date('m/d/Y',strtotime($user->getDob()));
      $company = $user->getProfile()->getCompany();
      $state = $user->getProfile()->getCity()->getStateId();
      $city = $user->getProfile()->getCityId();
      $myi = ProfileIndustryTable::getInstance()->getProfileIndustry($user->getId());
      $my_industry = ($myi->getFirst())?$myi->getFirst()->getIndustryId():0;
      $paid = $this->getObject()->get('paid');
    }else{
      $email = '';
      $fname = '';
      $lname = '';
      $dob = '';
      $company = '';
      $state = 0;
      $city = 0;
      $my_industry = '';
      $paid = 1;
    }
    
    $industries = Doctrine_Core::getTable('Industry')->findAll();
    $industry_list[0] = 'Select Industry';
    foreach($industries as $industry){
      $industry_list[$industry->getId()] = $industry->getName();
    }
    
    $dbState = Doctrine_Core::getTable('State')->findAll();
    $state_list = array('0'=>'Select State');
    foreach ($dbState as $s) $state_list[$s['id']] = $s['name'];
    
    $dbCity = CityTable::getInstance()->getCitiesByState($state);
    $city_list = array('0'=>'Select City');
    foreach ($dbCity as $s) $city_list[$s['id']] = $s['name'];
    
    $paid_list = array(
      0 => 'No',
      1 => 'Yes'
    );
    
    $this->setWidgets(array(
      'email' => new sfWidgetFormInputText(array('default'=>''),array('value'=>$email)),
      'fname' => new sfWidgetFormInputText(array('default'=>$fname),array('value'=>$fname)),
      'lname' => new sfWidgetFormInputText(array('default'=>$lname),array('value'=>$lname)),
      'state' => new sfWidgetFormSelect(array('choices' => $state_list,'default'=>$state)),
      'city' => new sfWidgetFormSelect(array('choices' => $city_list,'default'=>$city)),
      'company' => new sfWidgetFormInputText(array(),array('value'=>$company)),
      'dob' => new sfWidgetFormInputText(array(),array('value'=>$dob)),
      'paid' => new sfWidgetFormSelectRadio(array('choices'=>$paid_list,'default'=>$paid)),
      'industry' => new sfWidgetFormSelect(
        array('choices' => $industry_list,'default'=>$my_industry)),
    ));
    
    $this->setValidators(array(
      'email' => new sfValidatorString(array('max_length' => 150,'required' => true),
        array('required'=>'Please enter email')),
      'fname' => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'lname'   => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'state' => new sfValidatorInteger(array('required' => false)),
      'city'  => new sfValidatorInteger(array('required' => false)),
      'company'  => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'dob' => new sfValidatorString(array('max_length' => 30,'required' => false)),
      'paid' => new sfValidatorString(array('max_length' => 2,'required' => true)),
      'industry' => new sfValidatorInteger(array('required' => false)),
    ));
    
     $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback'=>array($this, 'validateForm'))));
    $this->widgetSchema->setNameFormat('attendee[%s]');
  }
  
  public function validateForm($validator, $values){
    
    if(!is_email($values['email'])){
      $error = new sfValidatorError($validator, 'Please enter valid email');
      $error_data['email'] = $error;
    }
    
    if(isset($error_data)){
      throw new sfValidatorErrorSchema($validator, $error_data);
    }
  }
}