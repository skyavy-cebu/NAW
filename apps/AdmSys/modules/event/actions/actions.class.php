<?php

/**
 * event actions.
 *
 * @package    symfony
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
sfContext::getInstance()->getConfiguration()->loadHelpers(array('Mix'));
class eventActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request){
    $this->curPage = $request->getParameter('p');
    $this->venue = $request->getParameter('v');
    $this->keyword = $request->getParameter('k');
    $this->curState = $request->getParameter('s');
    $this->curCity = $request->getParameter('c');
    $this->curPage = (!empty($this->curPage))?$this->curPage:1;
    $this->type = $request->getParameter('type');
    $this->states =  Doctrine_Core::getTable('State')->findAll();
    $this->cities =  CityTable::getInstance()->getCitiesByState($this->curState);
    
    $param = array(
      'venue' => $this->venue,
      'keyword' => $this->keyword,
      'state' => $this->curState,
      'city' => $this->curCity,
      'curPage' => $this->curPage
    );    
    $this->events = EventTable::getInstance()->getAllEvent($this->type,$param);
  }
  
   public function executeDelete(sfWebRequest $request){
    $id = $request->getParameter('id');
    if($id){
      $eventAttendee = Doctrine_Core::getTable('EventAttendee')->findByEventId($id);
      $eventAttendee->delete();
    
      $event = Doctrine_Core::getTable('Event')->find($id);
      $event->delete();
    }
    return $this->renderText('');
   }
   
  public function executeUploadPhoto(sfWebRequest $request){
    $file = $this->request->getFiles();
    $file = $file['event']['photo'];
    if(!$file){
      return  $this->forward404();
    }
    
    $full = sfConfig::get('app_event_full');
    $small = sfConfig::get('app_event_small');
    $dir = sfConfig::get('app_event_dir');
    
    $id = $request->getParameter('id');
        
    //saving & cropping picture
    $image_full = encode('event-'.$id).'.jpg';
    $image_small = encode('event-'.$id).'_thumb.jpg';
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
    $event = Doctrine_Core::getTable('Event')->find($id);
    $event->setImageFull($image_full);
    $event->setImageSmall($image_small);
    $event->save();
    
    $data = array(
      'image_full' => $image_full.'?r='.rand(1000,9999),
      'image_small' => $image_small.'?r='.rand(1000,9999)
    );
    return $this->renderText(json_encode($data));
  }
   
}