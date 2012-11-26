<?php
class addAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
  
    $this->form = new AdminUserProfileForm();
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('profile'));
      if($this->form->isValid()){
        $post = $request->getParameter('profile');
        
        $user = new User();
        $user->setFname($post['fname']);
        $user->setLname($post['fname']);
        $user->setEmail($post['email1']);
        $user->setPass(md5hash($post['pass1']));
        $user->setDob($post['dob']);
        $user->setActive($post['active']);
        $user->save();
        $user_id = $user->getId();
        
        $profile = new Profile();
        $profile->setId($user_id);
        $profile->setTitle($post['title']);
        $profile->setCompany($post['company']);
        $profile->setCityId($post['city_id']);
        $profile->setCompany($post['company']);
        $profile->setIdo($post['ido']);
        $profile->setToMeet($post['to_meet']);
        $profile->setLinkedinUrl($post['linkedin_url']);
        $profile->setFbUrl($post['fb_url']);
        $profile->setTwitterUrl($post['twitter_url']);
        $profile->save();
        
        //my industry
        foreach(range(1,2) as $x){
          $industry_id = $post['industries_meet'.$x];
          if(!$industry_id){
            continue;
          }
                
          $pi = new ProfileIndustry();
          $pi->setTypeId(0);
          $pi->setUserId($user_id);
          $pi->setIndustryId($industry_id);
          $pi->save();
        }
        
         //industries I want to meet
         foreach(range(1,5) as $x){
          $industry_id = $post['my_industry'.$x];
          if(!$industry_id){
            continue;
          }
           
          $pi = new ProfileIndustry();
          $pi->setTypeId(1);
          $pi->setUserId($user_id);
          $pi->setIndustryId($industry_id);
          $pi->save();
         }
        
        $file = $this->request->getFiles();
        $file = $file['profile']['photo'];
        if(isset($file)){
          $this->uploadFile($user_id,$file);
        }
     
       return $this->redirect('/AdmSys.php/user');
      }
    }
  }
  
  function uploadFile($id,$file){
    $full = sfConfig::get('app_user_full');
    $small = sfConfig::get('app_user_small');
    $dir = sfConfig::get('app_user_dir');
    $file['ext'] = getFileExtension($file['name']);
    
    //saving & cropping picture
    $image_full = encode('profile-'.$id).'.'.$file['ext'];
    $image_small = encode('profile-'.$id).'_thumb.'.$file['ext'];
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
  }
  
}
?>