<?php

/**
 * industry actions.
 *
 * @package    symfony
 * @subpackage industry
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class industryActions extends sfActions
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
      $industry = Doctrine_Core::getTable('Industry')->find($id);
      $industry->delete();
    }
    return $this->renderText($id);
  }
  
  public function executeIndex(sfWebRequest $request){
    $this->curPage = $request->getParameter('p');
    
    $param = array(
      'curPage' => $this->curPage
    );
    $this->industries = IndustryTable::getInstance()->getIndustryList($param);
  }
}
