<?php
class EventForm extends BaseEventForm{
  public function configure(){
  
    $id = $this->getObject()->get('id');
    if($id){
      $event = Doctrine_Core::getTable('Event')->find($id);
      $state_id = $event->getCity()->getStateId();
      $city_id = $event->getCityId();
      $date = date('m/d/Y',strtotime($event->getEventDate()));
      $start_time = date('h:i a',strtotime($event->getStartTime()));
      $end_time = date('h:i a',strtotime($event->getEndTime()));
    }else{
      $date = date('m/d/Y');
      $start_time = date('h:i a');
      $end_time = date('h:i a',set_time('4 hours'));
      $state_id = 0;
      $city_id = 0;
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
      
    $this->setWidgets(array(
      'event_date' => new sfWidgetFormInputText(array(),array('value'=>$date)),
      'start_time' => new sfWidgetFormInputText(array(),array('value'=>date('h:i a'))),
      'end_time' => new sfWidgetFormInputText(array(),array('value'=>date('h:i a',set_time('4 hours')))),
      'description' => new sfWidgetFormTextArea(),
      'state' => new sfWidgetFormSelect(array('choices' => $state_list,'default'=>$state_id)),
      'city' => new sfWidgetFormSelect(array('choices' => $city_list,'default'=>$city_id)),
      'venue' => new sfWidgetFormInputText(),
      'address' => new sfWidgetFormInputText(),
      'prepay_slots' => new sfWidgetFormInputText(),
      'max_capacity' => new sfWidgetFormInputText(),
      'admission_prepay' => new sfWidgetFormInputText(),
      'admission_at_door' => new sfWidgetFormInputText(),
      'admission_no_rsvp' => new sfWidgetFormInputText()
    ));
    
    $this->setValidators(array(
      'event_date' => new sfValidatorPass(array('required' => true)),
      'start_time' => new sfValidatorPass(array('required' => true)),
      'end_time' => new sfValidatorPass(array('required' => true)),
      'description' => new sfValidatorPass(array('required' => false)),
      'state' => new sfValidatorString(array('required'=>true)),
      'city' => new sfValidatorString(array('required'=>true)),
      'venue' => new sfValidatorString(array('required'=>true),array('required'=>'Please enter event venue')),
      'address' => new sfValidatorString(array('required'=>true),array('required'=>'Please enter address')),
      'prepay_slots' => new sfValidatorString(array('required'=>true),array('required'=>'Please enter prepay slots')),
      'max_capacity' => new sfValidatorString(array('required'=>true),array('required'=>'Please enter max capacity')),
      'admission_prepay' => new sfValidatorString(array('required'=>false)),
      'admission_at_door' => new sfValidatorString(array('required'=>false)),
      'admission_no_rsvp' => new sfValidatorString(array('required'=>false))
    ));
    
    $this->widgetSchema['event_date']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['start_time']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['end_time']->setAttribute('readonly', 'readonly');
    
    $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback'=>array($this, 'validateForm'))));
    $this->widgetSchema->setNameFormat('event[%s]');
  }
  
  public function validateForm($validator, $values){
    
    if($values['max_capacity'] <= 0){
      $error = new sfValidatorError($validator, 'Max capacity is required');
      $error_data['max_capacity'] = $error;
    }
    
    if($values['state'] == 0){
      $error = new sfValidatorError($validator, 'Please select state');
      $error_data['state'] = $error;
    }
    
    if($values['city'] == 0){
      $error = new sfValidatorError($validator, 'Please select city');
      $error_data['city'] = $error;
    }
    
    if(isset($error_data)){
      throw new sfValidatorErrorSchema($validator, $error_data);
    }
    
    return $values;
	}
}