<div id="content">
  <h1>Change Password</h1>
 
    <?php echo $form->renderFormTag(url_for('register/changePassword?id=' . $user->getId()), array('id' => 'frm_change_password'))?>
      <?php echo $form->renderGlobalErrors()?>
      <br/>
      <?php echo $form['reset-password']->renderRow()?>
      <br/>
      <?php echo $form['reset-cpassword']->renderRow()?>
      <br/>
      <?php echo $form->renderHiddenFields()?>
      <br/>
      <?php echo tag('input', array('type' => 'submit', 'value' => 'Change Password'))?>
    </form>
  </div>