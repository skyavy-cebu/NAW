<?php
class editAction extends sfAction{

  public function execute($request){
    $id = $request->getParameter('id');
    $this->event = Doctrine_Core::getTable('Event')->find($id);
    $this->form = new EventForm($this->event);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('event'));
      if($this->form->isValid()){
        
      }
    }
  }

}