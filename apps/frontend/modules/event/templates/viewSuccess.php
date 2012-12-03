<?php slot('meta_title',$event->getVenue().', '.$event->getCity())?>
<?php slot('og_title',$event->getVenue().', '.$event->getCity())?>
<?php slot('og_description',cut($event->getDescription(),150))?>
<?php if($event->getImageSmall()): ?>
<?php slot('og_image',base_url().'uploads/event/'.$event->getImageFull())?>
<?php endif; ?>
<?php slot('og_url',base_url().'/event/view/'.$id)?>

<div id="content" class="content_dashboard_wrapper home">
<div>  
  <h2 class="text_gray upcoming_events_margin text_museosans500"><?php echo $event->getVenue().', '.$event->getCity() ?></h2>
</div>

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
              <?php if($event->getEventDate() > now()): ?>
							<div class="event_info_2">
								<a href="" alt="" class="btn_sign_up_now"></a>
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
              <?php endif; ?>
							<div class="clear"></div>
							<div class="event_info_3">
                 <?php if($event->getImageFull()): ?>
                   <div class="event_main_image">
                    <img src="<?php echo url_for('/uploads/event/'.$event->getImageFull()); ?>" alt="" />
                  </div>
                <?php endif; ?>
								<div class="event_long_description" <?php echo (!$event->getImageFull())?'style="width:auto"':''; ?>>
									<?php echo $event->getDescription(); ?><br />
									<!-- <a href="" alt="" class="text_dark_blue">View More</a> -->
								</div>
								<div class="clear"></div>
                <?php $randEvents = EventTable::getInstance()->getRandomPastEventByCity($event->getCityId()); ?>
                <?php $first = $randEvents->getFirst(); if($first['image_full']): ?>
								<div class="event_photos_text">
									<div>PAST NETWORK AFTER WORK</div>
									<?php echo $event->getCity(); ?> PHOTOS <a href="" alt="" class="text_dark_blue">See More</a>
								</div>
								<div class="event_photo_gallery_tiny_wrapper">
                  <?php foreach($randEvents as $x => $randEvent): ?>
                    <?php if(!$randEvent->getImageSmall()){
                      continue;
                    }
                    ?>
                    <div>
                      <a class="fancybox" rel="<?php echo $event->getCity(); ?>" title="<?php echo $randEvent->getVenue().', '.$randEvent->getCity(); ?>" id="randEvent<?php echo $randEvent->getId(); ?>" href="<?php echo url_for('/uploads/event/'.$randEvent->getImageFull()); ?>" rel="prettyPhoto">
                        <img src="<?php echo url_for('/uploads/event/'.$randEvent->getImageSmall()); ?>" alt="" class="ie_anchor_no_border" />
                      </a>
                    </div>
                  <?php endforeach; ?>
									</div>
                <?php endif; ?>
                <br />
								<div class="sns_tiny">
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style ">
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
							</div>


</div>
<?php include_component('home','sidebar',array()); ?>