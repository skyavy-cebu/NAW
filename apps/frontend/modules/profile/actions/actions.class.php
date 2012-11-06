<?php

/**
 * profile actions.
 *
 * @package    symfony
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions{

  function preExecute(){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  }

  public function executeIndex(sfWebRequest $request){
    
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->profile = Doctrine_Core::getTable('Profile')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->profile);
  }

  public function executeEdit(sfWebRequest $request){
    $id = $this->getUser()->getAccount()->getId();
    $this->forward404Unless($profile = Doctrine_Core::getTable('Profile')->find(array($id)), sprintf('Object profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserProfileForm($profile);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($profile = Doctrine_Core::getTable('Profile')->find(array($request->getParameter('id'))), sprintf('Object profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserProfileForm($profile);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form){
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if($form->isValid()){
     $id = $this->form->getValue('id');
     $user = Doctrine_Core::getTable('User')->find(array($id));
     $user->setFname($this->form->getValue('fname'));
     $user->setLname($this->form->getValue('lname'));
     $user->save();
     
     //my industry
     $pi = ProfileIndustryTable::getInstance()->getProfileIndustry($id,0);
     $pi->delete();
     
     foreach(range(1,2) as $x){
      $industry_id = $this->form->getValue('my_industry'.$x);
      if(!$industry_id){
        continue;
      }
            
      $pi = new ProfileIndustry();
      $pi->setTypeId(0);
      $pi->setUserId($id);
      $pi->setIndustryId($industry_id);
      $pi->save();
     }
     
     //industries I want to meet
     $pi = ProfileIndustryTable::getInstance()->getProfileIndustry($id,1);
     $pi->delete();
     
     foreach(range(1,5) as $x){
      $industry_id = $this->form->getValue('industries_meet'.$x);
      if(!$industry_id){
        continue;
      }
       
      $pi = new ProfileIndustry();
      $pi->setTypeId(1);
      $pi->setUserId($id);
      $pi->setIndustryId($industry_id);
      $pi->save();
     }
     
     $profile = $form->save();
     $this->redirect('profile/edit');
    }
  }
}
