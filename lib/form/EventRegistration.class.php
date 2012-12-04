<?php
class EventRegistrationForm extends BaseUserForm{
  
  public function configure(){
  
    $id = $this->getObject()->get('id');
    $profile = Doctrine_Core::getTable('Profile')->find($id);
    $state_id = $profile->getCity()->getStateId();
    $city_id = $profile->getCityId();
    
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
    
    $this->widgetSchema['fname'] = new sfWidgetFormInputText(array('default'=>''));
    $this->widgetSchema['lname'] = new sfWidgetFormInputText(array('default'=>''));
    $this->widgetSchema['email'] = new sfWidgetFormInputText(array('default'=>''));
    $this->widgetSchema['state'] = new sfWidgetFormSelect(
      array('choices' => $state_list,'default'=>'')
    );
    $this->widgetSchema['city'] = new sfWidgetFormSelect(
      array('choices' => $city_list,'default'=>'')
    );  
    $this->widgetSchema['dob'] = new sfWidgetFormInputText(
      array('default'=>''),array('placeholder'=>'Select date','readonly'=>'readonly')
    );
    $this->widgetSchema['industry'] = new sfWidgetFormSelect(
      array('choices' => array(1,2),'default'=>'')
    );
    $this->widgetSchema['payment_method'] = new sfWidgetFormSelectRadio(
      array('choices' => array(1=>'Pay Now',2=>'Pay at the door'),'default'=>'')
    );
    
    $this->validatorSchema['fname']	= new sfValidatorString(
      array('max_length' => 150,'required' => true),array('required'=>'Please enter First name')
    );
    $this->validatorSchema['lname']	= new sfValidatorString(
      array('max_length' => 150,'required' => true),array('required'=>'Please enter Last name')
    );
    $this->validatorSchema['email']	= new sfValidatorString(
      array('max_length' => 150,'required' => true),array('required'=>'Please enter email address')
    );
    $this->validatorSchema['state'] = new sfValidatorString(array('required'=>false));
    $this->validatorSchema['city'] = new sfValidatorString(array('required'=>false));
    $this->validatorSchema['dob'] = new sfValidatorString(array('required'=>true));
    $this->validatorSchema['industry'] = new sfValidatorString(array('required'=>true));
    $this->validatorSchema['payment_method'] = new sfValidatorString(array('required'=>true));
    
    $this->widgetSchema->setNameFormat('event[%s]');
  }
  
}