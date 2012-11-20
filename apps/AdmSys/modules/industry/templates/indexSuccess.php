<script>
  function goDelete(id){
    if(xconfirm()){
      $('#industry'+id).fadeOut('slow',function(){
        $('#industry'+id).remove();
        $('.industry tbody tr:odd').removeClass('odd').addClass('even');
        $('.industry tbody tr:even').removeClass('even').addClass('odd');
      });
      $.post('/AdmSys.php/industry/delete',{id:id},function(){
      });
    }
    return false;
  }
</script>

<div id="sf_admin_content">
<h2>Manage Industries</h2><br />
<a href="<?php echo url_for('/AdmSys.php/industry/add'); ?>" class="add">Add</a>
<table class="industry" cellspacing="0" style="width:500px;">
  <thead>
    <tr>
      <th>ID</th>
      <th>Industry</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($industries as $x => $industry): ?>
    <tr id="industry<?php echo $industry->getId(); ?>" class="<?php echo ($x&1)?'even':'odd'; ?>">
      <td align="right"><?php echo $industry->getId(); ?></td>
      <td><?php echo $industry->getName(); ?></td>
      <td align="right">
        <a href="#delete" title="Delete" onclick="return goDelete(<?php echo $industry->getId(); ?>)">
          <img src="/images/delete.png"/>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
$data = array(
  'maxPerPage' => $industries->getmaxPerPage(),
  'lastPage' => $industries->getlastPage(),
  'nbResults' => $industries->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys.php/industry'
);
include_partial('event/pager',$data); ?>

</div>