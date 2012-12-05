<?php
class registerDoneAction extends sfAction{
  
  public function execute($request){
    $event_id = $request->getParameter('id');
    $this->event = EventTable::getInstance()->getEventById($event_id);
    if(!$this->event){
      $this->forward404();
    }
  }
  
}