<div id="sf_admin_content">
<h2>Event List</h2>
<table cellspacing="0" style="width:600px; padding:15px; padding-left:0">
  <tr>
    <td>Venue</td>
    <td><input type="text"/></td>
    <td>keyword</td>
    <td><input type="text"/></td>
    <td><input type="button" value="Search"/></td>
  </tr>
  <tr>
    <td>Sort by State</td>
    <td><select><option>Select State</option></select></td>
    <td>Sort by City</td>
    <td><select><option>Select City</option></select></td>
    <td></td>
  </tr>
</table>
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
        <a href="">
          <img title="View Detail" src="/images/magnifier.png"/>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo $events->getlastPage(); ?>

</div>