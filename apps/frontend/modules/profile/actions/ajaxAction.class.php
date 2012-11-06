<?php
class ajaxAction extends sfAction{
  
  public function execute($request){
    $var = $request->getParameter('var');
    $val = $request->getParameter('val');
    switch($var){
      case 'city':
        return $this->getOptionCity($val);
        break;
    }
    return $this->renderText('');
  }
  
  function getOptionCity($state_id){
    $city = CityTable::getInstance()->getCitiesByState($state_id);
    $option = '<option value="0">Select City</option>';
    foreach($city as $x => $row){
      $option .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    return $this->renderText($option);
  }
  
}