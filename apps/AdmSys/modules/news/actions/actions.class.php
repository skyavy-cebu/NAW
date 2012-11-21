<?php

/**
 * news actions.
 *
 * @package    symfony
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
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
      $news = Doctrine_Core::getTable('news')->find($id);
      
      $dir = sfConfig::get('app_news_dir');
      $image_full = $news->getImageFull();
      $image_small = $news->getImageSmall();
      if(is_file($dir.$image_full)){
        unlink($dir.$image_full);
      }
       if(is_file($dir.$image_small)){
        unlink($dir.$image_small);
      }
      
      
      $news->delete();
    }
    return $this->renderText($id);
  }
  
  public function executeIndex(sfWebRequest $request){
    $this->curPage = $request->getParameter('p');
    $this->search = $request->getParameter('s');
    
    $param = array(
      'search' => $this->search,
      'curPage' => $this->curPage
    );
    $this->newsList = NewsTable::getInstance()->getNewsList($param);
  }
}