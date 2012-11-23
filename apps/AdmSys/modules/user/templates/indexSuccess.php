<script>
  $(document).ready(function(){
    $('.state').change(function(){
      getOptionCity($(this).val());
    });
  });
  
  function getOptionCity(state_id){
    $.get('/profile/ajax?var=city&val='+state_id,function(data){
      $('.city').html(data);
    });
  }
  
  function goDelete(id){
    if(xconfirm()){
      $('#user'+id).fadeOut('slow',function(){
       $.post('/AdmSys.php/user/delete',{id:id},function(){
        });
        $('#user'+id).remove();
        $('.user_list tbody tr:odd').removeClass('odd').addClass('even');
        $('.user_list tbody tr:even').removeClass('even').addClass('odd');
      });
    }
    return false;
  }
</script>

<div id="sf_admin_content">
<h2>User Mangement</h2>
<form name="search" class="search" method="get" action="<?php echo url_for('/AdmSys_dev.php/user/add'); ?>">
<table cellspacing="0" style="width:900px; padding:15px; padding-left:0">
  <tr>
    <td>Email</td>
    <td><input name="e" class="email" type="text" value="<?php echo $email; ?>"/></td>
    <td>Company</td>
    <td><input name="co" class="company" type="text" value="<?php echo $company; ?>"/></td>
    <td>keyword</td>
    <td><input name="k" class="keyword" type="text" value="<?php echo $keyword; ?>"/></td>
    <td><input type="Submit" value="Search"/></td>
  </tr>
  <tr>
    <td>Sort by State</td>
    <td>
      <select name="s" class="state">
        <option value="0">Select State</option>
        <?php foreach($states as $x => $state): ?>
          <?php $selected = ($state->getId() == $curState)?'selected="selected"':''; ?>
          <option value="<?php echo $state->getId(); ?>" <?php echo $selected; ?>><?php echo $state->getName(); ?></option>
        <?php endforeach; ?>
      </select>
    </td>
    <td>Sort by City</td>
    <td>
    <select name="c" class="city">
      <option value="0">Select City</option>
        <?php foreach($cities as $x => $state): ?>
          <?php $selected = ($state->getId() == $curCity)?'selected="selected"':''; ?>
          <option value="<?php echo $state->getId(); ?>" <?php echo $selected; ?>><?php echo $state->getName(); ?></option>
        <?php endforeach; ?>
      </select>
    </select>
    </td>
    <td></td>
  </tr>
</table>
</form>
<a class="add" href="<?php echo url_for('/AdmSys.php/user/add'); ?>">Add</a>
<table class="user_list" cellspacing="0">
  <thead>
    <tr>
      <th>Reg. Date</th>
      <th>Name</th>
      <th>Email</th>
      <th>City</th>
      <th>Company</th>
      <th>D.O.B.</th>
      <th># attended</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $x => $user): ?>
    <tr id="user<?php echo $user->getId(); ?>" class="<?php echo ($x&1)?'even':'odd'; ?>">
      <td><?php echo date('m/d/Y',strtotime($user->getCreatedAt())); ?></td>
      <td><?php echo $user->getFname().' '.$user->getLname(); ?></td>
      <td><?php echo $user->getEmail(); ?></td>
      <td><?php echo $user->getProfile()->getCity(); ?></td>
      <td><?php echo $user->getProfile()->getCompany(); ?></td>
      <td><?php echo date('m/d/Y',strtotime($user->getDob())); ?></td>
      <td align="right"><?php echo $user['countAttendee']; ?></td>
      <td align="right">
        <img src="/images/magnifier.png"/>
        <img src="/images/pencil.png"/>
        <a href="" title="Edit Account"><img src="/images/key.png"/></a>
        <a href="#delete" onclick="return goDelete(<?php echo $user->getId(); ?>);"><img src="/images/delete.png"/></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php

$data = array(
  'maxPerPage' => $users->getmaxPerPage(),
  'lastPage' => $users->getlastPage(),
  'nbResults' => $users->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys.php/user?e='.$email.'&co='.$company.'&k='.$keyword.'&s='.$curState.'&c='.$curCity
);
include_partial('event/pager',$data); ?>

</div>