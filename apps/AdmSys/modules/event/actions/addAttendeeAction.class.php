<?php
class addAttendeeAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
    
    $this->id = $request->getParameter('id');
    
    $this->form = new AdminEventAttendeeForm($this->event);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('attendee'));
      if($this->form->isValid()){
        
      }
    }
  }
  
}
?>