<?php

/**
 * user module helper.
 *
 * @package    symfony
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userGeneratorHelper extends BaseUserGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'profile' : 'profile_'.$action;
  }
}