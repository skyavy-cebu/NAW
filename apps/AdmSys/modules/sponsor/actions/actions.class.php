<?php

/**
 * sponsor actions.
 *
 * @package    symfony
 * @subpackage sponsor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sponsorActions extends sfActions
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
    if($id){
      $sponsor = Doctrine_Core::getTable('Sponsor')->find($id);
      
      $dir = sfConfig::get('app_sponsor_dir');
      $file = $sponsor->getFile();
      if(is_file($dir.$file)){
        unlink($dir.$file);
      }
      
      $sponsor->delete();
    }
    return $this->renderText('');
  }
  
  public function executeIndex(sfWebRequest $request){
    $this->sponsors = SponsorTable::getInstance()->getSponsor();
  }
}
