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

<?php if($sf_context->getUser()->isAuthenticated() && $user_registered == 1): ?>
  <div class="login_box">You are already registered for this event</div>
<?php else: ?>
  <?php include_partial('event/registrationForm',array('event'=>$event,'form'=>$form)); ?>
<?php endif; ?>

</div>
<?php include_component('home','sidebar',array()); ?>