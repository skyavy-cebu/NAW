<script type="text/javascript">
  function goSubmit(){
    var pass1 = $('#retrive_pass1').val();
    var pass2 = $('#retrive_pass2').val();
    var error = '';
    
    if(!pass1){
      error += 'Please enter your password<br />';
    }else if(!pass2){
      error += 'Please enter your password<br />';
    }else{
      if(pass1 != pass2){
        error += 'Password didn\'t match<br />';
      }else{
        if(pass1.length < 4){
          error += 'The password must be at least 5 character<br />';
        }
      }
    }
    
    if(error){
      $('.error').html(error);
      return false;
    }
  }
</script>

<div id="content" class="content_dashboard_wrapper">
<h2>Retrieve Password</h2>
<div class="error"></div>
<form name="retrive_form" method="post" action="<?php echo url_for('/forgot/'.$code); ?>" onsubmit="return goSubmit();">
  <table>
    <tr>
      <td>New Password</td>
      <td><input type="password" id="retrive_pass1" name="retrive[pass1]" /></td>
    </tr>
    <tr>
      <td>Re-type New Password</td>
      <td><input type="password" id="retrive_pass2" name="retrive[pass2]"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="Submit"/></td>
    </tr>
  </table>
</form>

</div>

<?php include_component('home','sidebar',array()); ?>