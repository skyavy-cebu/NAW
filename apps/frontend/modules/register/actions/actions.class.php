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
      $password = md5hash($this->form->getValue('pass'));
			$activation = md5hash(time());
			
			$aeUser = new User();
			$aeUser->setEmail($this->form->getValue('email'));
			$aeUser->setPass($password);
			$aeUser->setFname($this->form->getValue('fname'));
			$aeUser->setLname($this->form->getValue('lname'));
			$aeUser->setDob($this->form->getValue('dob'));
			$aeUser->setActivation($activation);
			$aeUser->save();
			
			$newId = $aeUser->getId();
			
			$i = 1;
			while ($i <= 2) {
			$UserProInd = new ProfileIndustry();
			$UserProInd->setUserId($newId);
			$UserProInd->setIndustryId($this->form->getValue('industry' . $i));
			$UserProInd->save();
			$i++;
			}
			
			$UserPro = new Profile();
			$UserPro->setId($newId);
			$UserPro->setCityId($this->form->getValue('city'));
			$UserPro->save();		
			
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
			
			$indvalue = $this->getuserIndustry($user['id']);		
			$this->uid = $user['id'];
			$this->form = new ProfileRegisterForm();
			$this->form->setDefaults($indvalue);
		
		}
		else {
			$this->is_error = 1;			
		}		
		
	}
	
	public function getuserIndustry($uid){
		$i=1;
		$this->proIndustry = Doctrine_Core::getTable('ProfileIndustry')
			->createQuery('a')
			->where('a.user_id = ?', $uid)
			->limit(4)
      ->execute();					
		$indvalue = array('id'=>$uid);
		foreach ($this->proIndustry as $s) { $indvalue['industry'.$i] = $s['industry_id']; $i++; }	
		return $indvalue;
	}
	
	public function executeProfileupdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($profile = Doctrine_Core::getTable('Profile')->find(array($request->getParameter('id'))), sprintf('Object profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProfileRegisterForm($profile);

    $this->processProfileForm($request, $this->form);


  }
	
	protected function processProfileForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $profile = $form->save();
			
			$this->forward404Unless($user = Doctrine_Core::getTable('ProfileIndustry')->findByUserId(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
      $user->delete();
			
			$i = 1;
			while ($i <= 4) {
			$indval = $this->form->getValue('industry' . $i);
			if(!empty($indval)){
			$UserProInd = new ProfileIndustry();
			$UserProInd->setUserId($request->getParameter('id'));
			$UserProInd->setIndustryId($this->form->getValue('industry' . $i));
			$UserProInd->save();
			}
			$i++;
			}
			
      $this->redirect('register/updated?id='.$profile->getId());
    }
  }
	public function executeUpdated(sfWebRequest $request)
  {

  }
	

  
}
