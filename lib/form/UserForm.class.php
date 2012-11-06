<?php
class UserForm extends BaseUserForm{
  
  public function configure(){
    //$id = $this->getObject()->get('id');
    
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
      'email' => new sfWidgetFormInputText(),
      'email_confirm' => new sfWidgetFormInputText(),
      'pass1' => new sfWidgetFormInputText(),
      'pass2' => new sfWidgetFormInputText(),
      'pass3' => new sfWidgetFormInputText()
    ));
    
    $this->setValidators(array(
      'email' => new sfValidatorString(array('max_length' => 150,'required' => true)),
      'email_confirm' => new sfValidatorString(array('max_length' => 150,'required' => true)),
      'pass1' => new sfValidatorString(array('max_length' => 150,'required' => true)),
      'pass2' => new sfValidatorString(array('max_length' => 150,'required' => true)),
      'pass3' => new sfValidatorString(array('max_length' => 150,'required' => true))
    ));
    
    $this->widgetSchema->setNameFormat('user[%s]');
  }
}