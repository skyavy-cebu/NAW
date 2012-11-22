<script type="text/javascript">
  function goCheck(){
    var email = $('.email').val();
    if(!is_email(email)){
      $('.error').html('Please enter valid email address');
      return false;
    }
  }
</script>

<div id="content" class="content_dashboard_wrapper">
<h2>Retrieve Password</h2>

<div class="error">
  <?php echo (isset($error))?$error:'Please enter your email address associated with your account'; ?>
</div>

<form id="forgot" method="post" action="<?php echo url_for('/frontend_dev.php/forgot'); ?>" onsubmit="return goCheck();">
  <table>
    <tr>
      <td>Email Address</td>
      <td><input type="text" class="email" name="forgot[email]"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="Submit" value="Submit"/></td>
    </tr>
  </table>
</form>

</div>

<?php include_component('home','sidebar',array()); ?>