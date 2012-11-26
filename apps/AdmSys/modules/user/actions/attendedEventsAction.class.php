<?php
class attendedEventsAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
    
   
    $this->id = $request->getParameter('id');
    $this->user = Doctrine_Core::getTable('User')->find($this->id);
    
    $this->curPage = $request->getParameter('p');
    $this->keyword = $request->getParameter('k');
    $this->venue = $request->getParameter('v');
    
    $param = array(
      'curPage' => $this->curPage,
      'keyword' => $this->keyword,
      'venue' => $this->venue
    );
    $this->events = EventTable::getInstance()->getPassAttendedByUser($this->id,$param);
  }  
  
}