<span class="sf_admin_batch_actions_choice">
	<input type="hidden" name="batch_action" value="batchDelete" />
  <?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?>
  <input type="hidden" name="<?php echo $form->getCSRFFieldName() ?>" value="<?php echo $form->getCSRFToken() ?>" />
  <?php endif; ?>
  <input type="submit" value="<?php echo __('Delete User(s)', array(), 'sf_admin') ?>" />
</span>