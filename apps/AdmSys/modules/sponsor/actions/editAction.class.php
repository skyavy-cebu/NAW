<?php
class editAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
    
    $id = $request->getParameter('id');
    $this->sponsor = Doctrine_Core::getTable('Sponsor')->find($id);
  
    $this->form = new SponsorForm($this->sponsor);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('sponsor'));
      if($this->form->isValid()){
        $post = $request->getParameter('sponsor');
        
        $this->sponsor->setCompany($post['company']);
        $this->sponsor->setUrl($post['url']);
        $this->sponsor->setPosition($post['position']);
        $this->sponsor->setStatusId($post['status']);
        $this->sponsor->save();
        $sponsor_id = $this->sponsor->getId();
        
        $file = $this->request->getFiles();
        if($file['sponsor']['file']['name'] || $file['sponsor']['photo']['name']){
          $file = ($file['sponsor']['file'])?$file['sponsor']['file']:$file['sponsor']['photo'];
          $this->uploadFile($sponsor_id,$file);
        }
        
        return $this->redirect('/AdmSys.php/sponsor');
      }
    }
  }
  
  public function uploadFile($id,$file){
    $dir = sfConfig::get('app_sponsor_dir');
    $file['ext'] = getFileExtension($file['name']);
        
    $file_name = encode('sponsor-'.$id).'.'.$file['ext'];
    $file_path = $dir.$file_name;
    rename($file['tmp_name'],$file_path);
    
    $sponsor = Doctrine_Core::getTable('sponsor')->find($id);
    $sponsor->setFile($file_name);
    $sponsor->save();
  }
  
}
?>