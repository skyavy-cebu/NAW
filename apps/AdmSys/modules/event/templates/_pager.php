<?php if($lastPage): ?>
<ul class="pager">
  <?php foreach(range(1,$lastPage) as $x): ?>
    <?php if($curPage == $x): ?>
      <li class="cur"><?php echo $x; ?></li>
    <?php else: ?>
      <?php
        if(strpos('?', $linkPage) !== false){
          $link_sym = '?';
        }else{
          $link_sym = '&';
        }
        $link = $linkPage.$link_sym.'p='.$x;
      ?>
      <li><a href="<?php echo $link; ?>"><?php echo $x; ?></a></li>
    <?php endif; ?>
  <?php endforeach; ?>
</ul>
<?php endif; ?>