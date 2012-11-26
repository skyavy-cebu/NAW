<div id="sf_admin_content">
<h2>User Pass Attended Events (<?php echo $user->getFname().' '.$user->getLname(); ?>)</h2><br />
<div class="fl search_div">
  <form method="get" action="<?php echo url_for('/AdmSys.php/user/attendedEvents/'.$id); ?>">
  Search by&nbsp;&nbsp; Venue:<input type="text" name="v" value="<?php echo $venue; ?>"/>&nbsp;&nbsp;
  keyword: <input type="text" name="k" value="<?php echo $keyword; ?>"/>
  <input type="submit" value="Search">
  </form>
</div>
<div class="clear"></div>
<br />

<table class="news" cellspacing="0">
  <thead>
    <tr>
      <th>Event Date</th>
      <th>City</th>
      <th>Venue</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
    <?php if($events): ?>
    <?php foreach($events as $x => $event): ?>
    <tr id="event<?php echo $event->getId(); ?>" class="<?php echo ($x&1)?'even':'odd'; ?>">
      <td><?php echo date('m/d/Y',strtotime($event->getCreatedAt())); ?></td>
      <td><?php echo $event->getCity(); ?></td>
      <td><?php echo $event->getVenue(); ?></td>
      <td><?php echo $event->getAddress(); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
<br /><br />
<?php
$data = array(
  'maxPerPage' => $events->getmaxPerPage(),
  'lastPage' => $events->getlastPage(),
  'nbResults' => $events->getnbResults(),
  'curPage' => $curPage,
  'linkPage' => '/AdmSys.php/user/attendedEvents/'.$id.'?v='.$venue.'&k='.$keyword
);
include_partial('event/pager',$data); ?>
<br /><br />
<a href="<?php echo url_for('/AdmSys.php/user'); ?>">Back to User List</a>
</div>