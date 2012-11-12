<div class="sf_admin_pagination">
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <?php echo $page ?> | 
    <?php else: ?>
      <a href="<?php echo url_for('@user') ?>?page=<?php echo $page ?>"><?php echo $page ?></a> | 
    <?php endif; ?>
  <?php endforeach; ?>	
</div>