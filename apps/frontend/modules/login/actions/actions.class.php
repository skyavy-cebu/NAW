<?php
sfContext::getInstance()->getConfiguration()->loadHelpers(array('Mix'));
/**
 * login actions.
 *
 * @package    symfony
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute(){ 
  }
  
  public function executeIndex(sfWebRequest $request){
    if($this->getUser()->isAuthenticated()){
      $this->redirect('/home');
    }
    
    $login = $request->getParameter('login');
    if($login){
      $email = $login['email'];
      $pass = md5hash($login['pass']);
      $user = UserTable::getInstance()->findOneByEmail($email);
      if($user && $user->getId()){
         if($pass != $user->getPass()){
           $this->notify = 'Invalid Email/Password';
         }
         
         if(!$this->notify){
          $this->getUser()->signIn($user);
          if($this->getUser()->isAdmin()){
            return $this->redirect('/AdmSys.php/event-type/now');
          }
          return $this->redirect('/home');
         }
      }else{
        $this->notify = 'Invalid Email/Password';
      }
      $this->email = $email;
    }//end login
  }
  
  public function executeLogout(sfWebRequest $request){
    //unset  linkedin
    unset($_SESSION['linkedinoauthstate']);
    
    //unset facebook
    $app_id = sfConfig::get('app_facebook_app_id');
    unset($_SESSION['fb_'.$app_id.'_code']);
		unset($_SESSION['fb_'.$app_id.'_access_token']);
		unset($_SESSION['fb_'.$app_id.'_user_id']);
    
    $this->getUser()->signOut();
    return $this->redirect('/login');
  }
}
