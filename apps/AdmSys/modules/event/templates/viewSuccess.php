<script>
function doDelete(id){
  if(xconfirm()){
    $('#attendee'+id).fadeOut('slow',function(){
      $.post('/AdmSys_dev.php/event/attendeeDelete',{id:id},function(){
        });
      $('#attendee'+id).remove();
      $('.attendee_list tbody tr:odd').removeClass('odd').addClass('even');
      $('.attendee_list tbody tr:even').removeClass('even').addClass('odd');
    });
  }
  return false;
}

function goCheckIn(id){
  var checkbox = $('#check'+id).prop('checked');
  var check = 0;
  if(checkbox){
    check = 1;
  }
  $.post('/AdmSys_dev.php/event/attendeeCheckIn',{id:id,check:check},function(){
  });
}
</script>

<div id="sf_admin_content">
<h2>Event View</h2><br />
<table class="event" cellspacing="0">
<thead>
  <tr>
    <th>Event Date</th>
    <th>City</th>
    <th>Venue</th>
    <th>Address</th>
    <th>Capacity</th>
    <th>Attending</th>
    <th>Checked-In</th>
  </tr>
</thead>
<tbody>
  <tr class="odd">
    <td><?php echo date('m/d/Y',strtotime($event->getEventDate())); ?></td>
    <td><?php echo $event->getCity(); ?></td>
    <td><?php echo $event->getVenue(); ?></td>
    <td><?php echo $event->getAddress(); ?></td>
    <td align="right"><?php echo $event->getMaxCapacity(); ?></td>
    <td align="right"><?php echo $event->countAttendee; ?></td>
    <td align="right"><?php echo $event->countCheckIn; ?></td>
  </tr>
</tbody>
</table>
<br /><br />
<h2>Attendee list</h2><br />
<div class="search_attendee">
  <form method="get" action="<?php echo url_for('/AdmSys.php/event-view/'.$id); ?>">
    <span>Email: <input name="e" value="<?php echo $email; ?>" type="text"/></span>
    <span>Company: <input name="c" value="<?php echo $company; ?>" type="text"/></span>
    <span>Keyword: <input name="k" value="<?php echo $keyword; ?>" type="text"/></span>
    <span><input type="Submit" value="search"/></span>
  </form>
</div>
<br />
<a class="add Attendee" href="<?php echo url_for('/AdmSys_dev.php/event/addAttendee/'.$id); ?>">Add</a>
<table class="attendee_list" cellspacing="0">
<thead>
  <tr>
    <th style="width:60px;">Check In</th>
    <th>Name</th>
    <th>Email</th>
    <th>City</th>
    <th>Company</th>
    <th>DOB</th>
    <th>&nbsp;</th>
  </tr>
</thead>
<tbody>
  <?php foreach($attendees as $x => $attendee): $user = $attendee->getUser(); ?>
  <tr class="<?php echo ($x&1)?'even':'odd'; ?>" id="attendee<?php echo $attendee->getId(); ?>">
    <td align="center"><input onchange="goCheckIn(<?php echo $attendee->getId(); ?>)"; type="checkbox" id="check<?php echo $attendee->getId(); ?>" <?php echo ($attendee->getCheckIn()==1)?'checked="checked"':''; ?>/></td>
    <td><?php echo $user->getFname().' '.$user->getLname(); ?></td>
    <td><?php echo $user->getEmail(); ?></td>
    <td><?php echo $user->getProfile()->getCity(); ?></td>
    <td><?php echo $user->getProfile()->getCompany(); ?></td>
    <td><?php echo date('m/d/Y',strtotime($user->getDob())); ?></td>
    <td align="right">
      <a href="<?php echo url_for('/AdmSys.php/event/editAttendee/'.$attendee->getId()); ?>" title="Edit Attendee"><img src="/images/magnifier.png"/></a>
      <a href="#delete" title="Remove Attendee" onclick="return doDelete(<?php echo $attendee->getId(); ?>)"><img src="/images/delete.png"/></a>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>

<?php

$data = array(
  'maxPerPage' => $attendees->getmaxPerPage(),
  'lastPage' => $attendees->getlastPage(),
  'nbResults' => $attendees->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys_dev.php/event-view/'.$id.'?e='.$email.'&c='.$company.'&k='.$keyword
);
include_partial('event/pager',$data); ?>

</div><!-- sf_admin_content -->