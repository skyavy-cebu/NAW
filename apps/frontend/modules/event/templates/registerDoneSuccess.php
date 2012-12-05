<div id="content" class="content_dashboard_wrapper home">
<h2>Thank you for registering!</h2>

<div class="calendar_date">
  <div class="calendar_month_shortened"><?php echo date('M',strtotime($event->getEventDate())); ?></div>
  <div class="calendar_day"><h1><?php echo date('d',strtotime($event->getEventDate())); ?></h1></div>
</div>
<div class="event_info">
  <ul>
    <li class="event_city"><?php echo $event->getCity(); ?></li>
    <li class="event_name">Network After Work at <?php echo $event->getVenue(); ?></li>
    <li class="event_date_time"><?php echo date('D, M d Y',strtotime($event->getEventDate())) ?>
    , <?php echo date('h:i a',strtotime($event->getStartTime())); ?> - <?php echo date('h:i a',strtotime($event->getEndTime())); ?></li>
    <li class="event_venue"><a href="" alt="" class="text_no_underline text_gray text_museosans500"><?php echo $event->getAddress(); ?></a> &nbsp;<a href="<?php echo url_for('/event/map/'.encode($event->getAddress())) ?>" target="_blank" alt="" class="event_venue_see_more">See Map</a></li>
  </ul>
</div>

<div class="registerDone event_info_2">
  <div class="event_dsa_info_2_label"><div class="event_attending_count text_red"><span>
  <?php echo day_diff(now(),$event->getEventDate()); ?>
  </span></div>&nbsp;DAYS LEFT</div>
  <div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>
  <?php echo $event->getPrepaySlots() - $event->countAttendee; ?>
  </span></div>&nbsp;SPOTS LEFT</div>
  <div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>
  <?php echo $event->countAttendee; ?>
  </span></div>&nbsp;ATTENDING</div>
</div>

<div class="sns_tiny">
  <!-- AddThis Button BEGIN -->
  <div class="addthis_toolbox addthis_default_style"
    addthis:url="<?php echo base_url().'event/view/'.$event->getId(); ?>"
    addthis:title="Network After Work at <?php echo $event->getVenue(); ?>"
    addthis:description="<?php echo $event->getVenue().', '.$event->getCity(); ?>">
    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
    <a class="addthis_button_tweet"></a>
    <a class="addthis_counter addthis_pill_style"></a>
    <a href="http://www.addthis.com/bookmark.php"
class="addthis_button_email">
<img src="http://s7.addthis.com/button1-email.gif"
width="54" height="16" border="0" alt="Email" /></a> 
  </div>
  <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fb21f8c3dd4fc6c"></script>
  <!-- AddThis Button END -->
</div>

<div class="clear"></div>
<br /><br /> 
<a href="<?php echo url_for('/'); ?>">Back to events list</a>
</div>
<?php include_component('home','sidebar',array()); ?>