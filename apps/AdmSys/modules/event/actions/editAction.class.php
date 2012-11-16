<?php
class editAction extends sfAction{

  public function execute($request){
    if(!$this->getUser()->isAuthenticated()){
      return $this->redirect('/login');
    }
  
    if(!$this->getUser()->isAdmin()){
      $this->forward404();
    }
  
    $id = $request->getParameter('id');
    $this->event = Doctrine_Core::getTable('Event')->find($id);
    $this->form = new EventForm($this->event);
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('event'));
      if($this->form->isValid()){
        $post = $request->getParameter('event');
        $event = Doctrine_Core::getTable('Event')->find($id);
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
      }
    }
  }

}