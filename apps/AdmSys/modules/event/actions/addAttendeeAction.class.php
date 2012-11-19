<?php
class addAttendeeAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
    
    $this->id = $request->getParameter('id');
    
    $this->form = new AdminEventAttendeeForm($this->event);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('attendee'));
      if($this->form->isValid()){
        $post = $request->getParameter('attendee');
        
        //check if user already exist
        $user = Doctrine_Core::getTable('User')->findOneByEmail($post['email']);
        if($user){
          $attendee = new EventAttendee();
          $attendee->setEventId($this->id);
          $attendee->setUserId($user->getId());
          $attendee->setPaid($post['paid']);
          $attendee->save();
          return $this->redirect('/AdmSys.php/event-view/'.$this->id);
        }else{
          //create user
          $user = new User();
          $user->setEmail($post['email']);
          $user->setFname($post['fname']);
          $user->setLname($post['lname']);
          $user->setDob(date('Y-m-d',strtotime($post['dob'])));
          $user->save();
          $user_id = $user->getId();
          
          //create profile
          $profile = new Profile();
          $profile->setId($user_id);
          $profile->setCityId($post['city']);
          $profile->setCompany($post['company']);
          $profile->save();
          
          //create profile industry
          $pi = new ProfileIndustry();
          $pi->setUserId($user_id);
          $pi->setIndustryId($post['industry']);
          $pi->setTypeId(0);
          $pi->save();
          
          //create event attendee
          $attendee = new EventAttendee();
          $attendee->setEventId($this->id);
          $attendee->setUserId($user_id);
          $attendee->setPaid($post['paid']);
          $attendee->save();
          
          return $this->redirect('/AdmSys.php/event-view/'.$this->id);
        }
      }
    }
  }
  
}
?>