<div id="sf_admin_content">
<h2>Add Location</h2><br />

<form method="post" name="loc_form" class="loc_form" action="<?php echo url_for('/AdmSys_dev.php/location/add') ?>">
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
    <td>State</td>
    <td><?php echo $form['state']; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td><?php echo $form['name']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>

</form>


<a href="<?php echo url_for('/AdmSys.php/location'); ?>">Back to Location</a>
</div>