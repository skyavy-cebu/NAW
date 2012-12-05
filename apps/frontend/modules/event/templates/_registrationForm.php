<form method="post" name="event_form" class="event_form" action="<?php echo url_for('/event/register/'.$event->getId()) ?>">
<div class="display_form_errr">
<?php if ($form->hasErrors()): ?>
  <ul class="shop_list_error">
  <?php foreach($form->getErrorSchema()->getErrors() as $x => $error): ?>
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
    <td><?php echo $form['lname']; ?></td>
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