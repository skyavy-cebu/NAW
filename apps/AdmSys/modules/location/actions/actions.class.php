<?php

/**
 * location actions.
 *
 * @package    symfony
 * @subpackage location
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class locationActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request){
    $this->curPage = $request->getParameter('p');
  
    $param = array(
      'curPage' => $this->curPage
    );
    $this->cities = CityTable::getInstance()->getCityList($param);
  }
}
