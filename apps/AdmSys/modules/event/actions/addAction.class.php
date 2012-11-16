<?php
class addAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
  
    $this->form = new EventForm();
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('event'));
      if($this->form->isValid()){
        $post = $request->getParameter('event');
        $event = new Event();
        $event->setEventDate(date('Y-m-d',strtotime($post['event_date'])));
        $event->setStartTime(date('H:i',strtotime($post['start_time'])));
        $event->setEndTime(date('H:i',strtotime($post['end_time'])));
        $event->setCityId($post['city']);
        $event->setVenue($post['venue']);
        $event->setAddress($post['address']);
        $event->setPrepaySlots($post['prepay_slots']);
        $event->setMaxCapacity($post['max_capacity']);
        $event->setAdmissionPrepay($post['admission_prepay']);
        $event->setAdmissionAtDoor($post['admission_at_door']);
        $event->setAdmissionNoRsvp($post['admission_no_rsvp']);
        $event->setDescription($post['description']);
        $event->save();
        $id = $event->getId();
        return $this->redirect('/AdmSys.php/event/edit/'.$id);
      }
    }
  }
  
}
?>