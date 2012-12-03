<?php

/**
 * event actions.
 *
 * @package    symfony
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request){
    $this->type = $request->getParameter('type');
    $this->city = $request->getParameter('city');
    if(!$this->type || !$this->city){
      $this->forward404();
    }
    $param = array(
      'venue' => '',
      'keyword' => '',
      'state' => '',
      'city' => $this->city,
      'curPage' => ''
    );
    $this->events = EventTable::getInstance()->getAllEvent($this->type,$param);
  }
}
