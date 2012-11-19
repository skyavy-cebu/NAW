<script>
$(document).ready(function(){
    $('#attendee_state').change(function(){
      var state_id = $(this).val();
      $.get('/profile/ajax/city/'+state_id,function(data){
        $('#attendee_city').html(data);
      });
    });
    $('#attendee_dob').prop('readonly',true);
    $('#attendee_dob').datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "<?php echo date('Y')-45; ?>:<?php echo date('Y')-5; ?>"
    });
    
 });

  function userSuggest(user){
    $('#attendee_fname').val(user.fname);
    $('#attendee_lname').val(user.lname);
    $('#attendee_company').val(user.company);
    $('#attendee_state').val(user.state);
    $('#attendee_city').val(user.city);
    $('#attendee_dob').val(user.dob);
  }
</script>

<style>
  ul.radio_list{
    list-style:none;
    padding:0;
  }
  
 .radio_list li{
    float:left;
    padding-right:15px;
 }
 
 #attendee_dob{
    width:80px;
 }

</style>

<div id="sf_admin_content">
<h2>Edit Event Attendee</h2><br />

<form method="post" name="event_attendee_form" class="event_attendee_form" action="<?php echo url_for('/AdmSys_dev.php/event/editAttendee/'.$id) ?>">
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

<table style="width:400px;">
<span class="error hide"></span>
<input id="user_id" type="hidden" name="user_id" value="<?php echo $attendee->getUserId(); ?>"/>
<tbody>
  <tr>
    <td>Email Address</td>
    <td style="width:200px;"><?php echo $form['email']; ?> <span class="loader hide"><img src="/images/load.gif"/></span></td>
  </tr>
  <tr>
    <td>First Name</td>
    <td><?php echo $form['fname']; ?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><?php echo $form['lname']; ?></td>
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
    <td>Company</td>
    <td><?php echo $form['company']; ?></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td><?php echo $form['dob']; ?></td>
  </tr>
  <tr>
    <td>Industry</td>
    <td><?php echo $form['industry']; ?></td>
  </tr>
  <tr>
    <td>Paid?</td>
    <td><?php echo $form['paid']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><br /><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>
<div><a href="<?php echo url_for('/AdmSys.php/event-view/'.$attendee->getEventId()); ?>">Back to event view</a>
</div><!-- sf_admin_content -->