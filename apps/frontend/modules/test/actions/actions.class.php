<?php
//sfContext::getInstance()->getConfiguration()->loadHelpers(array('Mix'));
/**
 * test actions.
 *
 * @package    symfony
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request){
   display($_SESSION);
  }
  
  public function executePass(sfWebRequest $request){
    echo md5hash('admin123');
    return $this->renderText('');
  }
}