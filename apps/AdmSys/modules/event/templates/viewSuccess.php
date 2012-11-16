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
    <td align="right">0</td>
    <td align="right">0</td>
  </tr>
</tbody>
</table>
<br /><br />
<h2>Attendee list</h2><br />
<div class="search_attendee">
  <span>Email: <input type="text"/></span>
  <span>Company: <input type="text"/></span>
  <span>Keyword: <input type="text"/></span>
  <span><input type="Submit" value="search"/></span>
</div>
<br />
<a class="add Attendee" href="<?php echo url_for('/AdmSys_dev.php/event/add'); ?>">Add</a>
<table class="event" cellspacing="0">
<thead>
  <tr>
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
    <td><?php echo $user->getFname().' '.$user->getLname(); ?></td>
    <td><?php echo $user->getEmail(); ?></td>
    <td><?php echo $user->getProfile()->getCity(); ?></td>
    <td><?php echo $user->getProfile()->getCompany(); ?></td>
    <td><?php echo date('m/d/Y',strtotime($user->getDob())); ?></td>
    <td align="right">
      <img src="/images/magnifier.png"/>
      <a href="" title="Remove Attendee"><img src="/images/delete.png"/></a>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>


</div><!-- sf_admin_content -->