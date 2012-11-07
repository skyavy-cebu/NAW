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
  
  public function executeUploadPic(sfWebRequest $request){
    $file = $this->request->getFiles();
    $file = $file['profile']['photo'];
    if(!$file){
      return  $this->forward404();
    }
    
    $full = sfConfig::get('app_user_full');
    $small = sfConfig::get('app_user_small');
    $dir = sfConfig::get('app_user_dir');
    
    $id = $this->getUser()->getAccount()->getId();
    
    //saving & cropping picture
    $image_full = encode('profile-'.$id).'.jpg';
    $image_small = encode('profile-'.$id).'_thumb.jpg';
    $image_full_path = $dir.$image_full;
    $image_small_path = $dir.$image_small;
    rename($file['tmp_name'],$image_full_path);
    
    //cropping image_full
    $profile_image = new myImageManipulator($image_full_path);
    $profile_image->resample2($full, $full);
    $profile_image->crop(0, 0, $full, $full);
    $profile_image->save($image_full_path);
    
    //cropping image_small
    $profile_image = new myImageManipulator($image_full_path);
    $profile_image->resample2($small, $small);
    $profile_image->crop(0, 0, $small, $small);
    $profile_image->save($image_small_path);
    
    //update
    $user = Doctrine_Core::getTable('Profile')->find($id);
    $user->setImageFull($image_full);
    $user->setImageSmall($image_small);
    $user->save();
    
    $data = array(
      'image_full' => $image_full.'?r='.rand(1000,9999),
      'image_small' => $image_small.'?r='.rand(1000,9999)
    );
    return $this->renderText(json_encode($data));
  }

  public function executeEdit(sfWebRequest $request){
    $id = $this->getUser()->getAccount()->getId();
    $this->forward404Unless($profile = Doctrine_Core::getTable('Profile')->find(array($id)), sprintf('Object profile does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserProfileForm($profile);
    $this->user = $this->getUser()->getAccount();
    $this->profile = $this->user->getProfile();
    
    $user = Doctrine_Core::getTable('User')->find($id);
    $this->form2 = new UserForm($user);
    
    $user = $request->getParameter('user');
    if($request->getParameter('user')){
      $this->processUser($request, $this->form2);
      $this->focus = 'user';
    }else{
      $this->focus = 'profile';
    }
  }
  
  protected function processUser(sfWebRequest $request, sfForm $form){
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if($form->isValid()){
      $id = $this->form2->getValue('id');
      
      $email = $this->form2->getValue('email');
      if($email){
        //change email
        $user = Doctrine_Core::getTable('User')->find($id);
        $user->setEmail($email);
        $user->save();
      }
      
      $pass2 = $this->form2->getValue('pass2');
      if($pass2){
        //change pass
        $user = Doctrine_Core::getTable('User')->find($id);
        $user->setPass(md5hash($pass2));
        $user->save();
      }
      $this->redirect('profile/edit');
    }
  }

  public function executeUpdate(sfWebRequest $request){
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
