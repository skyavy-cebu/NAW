<?php
class UserProfileForm extends BaseProfileForm{

  public function configure(){
    unset( 
			$this['created_at'], $this['updated_at'],
      $this['image_small'], $this['image_full']
    );
    
    $id = $this->getObject()->get('id');
    $user = Doctrine_Core::getTable('User')->find($id);
    $state_id = '';
    $fname = '';
    $lname = '';
    if($user){
      $state_id = $user->getProfile()->getCity()->getStateId();
      $fname = $user->getFname();
      $lname = $user->getLname();
    }
    
    $dbState = Doctrine_Core::getTable('State')->findAll();
    $state = array('0'=>'Select State');
    foreach ($dbState as $s) $state[$s['id']] = $s['name'];
    
    $dbCity = CityTable::getInstance()->getCitiesByState($state_id);
    $city = array('0'=>'Select City');
    foreach ($dbCity as $s) $city[$s['id']] = $s['name'];
    
    $dbIndustry = IndustryTable::getInstance()->getAllIndustry();
    $industry = array('0'=>'Select Industry');
    foreach ($dbIndustry as $s) $industry[$s['id']] = $s['name'];
    
    //my_industry
    $pi = ProfileIndustryTable::getInstance()->getProfileIndustry($id);
    foreach(range(1,2) as $x){
      $my_industry[] = '';
    }
    foreach($pi as $x => $row){
      $my_industry[$x] = $row->getIndustryId();
    }
    
    //industries_meet
    $pi = ProfileIndustryTable::getInstance()->getProfileIndustry($id,1);
    $industries_meet = array();
    foreach(range(1,5) as $x){
      $industries_meet[] = '';
    }
    foreach($pi as $x => $row){
      $industries_meet[$x] = $row->getIndustryId();
    }
         
    $this->setWidgets(array(
      'fname'   => new sfWidgetFormInputText(array('default'=>$fname),array('placeholder'=>'First Name')),
      'lname'   => new sfWidgetFormInputText(array('default'=>$lname),array('placeholder'=>'Last Name')),
      'title'        => new sfWidgetFormInputText(),
      'company'      => new sfWidgetFormInputText(),
      'state_id'     => new sfWidgetFormSelect(array('choices' => $state)),
      'city_id'      => new sfWidgetFormSelect(array('choices' => $city)),
      'my_industry1' => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$my_industry[0])),
      'my_industry2' => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$my_industry[1])),
      'address'      => new sfWidgetFormInputText(),
      'ido'    => new sfWidgetFormTextarea(),
      'industries_meet1'  => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$industries_meet[0])),
      'industries_meet2'  => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$industries_meet[1])),
      'industries_meet3'  => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$industries_meet[2])),
      'industries_meet4'  => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$industries_meet[3])),
      'industries_meet5'  => new sfWidgetFormSelect(
        array('choices' => $industry,'default'=>$industries_meet[4])),
      'to_meet' => new sfWidgetFormTextarea(),
      'position'      => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
      'website'      => new sfWidgetFormInputText(array(),array('placeholder'=>'http://')),
      'linkedin_url' => new sfWidgetFormInputText(array(),array('placeholder'=>'http://')),
      'fb_url'       => new sfWidgetFormInputText(array(),array('placeholder'=>'http://')),
      'twitter_url'  => new sfWidgetFormInputText(array(),array('placeholder'=>'http://')),
      'olio_url' => new sfWidgetFormInputText()
    ));
    
    $this->setValidators(array(
      'fname'   => new sfValidatorString(array('max_length' => 150,'required' => true),array('required'=>'Please enter First name')),
      'lname'   => new sfValidatorString(array('max_length' => 150,'required' => true),array('required'=>'Please enter Last name')),
      'title'        => new sfValidatorString(array('max_length' => 5,'required' => true),array('required'=>'Please enter Title')),
      'company'      => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'position'      => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'phone'      => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'website'      => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'state_id'     => new sfValidatorInteger(array('required' => false)),
      'city_id'      => new sfValidatorInteger(array('required' => false)),
      'my_industry1'      => new sfValidatorInteger(array('required' => false)),
      'my_industry2'      => new sfValidatorInteger(array('required' => false)),
      'address'      => new sfValidatorString(array('max_length' => 255,'required' => false)),
      'ido'         => new sfValidatorPass(array('required' => false)),
      'industries_meet1' => new sfValidatorInteger(array('required' => false)),
      'industries_meet2' => new sfValidatorInteger(array('required' => false)),
      'industries_meet3' => new sfValidatorInteger(array('required' => false)),
      'industries_meet4' => new sfValidatorInteger(array('required' => false)),
      'industries_meet5' => new sfValidatorInteger(array('required' => false)),
      'to_meet'      => new sfValidatorPass(array('required' => false)),
      'linkedin_url' => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'fb_url'       => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'twitter_url'  => new sfValidatorString(array('max_length' => 150,'required' => false)),
      'olio_url'  => new sfValidatorString(array('max_length' => 150,'required' => false)),
    ));
    
    $this->widgetSchema->setLabels(array(
			'fname'    => 'First Name',
			'lname'    => 'Last Name',
      'linkedin_url' => 'LinkedIn URL',
      'fb_url' => 'Facebook URL',
      'twitter_url' => 'Twitter URL',
      'olio_url' => 'Olio URL',
      'to_meet' => 'Who I want to meet',
      'ido' => 'What I do',
      'my_industry1' => 'My Industry',
      'my_industry2' => '&nbsp;',
      'industries_meet1' => 'Industries I want to meet',
      'industries_meet2' => '&nbsp;',
      'industries_meet3' => '&nbsp;',
      'industries_meet4' => '&nbsp;',
      'industries_meet5' => '&nbsp;',
		));
    
    $this->widgetSchema->setNameFormat('profile[%s]');
    
  }
  
}