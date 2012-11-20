<?php
class CityForm extends BaseCityForm{
  
  public function configure(){
  
    $state_list[0] = '';
    $states = Doctrine_Core::getTable('State')->findAll();
    $state_list[0] = 'Select State';
    foreach($states as $x => $state){
      $state_list[$state->getId()] = $state->getName();
    }
  
    $this->setWidgets(array(
      'name' => new sfWidgetFormInputText(array(),array('value'=>'')),
      'state' => new sfWidgetFormSelect(array('choices' => $state_list,'default'=>0))
    ));
    
    
    $this->setValidators(array(
      'name' => new sfValidatorString(array('max_length' => 150,'required' => true),array('required'=>'Please enter City')),
      'state' => new sfValidatorString(array('required'=>true))
    ));
    
    $this->widgetSchema->setNameFormat('location[%s]');  
  }
  
  
}