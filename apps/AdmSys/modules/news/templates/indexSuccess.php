<script>
  function goDelete(id){
    if(xconfirm()){
      $('#news'+id).fadeOut('slow',function(){
        $('#news'+id).remove();
        $('.news tbody tr:odd').removeClass('odd').addClass('even');
        $('.news tbody tr:even').removeClass('even').addClass('odd');
      });
      $.post('/AdmSys.php/news/delete',{id:id},function(){
      });
    }
    return false;
  }
</script>

<style>
  .search_div{
    padding-left:30px;
  }
  .search_div .s{
    width:500px;
  }
</style>

<div id="sf_admin_content">
<h2>News Management</h2><br />

<div class="fl" style="padding-top:5px;">
  <a href="<?php echo url_for('/AdmSys.php/news/add'); ?>" class="add">Add</a>
</div>
<div class="fl search_div">
  <form method="get" action="<?php echo url_for('/AdmSys.php/news'); ?>">
  Search News: <input type="text" name="s" class="s" value="<?php echo $search; ?>"/>
  <input type="submit" value="Search">
  </form>
</div>
<div class="clear"></div>
<br />
<table class="news" cellspacing="0">
  <thead>
    <tr>
      <th>Post Date</th>
      <th>Title</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($newsList as $x => $news): ?>
    <tr id="news<?php echo $news->getId(); ?>" class="<?php echo ($x&1)?'even':'odd'; ?>">
      <td><?php echo date('m/d/Y h:ia',strtotime($news->getPostDate())); ?></td>
      <td><a href="<?php echo url_for('/news/'.$news->getId()); ?>"><?php echo $news->getTitle(); ?></a></td>
      <td align="right">
        <a title="View News" href="<?php echo url_for('/news/'.$news->getId()); ?>"><img src="/images/magnifier.png"/></a>
        <a href="/AdmSys.php/news/edit/<?php echo $news->getId(); ?>" title="Edit News"><img src="/images/pencil.png"/></a>
        <a href="#delete" title="Delete" onclick="return goDelete(<?php echo $news->getId(); ?>)">
          <img src="/images/delete.png"/>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
$data = array(
  'maxPerPage' => $newsList->getmaxPerPage(),
  'lastPage' => $newsList->getlastPage(),
  'nbResults' => $newsList->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys.php/news'
);
include_partial('event/pager',$data); ?>

</div>