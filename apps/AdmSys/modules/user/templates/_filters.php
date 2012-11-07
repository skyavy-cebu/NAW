<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form action="<?php echo url_for('user_collection', array('action' => 'filter')) ?>" method="post">
    <table cellspacing="0">
      <tfoot>
        
      </tfoot>
      <tbody>
				
				<tr>
				<td colspan="2">
				<label for="user_filters_email">Email</label>
				<input id="user_filters_email" type="text" value="" name="user_filters[email][text]">
				</td>
				<td colspan="2">
				<label for="user_filters_company">company</label>
				<input id="user_filters_company" type="text" value="" name="user_filters[company][text]">
				</td>

				
				<td colspan="2">
				<label for="user_filters_keyword">keyword</label>
				<input id="user_filters_keyword" type="text" value="" name="user_filters[keyword][text]">
				</td>
          <td colspan="2">
            <?php echo $form->renderHiddenFields() ?>
            <!-- <?php// echo link_to(__('Reset', array(), 'sf_admin'), 'user_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?> -->
            <input type="submit" value="<?php echo __('Search', array(), 'sf_admin') ?>" />
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
