<?php
class editAttendeeAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
    
    $this->id = $request->getParameter('id');
    $this->attendee = Doctrine_Core::getTable('EventAttendee')->find($this->id);
    
    $this->form = new AdminEventAttendeeForm($this->attendee);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('attendee'));
      if($this->form->isValid()){
        $user_id = $request->getParameter('user_id');
        $post = $request->getParameter('attendee');
        $user = Doctrine_Core::getTable('User')->find($user_id);
        if($user){
          //attendee update
          $attendee = Doctrine_Core::getTable('EventAttendee')->find($this->id);
          $attendee->setPaid($post['paid']);
          $attendee->save();
          
          //user update
           $user = Doctrine_Core::getTable('User')->find($user_id);
           $user->setEmail($post['email']);
           $user->setFname($post['fname']);
           $user->setLname($post['lname']);
           $user->setDob(date('Y-m-d',strtotime($post['dob'])));
           $user->save();
          
          //profile update
          $profile = Doctrine_Core::getTable('Profile')->find($user_id);
          $profile->setCompany($post['company']);
          $profile->setCityId($post['city']);
          $profile->save();
          
          return $this->redirect('/AdmSys.php/event-view/'.$attendee->getEventId());
        }
      }
    }
  }
  
}
?>