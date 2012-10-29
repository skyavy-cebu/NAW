<?php 
class linkedinAction extends sfAction{
  
  public function execute($request){
    $linkedin = new myLinkedin();
    $data = $linkedin->handle_linkedin_oauth();
    if(!is_array($data)){
      $this->redirect($data);
    }else{
      $person = $data['person'];
      if(isset($data['error'])){
        unset($_SESSION['linkedinoauthstate']);
        $this->redirect('/login/linkedin');
      }else{
        $app_id = $data['person']['id'];
        $user = UserTable::getInstance()->getUserByAppId($app_id,$type_id=2);
        if($user){
          $user_data = Doctrine::getTable('User')->find($user['id']);
          $user = $this->getUser();
          $user->signIn($user_data);
          return $this->redirect('/home');
        }else{
          //register
          $user = new User();
          $user->setEmail($person['email-address']);
          $user->setFname($person['first-name']);
          $user->setLname($person['last-name']);
          $birth = $person['date-of-birth'];
          $user->setDob($birth['year'].'-'.$birth['month'].'-'.$birth['day']);
          $user->setAppType(2);
          $user->setAppId($app_id);
          $user->setActive(1);
          $user->save();
          $user_id = $user->getId();
          
          $profile = new Profile();
          $profile->setId($user_id);
          $profile->setAddress($person['main-address']);
          $profile->setIdo($person['summary']);
          $profile->setlinkedinUrl($person['public-profile-url']);
          $profile->save();
          if($person['picture-urls']['picture-url']){
            $this->__upload_images($user_id,$person);
          }
          
          $user_data = Doctrine::getTable('User')->find($user_id);
          $user = $this->getUser();
          $user->signIn($user_data);
          return $this->redirect('/home');
        }
      }
    }
    return $this->renderText('');
  } 
  
  function __upload_images($user_id,$person){
    //saving & cropping picture
    $full = sfConfig::get('app_user_full');
    $small = sfConfig::get('app_user_small');
    $dir = sfConfig::get('app_user_dir');
    $pic_raw = file_get_contents($person['picture-urls']['picture-url']);
    $image_full = encode('profile-'.$user_id).'.jpg';
    $image_small = encode('profile-'.$user_id).'_thumb.jpg';
    $image_full_path = $dir.$image_full;
    $image_small_path = $dir.$image_small;
    
    file_write($dir.$image_full,$pic_raw);
    
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
    
    $profile = Doctrine::getTable('Profile')->find($user_id);
    $profile->setImageFull($image_full);
    $profile->setImageSmall($image_small);
    $profile->save();
  }
   
}