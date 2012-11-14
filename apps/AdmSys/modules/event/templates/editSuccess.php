<script>
  $(document).ready(function(){
    $('#event_state').change(function(){
      var state_id = $(this).val();
      $.get('/profile/ajax/city/'+state_id,function(data){
        $('#event_city').html(data);
      });
    });
  
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
    
    $('.event_photo_form').ajaxForm({
      dataType:'json',
      success: event_photo_success
    });
  
   $('.event_photo_form .event_photo').change(function(){
    $('.event_photo_form .submit').prop('disabled',false);
  });
    
  });
  
  function event_photo_success(data){
    $('.event_pic a').attr('attr',data.image_full);
    $('.event_pic img').attr('src','/uploads/event/'+data.image_full);
    $('.event_photo_form .event_photo').val('');
    $('.event_photo_form .submit').prop('disabled',true);
  }
</script>

<div id="sf_admin_content">
  <h2>Event Edit</h2>

<div style="padding:15px; padding-left:0;">
<div class="event_pic">
  <?php if($event->getImageFull()): ?>
    <img src="/uploads/event/<?php echo $event->getImageFull(); ?>"/>
  <?php else: ?>
    <img src="/images/event.gif"/>
  <?php endif; ?>
</div>
Upload Event Photo
<form name="event_photo_form" class="event_photo_form" method="post" enctype="multipart/form-data" action="<?php echo url_for('/AdmSys_dev.php/event/uploadPhoto'); ?>">
  <input type="hidden" name="id" value="<?php echo $event->getId(); ?>"/>
  <input type="file" class="event_photo" name="event[photo]"/>
  <input type="submit" class="submit" value="Upload" disabled="disabled"/>
</form>
</div>
  
<form method="post" name="event_form" class="event_form" action="<?php echo url_for('/AdmSys_dev.php/event/edit/'.$event->getId()) ?>">
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
  <div>
    < <a href="<?php echo url_for('/AdmSys.php/event'); ?>">Back to Event</a> &nbsp;|&nbsp;
    <a href="<?php echo url_for('/AdmSys.php/event/view/'.$event->getId()); ?>">Event View</a> >
  </div>
  <br />
</div>