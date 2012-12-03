<?php
class viewAction extends sfAction{

  public function execute($request){
    $this->id = $request->getParameter('id');
    if(!$this->id){
      $this->forward404();
    }
    
    $this->event = EventTable::getInstance()->getEventById($this->id);
  }
  
}