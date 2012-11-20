<?php
class addAction extends sfAction{

  public function execute($request){
    $this->form = new IndustryForm();
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('industry'));
      if($this->form->isValid()){
        $post = $request->getParameter('industry');
        $industry = new Industry();
        $industry->setName($post['name']);
        $industry->save();
        
        return $this->redirect('/AdmSys.php/industry');
      }
    }
  }
  
}