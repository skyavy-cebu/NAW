<?php
class myUser extends sfBasicSecurityUser{
  protected $user = NULL;
  protected $profile = NULL;

  public function __construct(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array()) {
		parent::__construct($dispatcher, $storage, $options);

		//refresh the account object for the current authenticated account to get an actual information
		if ($this->isAuthenticated()) {
			//recreate an Account object
			$this->_refreshAccountObject();

			//refresh user credentails
			//commented because problem with CSRF token is catched
			//account must relogin to apply a new credentials
			//$this->_refreshUserCredentials();
		}
	}

  
  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array()) {
		//parent initialization first because need to define a AttributeHolder
		parent::initialize($dispatcher, $storage, $options);

		//is a first request in the current session?
		if ($this->isFirstRequest()) {
			//is culture exists in the cookies?
			if ($cookie_culture = sfContext::getInstance()->getRequest()->getCookie(sfConfig::get('app_culture_cookie_name', 'lang'))) {
				$this->setCulture($cookie_culture);
			} else {
				//default culture depending on available cultures and
				$this->setCulture(sfContext::getInstance()->getRequest()->getPreferredCulture(sfConfig::get('app_site_available_languages')));
			}

			$this->isFirstRequest(FALSE);
		}
	}
  
  public function setCulture($culture) {
		if ($this->culture != $culture) {
			sfContext::getInstance()->getResponse()->setCookie(sfConfig::get('app_culture_cookie_name', 'lang'), $culture, time() + sfConfig::get('app_culture_expiration_age', 31536000));
		}

		return parent::setCulture($culture);
	}
  
  public function isFirstRequest($boolean = null) {
		if (is_null($boolean)) {
			return $this->getAttribute('first_request', TRUE, 'frontend_module');
		}
		$this->setAttribute('first_request', $boolean, 'frontend_module');
	}
  
  public function signIn($user){
    $this->setAuthenticated(TRUE);
    $this->setAttribute('id', $user->getId(), 'frontend_module');
    
    $this->_refreshAccountObject();
  }
  
  private function _refreshAccountObject() {
		//assign account object to the current authenticated user
		$this->user = UserTable::getInstance()->find($this->getAttribute('id', NULL, 'frontend_module'));
    $this->profile = ProfileTable::getInstance()->find($this->getAttribute('id', NULL, 'frontend_module'));
	}
  
  public function getAccount() {
		return $this->user;
	}
  
  public function getProfile() {
    if($this->profile){
      return $this->profile;
    }
	}

  public function signOut() {
		//delete authenticated flag
		$this->setAuthenticated(FALSE);
    
		//delete account attribute
		$this->getAttributeHolder()->remove('id', NULL, 'frontend_module');
	}
  
}