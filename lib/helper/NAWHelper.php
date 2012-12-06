<?php 
function getStateOption(){
  $states = Doctrine_Core::getTable('State')->findAll();
  if($states){
    $option = '<option>Select State</option>';
    foreach($states as $x => $state){
      $option .= '<option value="'.$state->getId().'">'.$state->getName().'</option>';
    }
    return $option;
  }
}

function getCityOption(){
  $states = Doctrine_Core::getTable('City')->findAll();
  if($states){
    $option = '<option>Select City</option>';
    foreach($states as $x => $state){
      $option .= '<option value="'.$state->getId().'">'.$state->getName().'</option>';
    }
    return $option;
  }
}
?>