<div id="content">
<h2>Login</h2>

<form id="login" method="post" class="fl">
<div id="notify" style="color:red"><?php echo (isset($notify))?$notify:''; ?></div>
<table>
  <tr>
    <td>Email</td>
    <td><input name="login[email]" type="text" value="<?php echo (isset($email))?$email:''; ?>"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="login[pass]" type="password" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"/></td>
  </tr>
  <tr>
    <td colspan="2" style="padding:5px;">
      <a href="/login" class="btn_login" onclick="$('#login').submit(); return false;"></a>
    </td>
  </tr>
  <tr>  
    <td><a href="">Forgot Password</a></td>
    <td></td>
  </tr>
  <tr>
    <td><a href="<?php echo url_for('/register'); ?>">Register Account</a></td>
    <td></td>
  </tr>
</table>
</form>

<div class="login_social fl" style="padding-left:60px;">
    <a style="margin-left:0" href="<?php echo url_for('/login/facebook'); ?>" class="btn_sign_in_facebook"></a>
    <div align="center">or</div>
    <a style="margin-left:0" href="<?php echo url_for('/login/linkedin'); ?>" class="btn_sign_in_linked_in"></a>
</div><!-- login social -->
<div style="clear:both"></div>
</div><!-- content -->