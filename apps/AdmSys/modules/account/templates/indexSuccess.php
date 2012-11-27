<div id="sf_admin_content">
<h2>My Account</h2><br />

<form method="post" name="user_form" class="user_form" action="<?php echo url_for('/AdmSys_dev.php/account') ?>">

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
    <td>Email</td>
    <td><?php echo $form['email1']; ?></td>
  </tr>
  <tr>
    <td>Email Confirm</td>
    <td><?php echo $form['email2']; ?></td>
  </tr>
  <tr>
    <td>Current Password</td>
    <td><?php echo $form['pass1']; ?></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><?php echo $form['pass2']; ?></td>
  </tr>
  <tr>
    <td>Re-enter Password</td>
    <td><?php echo $form['pass3']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>

</form>
</div>