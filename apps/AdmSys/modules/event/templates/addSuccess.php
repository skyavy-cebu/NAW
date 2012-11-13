<script>
  $(document).ready(function(){
    $('#event_event_date').datepicker();
    $('#event_start_time').timepicker({
      hourGrid: 4,
      minuteGrid: 10,
      timeFormat: 'hh:mm tt'
    });
    $('#event_end_time').timepicker({
      hourGrid: 4,
      minuteGrid: 10,
      timeFormat: 'hh:mm tt'
    });
  });
</script>

<div id="sf_admin_content">
  <h2>Event Add</h2>
 
<form method="post" name="event_form" class="event_form" action="<?php echo url_for('/AdmSys_dev.php/event/add') ?>">
<div class="display_form_errr">
<?php if ($form->hasErrors()): ?>
  <ul class="shop_list_error">
  <?php foreach($form->getErrorSchema()->getErrors() as $error): ?>
  <li><span>*</span> <?php echo $error; ?></li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php echo $form->renderHiddenFields(); ?>
</div>

<table style="width:600px;">
<tbody>
  <tr>
    <td>Event Date</td>
    <td><?php echo $form['event_date']; ?><img src="/images/calendar.png" /></td>
  </tr>
  <tr>
    <td>Time</td>
    <td>Start: <?php echo $form['start_time']; ?> End: <?php echo $form['end_time']; ?></td>
  </tr>
   <tr>
    <td>State</td>
    <td><?php echo $form['state']; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td><?php echo $form['city']; ?></td>
  </tr>
  <tr>
    <td>Venue</td>
    <td><?php echo $form['venue']; ?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $form['address']; ?></td>
  </tr>
  <tr>
    <td>Pre-pay spots</td>
    <td><?php echo $form['prepay_slots']; ?></td>
  </tr>
   <tr>
    <td>Max Capacity</td>
    <td><?php echo $form['max_capacity']; ?></td>
  </tr>
  <tr>
    <td>Admission</td>
    <td>Pre-pay: $<?php echo $form['admission_prepay']; ?> 
    RSVP, at door: $<?php echo $form['admission_at_door']; ?>
    No RSVP: $<?php echo $form['admission_no_rsvp']; ?> </td>
  </tr>
  <tr>
    <td>Event Description</td>
    <td><?php echo $form['description']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>
 
<br /><br />
 
  <br />
  <div><a href="<?php echo url_for('/AdmSys_dev.php/event'); ?>">Back to Event</a></div>
  <br />
</div>