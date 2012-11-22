<?php
class forgotAction extends sfAction{
  
  public function execute($request){   
    //Retrive Password
    $post = $request->getParameter('forgot');
    $email = $post['email'];
    if($post['email']){  
      $this->retrivePassword($email);
      return 'Activation';
    }
    
    //Checking Code
    $code = $request->getParameter('code');
    if($code){
      $user = Doctrine_Core::getTable('User')->findOneByActivation($code);
      if(!$user){
        return 'InvalidCode';
      }else{
        $retrive = $request->getParameter('retrive');
        if($retrive){
          $this->changePass($user,$retrive['pass1']);
          return 'Completed';
        }
        $this->code = $code;
        return 'Form';
      }
    }
  }
  
  public function retrivePassword($email){
    $user = Doctrine_Core::getTable('User')->findOneByEmail($email);
    if(!$user || $user->getAppType() != 0){
      $this->error = 'Email address is invalid';
    }else{
      sfContext::getInstance()->getConfiguration()->loadHelpers(array('Email'));
      $code = md5hash($user->getId().time());
      $user->setActivation($code);
      $user->save();
      
      email_forgot($email,$user->getFname(),$code);
    }
  }
  
  public function changePass($user,$pass){
    $pass = md5hash($pass);
    $user->setPass($pass);
    $user->setActivation('');
    $user->save();
  }
  
}