<script>
  $(document).ready(function(){
    $('.state').change(function(){
      getOptionCity($(this).val());
    });
  });
  
  function getOptionCity(state_id){
    $.get('/profile/ajax?var=city&val='+state_id,function(data){
      $('.city').html(data);
    });
  }
</script>

<div id="sf_admin_content">
<h2>Event List</h2>
<form name="search" class="search" method="get" action="<?php echo url_for('/AdmSys_dev.php/event'); ?>">
<table cellspacing="0" style="width:600px; padding:15px; padding-left:0">
  <tr>
    <td>Venue</td>
    <td><input name="v" class="venue" type="text" value="<?php echo $venue; ?>"/></td>
    <td>keyword</td>
    <td><input name="k" class="keyword" type="text" value="<?php echo $keyword; ?>"/></td>
    <td><input type="Submit" value="Search"/></td>
  </tr>
  <tr>
    <td>Sort by State</td>
    <td>
      <select name="s" class="state">
        <option value="0">Select State</option>
        <?php foreach($states as $x => $state): ?>
          <?php $selected = ($state->getId() == $curState)?'selected="selected"':''; ?>
          <option value="<?php echo $state->getId(); ?>" <?php echo $selected; ?>><?php echo $state->getName(); ?></option>
        <?php endforeach; ?>
      </select>
    </td>
    <td>Sort by City</td>
    <td>
    <select name="c" class="city">
      <option value="0">Select City</option>
        <?php foreach($cities as $x => $state): ?>
          <?php $selected = ($state->getId() == $curCity)?'selected="selected"':''; ?>
          <option value="<?php echo $state->getId(); ?>" <?php echo $selected; ?>><?php echo $state->getName(); ?></option>
        <?php endforeach; ?>
      </select>
    </select>
    </td>
    <td></td>
  </tr>
</table>
</form>
<a class="add" href="<?php echo url_for('/AdmSys_dev.php/event/add'); ?>">Add</a>
<table cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Event Date</th>
      <th>City</th>
      <th>State</th>
      <th>Venue</th>
      <th>Registered  Attendees</th>
      <th>Checked-In</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($events as $x => $event): ?>
    <tr class=" <?php echo ($x&1)?'even':'odd'; ?>">
      <td align="right"><?php echo $event->getId(); ?></td>
      <td><?php echo date('m/d/Y',strtotime($event->getEventDate())); ?></td>
      <td><?php echo $event['City']; ?></td>
      <td><?php echo $event['City']['State']; ?></td>
      <td><?php echo $event->getVenue(); ?></td>
      <td align="right"><?php echo $event['countAttendee']; ?></td>
      <td align="right">0</td>
      <td align="right">
       <a href=""><img title="View Detail" src="/images/magnifier.png"/></a>
        <a href=""><img title="Delete Event" src="/images/delete.png"/></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
$data = array(
  'maxPerPage' => $events->getmaxPerPage(),
  'lastPage' => $events->getlastPage(),
  'nbResults' => $events->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys_dev.php/event?v='.$venue.'&k='.$keyword.'&s='.$curState.'&city='.$curCity
);
include_partial('event/pager',$data); ?>

</div>