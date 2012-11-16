<?php
class viewAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
  
    $id = $request->getParameter('id');
    $this->event = Doctrine_Core::getTable('Event')->find($id);
    if(!$this->event){
      $this->forward404();
    }
    
    $this->email = $request->getParameter('e');
    $this->company = $request->getParameter('c');
    $this->keyword = $request->getParameter('k');
    $this->curPage = $request->getParameter('p');
    $this->curPage = (!empty($this->curPage))?$this->curPage:1;
    
    $param = array(
      'email' => $this->email,
      'company' => $this->company,
      'keyword' => $this->keyword,
      'curPage' => $this->curPage
    );
    $this->attendees = EventAttendeeTable::getInstance()->getAllAttendee($id,$param);
  }
  
}