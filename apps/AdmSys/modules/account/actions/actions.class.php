<?php

/**
 * account actions.
 *
 * @package    symfony
 * @subpackage account
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute(){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
  }
  
  public function executeIndex(sfWebRequest $request){
    $user = $this->getUser()->getAccount();
    $this->form = new UserForm($user);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('user'));
      if($this->form->isValid()){
        $email = $this->form->getValue('email1');
        if($email){
          //change email
          $user->setEmail($email);
          $user->save();
          $this->redirect('/AdmSys_dev.php/account?msg=email');
        }
        
        $pass2 = $this->form->getValue('pass2');
        if($pass2){
          //change pass
          $user->setPass(md5hash($pass2));
          $user->save();
          $this->redirect('/AdmSys_dev.php/account?msg=pass');
        }
      }
    }
    $this->msg = $request->getParameter('msg');
  }
}
