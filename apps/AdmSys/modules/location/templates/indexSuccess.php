<script>
  function goDelete(id){
    if(xconfirm()){
      $('#location'+id).fadeOut('slow',function(){
        $('#location'+id).remove();
        $('.location tbody tr:odd').removeClass('odd').addClass('even');
        $('.location tbody tr:even').removeClass('even').addClass('odd');
      });
      $.post('/AdmSys.php/location/delete',{id:id},function(){
      });
    }
    return false;
  }
</script>

<div id="sf_admin_content">
<h2>Location</h2><br />
<a href="<?php echo url_for('/AdmSys.php/location/add'); ?>" class="add">Add</a>
<table class="location" cellspacing="0" style="width:500px;">
  <thead>
    <tr>
      <th>ID</th>
      <th>State</th>
      <th>City</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($cities as $x => $city): ?>
    <tr id="location<?php echo $city->getId(); ?>" class="<?php echo ($x&1)?'even':'odd'; ?>">
      <td align="right"><?php echo $city->getId(); ?></td>
      <td><?php echo $city->getState(); ?></td>
      <td><?php echo $city->getName(); ?></td>
      <td align="right">
        <a href="#delete" title="Delete" onclick="return goDelete(<?php echo $city->getId(); ?>)">
          <img src="/images/delete.png"/>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
$data = array(
  'maxPerPage' => $cities->getmaxPerPage(),
  'lastPage' => $cities->getlastPage(),
  'nbResults' => $cities->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys.php/location'
);
include_partial('event/pager',$data); ?>

</div>