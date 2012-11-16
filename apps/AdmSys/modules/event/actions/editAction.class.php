<?php
class editAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
  
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