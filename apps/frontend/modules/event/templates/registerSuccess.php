<div id="content" class="content_dashboard_wrapper home">
<h2>Event Registration</h2>
Register for Network After Work at <?php echo $event->getVenue(); ?>, <?php echo $event->getCity(); ?>

<?php if(!$sf_context->getUser()->isAuthenticated()): ?>
<div class="login_box">
  <p>Are you a registered member? Login for:</p>
   <ul>
    <li>Quicker event registration</li>
    <li>Register others</li>
    <li>Benefit 3</li>
   </ul>
  <div align="center">
    <input type="button" value="Login"/> &nbsp;&nbsp;OR&nbsp;&nbsp;
    <input type="button" value="Register Account"/>
  </div>
</div>
<?php endif; ?>

<form method="post" name="event_form" class="event_form" action="<?php echo url_for('/AdmSys.php/event/add') ?>">
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

<table class="event_registration_table">
<tbody>
  <tr>
    <td>First Name (*)</td>
    <td><?php echo $form['fname']; ?></td>
  </tr>
  <tr>
    <td>Last Name (*)</td>
    <td><?php echo $form['fname']; ?></td>
  </tr>
  <tr>
    <td>Email Address (*)</td>
    <td><?php echo $form['email']; ?></td>
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
    <td>Date of Birth (*)</td>
    <td><?php echo $form['dob']; ?></td>
  </tr>
  <tr>
    <td>Industry</td>
    <td><?php echo $form['industry']; ?></td>
  </tr>
  <tr>
    <td>Payment Method</td>
    <td><?php echo $form['payment_method']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Register"/></td>
  </tr>
</tbody>
</table>

</form>

</div>
<?php include_component('home','sidebar',array()); ?>