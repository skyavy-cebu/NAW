<?php
class SponsorForm extends BaseSponsorForm{
  
  public function configure(){
  
    $post_date = date('m/d/Y h:ia');
    $status_list = array(
      '0' => 'Inactive',
      '1' => 'Active'
    );
    
    $this->setWidgets(array(
      'company' => new sfWidgetFormInputText(array()),
      'url' => new sfWidgetFormInputText(array(),array('placeholder'=>'http://')),
      'position' => new sfWidgetFormInputText(array(),array('placeholder'=>'A-Z')),
      'status' => new sfWidgetFormSelectRadio(array('choices'=>$status_list,'default'=>1)),
    ));
    
    
    $this->setValidators(array(
      'company' => new sfValidatorString(array('max_length' => 150,'required' => true),array('required'=>'Please enter sponsor company')),
      'url' => new sfValidatorString(array('required' => true),array('required'=>'Please enter Sponsor URL')),
      'position' => new sfValidatorString(array('required' => false)),
      'status' => new sfValidatorString(array('required' => false)),
    ));
    
    $this->widgetSchema->setNameFormat('sponsor[%s]');  
  }
  
  
}