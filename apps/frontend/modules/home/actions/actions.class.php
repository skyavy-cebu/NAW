<?php

/**
 * home actions.
 *
 * @package    symfony
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request){
    $param = array(
      'curPage' => 1
    );
    $this->events = EventTable::getInstance()->getAllEvent('upcoming',$param);
  }
  
  public function executeAbout(sfWebRequest $request){
  }
  
}
