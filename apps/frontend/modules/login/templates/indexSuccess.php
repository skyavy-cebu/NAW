<h1>Login</h1>

<form method="post">
<div id="notify" style="color:red"><?php echo (isset($notify))?$notify:''; ?></div>
<table>
  <tr>
    <td>Email</td>
    <td><input name="login[email]" type="text" value="<?php echo (isset($email))?$email:''; ?>"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="login[pass]" type="password"/></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="Submit" value="Login"/></td>
  </tr>
</table>
</form>