<?php
class homeComponents extends sfComponents{
  
  public function executeSidebar(){
    $this->user = $this->getUser()->getAccount();
    $this->profile = $this->user->getProfile();
    $this->name = $this->user->getFname().' '.$this->user->getLname();
  }
  
}