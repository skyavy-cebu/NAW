<?php
class addAction extends sfAction{

  public function execute($request){
    $this->form = new CityForm();
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('location'));
      if($this->form->isValid()){
        $post = $request->getParameter('location');
        $city = new City();
        $city->setStateId($post['state']);
        $city->setName($post['name']);
        $city->save();
        return $this->redirect('/AdmSys.php/location');
      }
    }
  }
  
}