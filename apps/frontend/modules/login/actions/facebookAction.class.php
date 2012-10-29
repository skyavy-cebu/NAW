<?php
class facebookAction extends sfAction{
  
  public function execute($request){
    $fb_config = array(
      'appId' => sfConfig::get('app_facebook_app_id'),
      'secret' => sfConfig::get('app_facebook_secret')
    );
    $fb = new myFacebook($fb_config);
    $app_id = $fb->getUser();
    $data['scope'] = array('email','user_birthday','user_about_me');
		$login_url = $fb->getLoginUrl($data);
    if(!$app_id) {
			$this->redirect($login_url);
		}else{
      $fb = $fb->api('/me', 'GET');
      $fb_email = $fb['email'];
      $user = UserTable::getInstance()->getUserByAppId($app_id,$type_id=1);
      if($user){
        //login
        $user_data = Doctrine::getTable('User')->find($user['id']);
        $user = $this->getUser();
        $user->signIn($user_data);
        return $this->redirect('/home');
      }else{
        //display($fb);
        //check email if exist
        $user = Doctrine::getTable('User')->findOneByEmail($fb['email']);
        if($user && $app_id != $user->getAppId()){
          return $this->renderText('Email Address already exists in the database');
        }    
        //register
        $user = new User();
        $user->setEmail($fb['email']);
        $user->setAppId($app_id);
        $user->setAppType(1);
        if(isset($fb['birthday'])){
          $user->setDob(date('Y-m-d',strtotime($fb['birthday'])));
        }
        $user->setFname($fb['first_name']);
        $user->setLname($fb['last_name']);
        $user->setActive(1);
        $user->save();
        $user_id = $user->getId();
        
        $profile = new Profile();
        $profile->setId($user_id);
        $profile->setAddress($fb['location']['name']);
        if(isset($fb['bio'])){
          $profile->setIdo($fb['bio']);
        }
        $profile->setFbUrl($fb['link']);
        $profile->save();
        
        $this->__upload_images($user_id,$fb);
        
        $user_data = Doctrine::getTable('User')->find($user_id);
        $user = $this->getUser();
        $user->signIn($user_data);
        return $this->redirect('/home');
      }
    }
    return $this->renderText('');
  }
  
  function __upload_images($user_id,$fb){
    //saving & cropping picture
    $full = sfConfig::get('app_user_full');
    $small = sfConfig::get('app_user_small');
    $dir = sfConfig::get('app_user_dir');
    $pic_raw = file_get_contents('http://graph.facebook.com/'.$fb['id'].'/picture?type=large');
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
?>