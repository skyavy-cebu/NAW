<div id="sf_admin_content">
  <h2>Add Sponsor</h2>
 
<form method="post" name="sponsor_form" class="sponsor_form" enctype="multipart/form-data" action="<?php echo url_for('/AdmSys.php/sponsor/add') ?>">
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
    <td>Company</td>
    <td><?php echo $form['company']; ?></td>
  </tr>
  <tr>
    <td>File</td>
    <td><input type="file" class="sponsor_file" name="sponsor[file]"></td>
  </tr>
  <tr>
    <td>URL</td>
    <td><?php echo $form['url']; ?></td>
  </tr>
  <tr>
    <td>Position</td>
    <td><?php echo $form['position']; ?></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><?php echo $form['status']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="Submit" value="Submit"/></td>
  </tr>
</tbody>
</table>
 
<br /><br />
 
  <br />
  <div><a href="<?php echo url_for('/AdmSys.php/sponsor'); ?>">Back to Sponsor List</a></div>
  <br />
</div>