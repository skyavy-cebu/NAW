<?php
class mapAction extends sfAction{

  public function execute($request){
    $this->address = $request->getParameter('address');
    $this->address =  decode($this->address);
    if(!$this->address){
       $this->forward404();
    }
  }
  
}