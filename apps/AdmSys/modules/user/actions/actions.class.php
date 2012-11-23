<?php

/**
 * user actions.
 *
 * @package    symfony
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
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
  
  public function executeDelete(sfWebRequest $request){
    $id = $request->getParameter('id');
    if(!$id){
      $this->forward404();
    }
    
    $user = Doctrine_Core::getTable('User')->find($id);
    if(!$user){
      $this->forward404();
    }
    
    //delete profile
    $profile = Doctrine_Core::getTable('Profile')->find($id);
    $profile->delete();
    
    //delete user
    $user->delete();
    
    return $this->renderText($id);
  }
  
  public function executeIndex(sfWebRequest $request){
    $this->curPage = $request->getParameter('p');
    $this->email = $request->getParameter('e');
    $this->curState = $request->getParameter('s');
    $this->curCity = $request->getParameter('c');
    $this->company = $request->getParameter('co');
    $this->keyword = $request->getParameter('k');
    $this->states =  Doctrine_Core::getTable('State')->findAll();
    $this->cities =  CityTable::getInstance()->getCitiesByState($this->curState);
    
    $param = array(
      'email' => $this->email,
      'company' => $this->company,
      'keyword' => $this->keyword,
      'state' => $this->curState,
      'city' => $this->curCity,
      'curPage' => $this->curPage
    );    
    $this->users = UserTable::getInstance()->getAllUser($param);
  }
}
