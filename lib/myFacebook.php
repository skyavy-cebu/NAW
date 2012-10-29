<?php

require_once ('facebook/facebook.php');

class myFacebook extends Facebook
{
	public function __construct($config)
  {
		parent::__construct($config);
  }
}