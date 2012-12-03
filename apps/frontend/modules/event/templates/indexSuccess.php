<script type="text/javascript">
  function goChange(){
    city = $('#event_city').val();
    if(city != 0){
      window.location = '/event/upcoming/'+city;
    }
  }
</script>

<div id="content" class="content_dashboard_wrapper home">
<div>  
  <h2 class="text_gray upcoming_events_margin text_museosans500">UPCOMING EVENTS</h2>
  <div class="events_city_drop_down_wrapper">
    SEE EVENTS IN YOUR CITY
    <select id="event_city" name="event[city]" onchange="goChange()">
      <option value="0">Select City</option>
      <?php $dcities = CityTable::getInstance()->getCitiesByState(); ?>
      <?php foreach($dcities as $x => $dcity): ?>
        <?php $selected = ($dcity->getId() == $city)?'selected="selected"':''; ?>
        <option value="<?php echo $dcity->getId(); ?>" <?php echo $selected; ?>><?php echo $dcity->getName(); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<?php include_partial('event/loop',array('events'=>$events,'type'=>$type)); ?>

</div>
<?php include_component('home','sidebar',array()); ?>