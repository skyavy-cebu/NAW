<?php
class EventRegistrationForm extends BaseUserForm{
  
  public function configure(){
    unset( 
			$this['created_at'], $this['updated_at'],
      $this['updated_at'], $this['updated_at'],
      $this['pass'], $this['pass'],
      $this['activation'], $this['activation'],
      $this['app_id'], $this['app_id']
    );
    
    $admission_prepay = '';
    $admission_at_door = '';
    $id = $this->getObject()->get('id');
    $event_id = $this->getOption('event_id');
    if($event_id){
      $event = Doctrine_Core::getTable('Event')->find($event_id);
      if($event){
        $admission_prepay = $event->getAdmissionPrepay();
        if($admission_prepay > 0.00){
          $admission_prepay = '('.$admission_prepay.')';
        }else{
          $admission_prepay = '';
        }
        $admission_at_door = $event->getAdmissionAtDoor();
        if($admission_at_door > 0.00){
          $admission_at_door = '('.$admission_at_door.')';
        }else{
          $admission_at_door = '';
        }
      }
    }
    
    $dob = '';
    if($id){
      $dob = date('m/d/Y',strtotime($this->getObject()->get('dob')));
    }
    
    $state_id = 0;
    $city_id = 0;
    $profile = Doctrine_Core::getTable('Profile')->find($id);
    $company = '';
    if($profile){
      $state_id = $profile->getCity()->getStateId();
      $city_id = $profile->getCityId();
      $company = $profile->getCompany();
    }
    
    $states = Doctrine_Core::getTable('State')->findAll();
    $state_list[0] = 'Select State';
    foreach($states as $x => $state){
      $state_list[$state->getId()] = $state->getName();
    }
    
    $cities = CityTable::getInstance()->getCitiesByState($state_id);
    $city_list[0] = 'Select City';
    foreach($cities as $x => $city){
      $city_list[$city->getId()] = $city->getName();
    }
    
    //industry
    $industries = Doctrine_Core::getTable('Industry')->findAll();
    $industry_list[0] = 'Select Industry';
    foreach($industries as $x => $industry){
      $industry_list[$industry->getId()] = $industry->getName();
    }
    
    $this->widgetSchema['fname'] = new sfWidgetFormInputText(array('default'=>''));
    $this->widgetSchema['lname'] = new sfWidgetFormInputText(array('default'=>''));
    $this->widgetSchema['email'] = new sfWidgetFormInputText(array('default'=>''));
    $this->widgetSchema['state'] = new sfWidgetFormSelect(
      array('choices' => $state_list,'default'=>$state_id),
      array('class'=>'state','data-target'=>'event_city')
    );
    $this->widgetSchema['city'] = new sfWidgetFormSelect(
      array('choices' => $city_list,'default'=>$city_id),
      array('class'=>'city')
    );  
    $this->widgetSchema['company'] = new sfWidgetFormInputText(array('default'=>$company));
    $this->widgetSchema['dob'] = new sfWidgetFormInputText(
      array(),
      array('placeholder'=>'Select date','readonly'=>'readonly','value'=>$dob,'class'=>'dob')
    );
    $this->widgetSchema['industry'] = new sfWidgetFormSelect(
      array('choices' => $industry_list,'default'=>'')
    );
    $this->widgetSchema['payment_method'] = new sfWidgetFormSelectRadio(
      array('choices' => array(1=>'Pay Now '.$admission_prepay,2=>'Pay at the door '.$admission_at_door),'default'=>2)
    );
    
    $this->validatorSchema['fname']	= new sfValidatorString(
      array('max_length' => 150,'required' => true),
      array('required'=>'Please enter your First name')
    );
    $this->validatorSchema['lname']	= new sfValidatorString(
      array('max_length' => 150,'required' => true),
      array('required'=>'Please enter your Last name')
    );
    $this->sfValidatorEmail['email']	= new sfValidatorString(
      array('max_length' => 150,'required' => true),
      array('required'=>'Please enter email address'),
      array('invalid' =>'Please enter valid email address')
    );
    $this->validatorSchema['state'] = new sfValidatorString(array('required'=>false));
    $this->validatorSchema['city'] = new sfValidatorString(array('required'=>false));
    $this->validatorSchema['company'] = new sfValidatorString(array('required'=>false));
    $this->validatorSchema['dob'] = new sfValidatorString(
      array('required'=>true),
      array('required'=>'Please enter your Date of Birth')
    );
    $this->validatorSchema['industry'] = new sfValidatorString(array('required'=>false));
    $this->validatorSchema['payment_method'] = new sfValidatorString(
      array('required'=>true),
      array('required'=>'Please select payment method')
    );
    
    $this->widgetSchema->setNameFormat('event[%s]');
    $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback'=>array($this, 'validateForm'))));
  }
  
  public function validateForm($validator, $values){
    if(!is_email($values['email'])){
      $error = new sfValidatorError($validator, 'Please enter valid email address');
      $error_data['email'] = $error;
    }
  
    if(isset($error_data)){
      throw new sfValidatorErrorSchema($validator, $error_data);
    }
    
    return $values;
  }
  
}