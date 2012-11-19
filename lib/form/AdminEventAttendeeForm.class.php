<?php 
sfContext::getInstance()->getConfiguration()->loadHelpers(array('Mix'));
class AdminEventAttendeeForm extends BaseEventForm{
  public function configure(){
    
    $id = $this->getObject()->get('id');
    
    $industries = Doctrine_Core::getTable('Industry')->findAll();
    foreach($industries as $industry){
      $industry_list[$industry->getId()] = $industry->getName();
    }
    
    $dbState = Doctrine_Core::getTable('State')->findAll();
    $state = array('0'=>'Select State');
    foreach ($dbState as $s) $state[$s['id']] = $s['name'];
    
    $dbCity = CityTable::getInstance()->getCitiesByState();
    $city = array('0'=>'Select City');
    foreach ($dbCity as $s) $city[$s['id']] = $s['name'];
    
    $paid_list = array(
      0 => 'No',
      1 => 'Yes'
    );
    
    $this->setWidgets(array(
      'email' => new sfWidgetFormInputText(array('default'=>'')),
      'fname' => new sfWidgetFormInputText(array('default'=>'')),
      'lname' => new sfWidgetFormInputText(array('default'=>'')),
      'state' => new sfWidgetFormSelect(array('choices' => $state)),
      'city' => new sfWidgetFormSelect(array('choices' => $city)),
      'company' => new sfWidgetFormInputText(),
      'dob' => new sfWidgetFormInputText(),
      'paid' => new sfWidgetFormSelectRadio(array('choices'=>$paid_list,'default'=>1)),
      'industry' => new sfWidgetFormSelect(
        array('choices' => $industry_list,'default'=>'')),
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