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
    $this->curPage = $request->getParameter('p');
    $this->venue = $request->getParameter('v');
    $this->keyword = $request->getParameter('k');
    $this->curState = $request->getParameter('s');
    $this->curCity = $request->getParameter('c');
    $this->curPage = (!empty($this->curPage))?$this->curPage:1;
        
    $this->states =  Doctrine_Core::getTable('State')->findAll();
    $this->cities =  CityTable::getInstance()->getCitiesByState($this->curState);
    
    $param = array(
      'venue' => $this->venue,
      'keyword' => $this->keyword,
      'state' => $this->curState,
      'city' => $this->curCity
    );    
    $this->events = EventTable::getInstance()->getAllEvent($this->curPage,$param);
  }
}