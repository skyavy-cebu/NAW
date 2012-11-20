<?php
class NewsForm extends BaseCityForm{
  
  public function configure(){
  
    $post_date = date('m/d/Y h:ia');
    
    $this->setWidgets(array(
      'post_date' => new sfWidgetFormInputText(array(),array('value'=>$post_date)),
      'title' => new sfWidgetFormInputText(array(),array('value'=>'')),
      'content' => new sfWidgetFormTextArea(array(),array('value'=>'')),
    ));
    
    
    $this->setValidators(array(
      'post_date' => new sfValidatorString(array('max_length' => 150,'required' => true)),
      'title' => new sfValidatorString(array('max_length' => 150,'required' => true),array('required'=>'Please enter News Title')),
      'content' => new sfValidatorString(array('required' => true),array('required'=>'Please enter News Body')),
    ));
    
    $this->widgetSchema->setNameFormat('news[%s]');  
  }
  
  
}