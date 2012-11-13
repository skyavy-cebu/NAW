<?php
/*/profile/ajax?var=city&val=*/
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
    $cities = CityTable::getInstance()->getCitiesByState($state_id);
    $option = '<option value="0">Select City</option>';
    foreach($cities as $x => $city){
      $option .= '<option value="'.$city->getId().'">'.$city->getName().'</option>';
    }
    return $this->renderText($option);
  }
}