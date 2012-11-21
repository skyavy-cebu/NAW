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
  public function executeIndex(sfWebRequest $request){
    //news
    $this->newsList = NewsTable::getInstance()->getLatestNews();
  }
  
  public function executeSingle(sfWebRequest $request){
    $id = $request->getParameter('id');
    $this->news = Doctrine_Core::getTable('News')->find($id);
    if(!$this->news){
       $this->forward404();
    }
  }
  
}