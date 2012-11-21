<script style="text/javascript">
  $(document).ready(function() {
		$(".fancybox").fancybox();
	});

  function goDelete(id){
    if(xconfirm()){
      $('#sponsor'+id).fadeOut('slow',function(){
       $.post('/AdmSys_dev.php/sponsor/delete',{id:id},function(){
        });
        $('#sponsor'+id).remove();
        $('.sponsor tbody tr:odd').removeClass('odd').addClass('even');
        $('.sponsor tbody tr:even').removeClass('even').addClass('odd');
      });
    }
    return false;
  }
</script>

<div id="sf_admin_content">
<h2>Sponsor Management</h2><br />
<a class="add" href="<?php echo url_for('/AdmSys_dev.php/sponsor/add'); ?>">Add</a>
<table class="sponsor" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Last Updated</th>
      <th>Position</th>
      <th>Status</th>
      <th>Company</th>
      <th>URL</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($sponsors as $x => $sponsor): ?>
    <tr class="<?php echo ($x&1)?'even':'odd'; ?>" id="sponsor<?php echo $sponsor->getId(); ?>">
      <td align="right"><?php echo $sponsor->getId(); ?></td>
      <td><?php echo ($sponsor->getUpdatedAt() == '0000-00-00 00:00:00')?'':date('m/d/Y',strtotime($sponsor->getUpdatedAt())); ?></td>
      <td><?php echo $sponsor->getPosition(); ?></td>
      <td><?php echo ($sponsor->getStatusId() == 1)?'Active':'Inactive'; ?></td>
      <td><?php echo $sponsor->getCompany(); ?></td>
      <td><?php echo ($sponsor->getUrl())?'<a href="'.$sponsor->getUrl().'">'.$sponsor->getUrl().'</a>':''; ?></td>
      <td align="right">
        <a class="fancybox" title="<?php echo $sponsor->getCompany(); ?>" href="<?php echo url_for('/uploads/sponsor/'.$sponsor->getFile()); ?>">
          <img title="View Detail" src="/images/magnifier.png"/>
        </a>
        <img title="Edit Event" src="/images/pencil.png"/>
        
        <a href="<?php echo url_for('/AdmSys.php/sponsor/delete/'.$sponsor->getId()); ?>" onclick="return goDelete(<?php echo $sponsor->getId(); ?>)">
          <img title="Delete Event" src="/images/delete.png"/>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  
</div>