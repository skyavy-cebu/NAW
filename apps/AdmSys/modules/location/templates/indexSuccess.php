<div id="sf_admin_content">
<h2>Location</h2><br />
<a href="<?php echo url_for('/location/add'); ?>" class="add">Add</a>
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
    <tr class="<?php echo ($x&1)?'even':'odd'; ?>">
      <td align="right"><?php echo $city->getId(); ?></td>
      <td><?php echo $city->getState(); ?></td>
      <td><?php echo $city->getName(); ?></td>
      <td align="right">
        <img src="/images/delete.png"/>
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