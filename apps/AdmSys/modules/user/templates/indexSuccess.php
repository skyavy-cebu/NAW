<?php use_helper('I18N', 'Date') ?>
<?php include_partial('user/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('User Management', array(), 'messages') ?></h1>

  <?php include_partial('user/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('user/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
     <?php include_partial('user/filters', array('form' => $filters, 'configuration' => $configuration)) ?> 
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('user_collection', array('action' => 'batch')) ?>" method="post">
		
		<div class="sf_admin_actions">
			<span><a href="<?php echo url_for('user/new') ?>">Add User</a></span>
      <?php include_partial('user/list_batch_actions', array('helper' => $helper)) ?>    
    </div>
		
    <?php include_partial('user/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('user/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
