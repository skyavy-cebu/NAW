<?php
class viewAction extends sfAction{

  public function execute($request){
    $this->id = $request->getParameter('id');   
    $this->event = EventTable::getInstance()->getEventById($this->id);
    if(!$this->event){
      $this->forward404();
    }
  }
  
}