<div id="content" class="content_dashboard_wrapper home">
<div>  
  <h2 class="text_gray upcoming_events_margin text_museosans500">UPCOMING EVENTS</h2>
  <div class="events_city_drop_down_wrapper">
    SEE EVENTS IN YOUR CITY
    <select>
      <option>Select City</option>
      <?php $cities = CityTable::getInstance()->getCitiesByState(); ?>
      <?php foreach($cities as $x => $city): ?>
        <option value="<?php echo $city->getId(); ?>"><?php echo $city->getName(); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<?php include_partial('event/loop',array('events'=>$events)); ?>

</div>
<?php include_component('home','sidebar',array()); ?>