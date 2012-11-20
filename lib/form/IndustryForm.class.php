<?php
class IndustryForm extends BaseCityForm{
  
  public function configure(){
  
    $this->setWidgets(array(
      'name' => new sfWidgetFormInputText(array(),array('value'=>'')),
    ));
    
    
    $this->setValidators(array(
      'name' => new sfValidatorString(array('max_length' => 150,'required' => true),array('required'=>'Please enter Industry')),
    ));
    
    $this->widgetSchema->setNameFormat('industry[%s]');  
  }
  
  
}