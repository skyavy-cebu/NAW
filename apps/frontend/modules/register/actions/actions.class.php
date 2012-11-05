<?php

/**
 * register actions.
 *
 * @package    naw
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
  {
    $this->form = new UserRegisterForm();
  }
	
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UserRegisterForm();

    $this->processUserForm($request, $this->form);

    $this->setTemplate('index');
  }
	
	protected function processUserForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {	
			sfContext::getInstance()->getConfiguration()->loadHelpers(array('Mix', 'Email'));
      $password = $this->md5hash($this->form->getValue('pass'));
			$activation = $this->md5hash(time());
			
			$aeUser = new User();
			$aeUser->setEmail($this->form->getValue('email'));
			$aeUser->setPass($password);
			$aeUser->setFname($this->form->getValue('fname'));
			$aeUser->setLname($this->form->getValue('lname'));
			$aeUser->setDob($this->form->getValue('dob'));
			$aeUser->setActivation($activation);
			$aeUser->save();
			
			email_registeractivation($this->form->getValue('email'), $activation, base_url());
			
			$this->redirect('register/confirmationsent');
			
    }
  }
	
	public function executeConfirmationsent(sfWebRequest $request)
  {

  }
	
	public function executeActivate(sfWebRequest $request) {
		$activationCode = $this->getRequestParameter('acode');
		if($activationCode) $user = UserTable::getInstance()->findOneBy('activation', $activationCode);
		if(!empty($user['id'])) {
			$user->setActive(1);
			$user->setActivation('');
			$user->save();
			$this->is_error = 0;
			
			$this->pform = new ProfileRegisterForm();
		}
		else {
			$this->is_error = 1;
			$this->pform = new ProfileRegisterForm();
		}
		
		
	}
	



	
	public function executeNew(sfWebRequest $request)
  {
    $this->users = Doctrine_Core::getTable('User')
      ->createQuery('a')
      ->execute();
  }
	
	public function executeShow(sfWebRequest $request)
  {
    $this->user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->user);
  }
	
	
	
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserRegisterForm($user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserRegisterForm($user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $user->delete();

    $this->redirect('register/index');
  }

  
}
