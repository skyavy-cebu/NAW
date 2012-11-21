<?php
class homeComponents extends sfComponents{
  
  public function executeSidebar(){
    if($this->getUser()->isAuthenticated()){
      $this->user = $this->getUser()->getAccount();
      $this->profile = $this->user->getProfile();
      $this->name = $this->user->getFname().' '.$this->user->getLname();
    }
    
    //news
    $this->news = NewsTable::getInstance()->getLatestNews(4);
    
    //sponsor
    $this->sponsor = SponsorTable::getInstance()->getSponsor();
  }
  
}