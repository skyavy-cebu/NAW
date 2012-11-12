<?php
class dashboardAction extends sfAction{
  
  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
    
    $this->user = $this->getUser()->getAccount();
    $this->profile = $this->user->getProfile();
    $this->name = $this->user->getFname().' '.$this->user->getLname();
    
    //my industry
    $my_industry = ProfileIndustryTable::getInstance()->getProfileIndustry($this->user->getId());
    if($my_industry){
      foreach($my_industry as $x => $row){
        $data[] = $row->getIndustry()->getName();
      }
      $this->my_industry = implode(', ',$data);
    }
    
    //who I want to meet
    $data = array();
    $industry_meet = ProfileIndustryTable::getInstance()->getProfileIndustry($this->user->getId(),1);
    if($industry_meet){
      foreach($industry_meet as $x => $row){
        $data[] = $row->getIndustry()->getName();
      }
      $this->industry_meet = implode(', ',$data);
    }        
  }
  
}