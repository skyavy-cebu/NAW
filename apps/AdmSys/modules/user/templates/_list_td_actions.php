<td>
  <ul class="sf_admin_td_actions">
		<li><?php echo link_to('V', 'user_edit', $profile) ?></li>
    <?php echo $helper->linkToEdit($profile, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'E',)) ?>
    <?php echo $helper->linkToDelete($profile, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'D',)) ?>
		
  </ul>
</td>
