<div id="content" class="content_dashboard_wrapper">					<div class="profile_info">						<div class="profile_info_1">							              <?php $image_full = $profile->getImageFull(); ?>              <?php if($image_full): ?>                <img src="/uploads/user/<?php echo $image_full; ?>">              <?php else: ?>                <img src="/images/default.png">              <?php endif; ?>              							<div class="profile_info_text_1">								<h2><?php echo $name; ?></h2>								<span>Account Manager <?php echo $profile->getCompany(); ?><br />								<?php echo $profile->getAddress(); ?><br />								Phone: 555-223-2323</span>								<div><div class="email_icon"></div> <a href="" alt="">jdoe@lasys.com</a>&nbsp;&nbsp; <div class="website_icon"></div> <a href="" alt="">www.lasys.com</a>								<div class="connect_with_me_on">                  <?php if($profile->getLinkedinUrl()): ?>                    <a href="<?php echo $profile->getLinkedinUrl(); ?>" target="_blank" alt="" title="LinkedIn" class="cwmo_linked_in"></a>                  <?php else: ?>                    <a href="" alt="" title="LinkedIn" class="cwmo_linked_in bg-hide"></a>                  <?php endif; ?>                                    <?php if($profile->getTwitterUrl()): ?>                    <a href="<?php echo $profile->getTwitterUrl(); ?>" alt="" title="Twitter" class="cwmo_twitter"></a>                  <?php endif; ?>                                    <?php if($profile->getFbUrl()): ?>                    <a href="<?php echo $profile->getFbUrl(); ?>" alt="" title="Facebook" class="cwmo_facebook"></a>                  <?php endif; ?>                                    <?php if($profile->getOlioUrl()): ?>                    <a href="<?php echo $profile->getOlioUrl(); ?>" alt="" title="Olio" class="cwmo_orkut"></a>                  <?php endif; ?>                     								</div>							</div>						</div>						<div class="clear"></div>						<div class="about_me">							<h3 class="text_novecentowidenormal">ABOUT ME</h3>							<table>                <?php if(isset($my_industry)): ?>								<tr>									<td class="text_museosans500 text_gray" width="200px">My Industry</td>									<td class="text_museosans500 text_dark_blue"><?php echo $my_industry; ?></td>								</tr>                <?php endif; ?>								<tr>									<td>&nbsp;</td>									<td></td>								</tr>								<tr>									<td class="text_museosans500 text_gray">What I do</td>									<td class="text_museosans500 about_me_small_text">                    <?php echo $profile->getIdo(); ?>                  </td>								</tr>															</table>						</div>						<div class="who_i_want_to_meet">							<h3 class="text_novecentowidenormal">WHO I WANT TO MEET</h3>							<table>								<tr>									<td class="text_museosans500 text_gray" width="200px">Those in industries</td>									<td class="text_museosans500 text_dark_blue"><?php echo $industry_meet; ?></td>								</tr>								<tr>									<td>&nbsp;</td>									<td></td>								</tr>								<tr>									<td class="text_museosans500 text_gray">How can we work together</td>									<td class="text_museosans500 about_me_small_text">                    <?php echo $profile->getToMeet(); ?>                  </td>								</tr>							</table>						</div>						<div class="clear"></div>					</div>					<div class="upcoming_events">						<h3 class="text_gray upcoming_events_margin text_novecentowidenormal">UPCOMING EVENTS</h3>						<ul class="per_block_ul_separator">							<li>								<div class="calendar_date">									<div class="calendar_month_shortened">NOV</div>									<div class="calendar_day"><h1>13</h1></div>								</div>								<div class="event_info">									<ul>										<li class="event_city">Los Angeles</li>										<li class="event_name">Network After Work at Elevate Lounge</li>										<li class="event_date_time">Thu, Oct 13 2011, 6:00p.m. - 9:00 p.m.</li>										<li class="event_venue"><div class="place_icon"></div> <a href="" alt="" class="text_no_underline text_dark_blue text_museosans500">811 Wilshire Blvd, 21st Fl, Los Angeles CA</a></li>									</ul>								</div>								<div class="event_info_2">									<a href="" alt="" class="btn_event_details"></a><div class="btn_im_registered"></div>									<div class="event_dsa_info_2_label"><div class="event_days_left_count text_red"><span>2</span></div>&nbsp;DAYS LEFT</div>									<div class="event_dsa_info_2_label"><div class="event_spots_left_count text_dark_blue"><span>15</span></div>&nbsp;SPOTS LEFT</div>									<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;ATTENDING</div>									<div class="clear"></div>								</div>								<div class="clear"></div>								<div class="sns_tiny_dashboard">									<!-- AddThis Button BEGIN -->									<div class="addthis_toolbox addthis_default_style ">										<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>										<a class="addthis_button_tweet"></a>										<a class="addthis_counter addthis_pill_style"></a>										<a href="http://www.addthis.com/bookmark.php"        class="addthis_button_email">        <img src="http://s7.addthis.com/button1-email.gif"        width="54" height="16" border="0" alt="Email" /></a> 									</div>									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fb21f8c3dd4fc6c"></script>									<!-- AddThis Button END -->								</div>								<div class="clear"></div>							</li>							<li>								<div class="calendar_date">									<div class="calendar_month_shortened">NOV</div>									<div class="calendar_day"><h1>10</h1></div>								</div>								<div class="event_info">									<ul>										<li class="event_city">Washington D.C.</li>										<li class="event_name">Network After Work at Elevate Lounge</li>										<li class="event_date_time">Thu, Oct 10 2011, 6:00p.m. - 9:00 p.m.</li>										<li class="event_venue"><div class="place_icon"></div> <a href="" alt="" class="text_no_underline text_dark_blue text_museosans500">919 19th St. NW, Washington DC, 20006</a></li>									</ul>								</div>								<div class="event_info_2">									<a href="" alt="" class="btn_event_details"></a><a href="" alt="" class="btn_sign_up_now_dashboard"></a>									<div class="event_dsa_info_2_label"><div class="event_days_left_count text_red"><span>1</span></div>&nbsp;DAYS LEFT</div>									<div class="event_dsa_info_2_label"><div class="event_spots_left_count text_dark_blue"><span>20</span></div>&nbsp;SPOTS LEFT</div>									<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;ATTENDING</div>									<div class="clear"></div>								</div>								<div class="clear"></div>								<div class="sns_tiny_dashboard">									<!-- AddThis Button BEGIN -->									<div class="addthis_toolbox addthis_default_style ">										<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>										<a class="addthis_button_tweet"></a>										<a class="addthis_counter addthis_pill_style"></a>										<a href="http://www.addthis.com/bookmark.php"        class="addthis_button_email">        <img src="http://s7.addthis.com/button1-email.gif"        width="54" height="16" border="0" alt="Email" /></a> 									</div>									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fb21f8c3dd4fc6c"></script>									<!-- AddThis Button END -->								</div>								<div class="clear"></div>							</li>							<li class="per_block_ul_separator_dashboard_bottom">								<div class="calendar_date">									<div class="calendar_month_shortened">NOV</div>									<div class="calendar_day"><h1>10</h1></div>								</div>								<div class="event_info">									<ul>										<li class="event_city">Washington D.C.</li>										<li class="event_name">Network After Work at Elevate Lounge</li>										<li class="event_date_time">Thu, Oct 10 2011, 6:00p.m. - 9:00 p.m.</li>										<li class="event_venue"><div class="place_icon"></div> <a href="" alt="" class="text_no_underline text_dark_blue text_museosans500">919 19th St. NW, Washington DC, 20006</a></li>									</ul>								</div>								<div class="event_info_2">									<a href="" alt="" class="btn_event_details"></a><a href="" alt="" class="btn_sign_up_now_dashboard"></a>									<div class="event_dsa_info_2_label"><div class="event_days_left_count text_red"><span>1</span></div>&nbsp;DAYS LEFT</div>									<div class="event_dsa_info_2_label"><div class="event_spots_left_count text_dark_blue"><span>20</span></div>&nbsp;SPOTS LEFT</div>									<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;ATTENDING</div>									<div class="clear"></div>								</div>								<div class="clear"></div>								<div class="sns_tiny_dashboard">									<!-- AddThis Button BEGIN -->									<div class="addthis_toolbox addthis_default_style ">										<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>										<a class="addthis_button_tweet"></a>										<a class="addthis_counter addthis_pill_style"></a>										<a href="http://www.addthis.com/bookmark.php"        class="addthis_button_email">        <img src="http://s7.addthis.com/button1-email.gif"        width="54" height="16" border="0" alt="Email" /></a> 									</div>									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fb21f8c3dd4fc6c"></script>									<!-- AddThis Button END -->								</div>								<div class="clear"></div>							</li>						</ul>					</div>					<div class="upcoming_events events_ive_attended">						<a href="" alt="" class="see_more_events_ive_attended">See More Events I've Attended</a>						<h3 class="text_gray upcoming_events_margin text_novecentowidenormal">EVENTS I'VE ATTENDED</h3>						<ul class="per_block_ul_separator">							<li>								<div class="calendar_date">									<div class="calendar_month_shortened">NOV</div>									<div class="calendar_day"><h1>13</h1></div>								</div>								<div class="event_info">									<ul>										<li class="event_city">Los Angeles</li>										<li class="event_name">Network After Work at Elevate Lounge</li>										<li class="event_date_time">Thu, Oct 13 2011, 6:00p.m. - 9:00 p.m.</li>										<li class="event_venue"><div class="place_icon"></div> <a href="" alt="" class="text_no_underline text_dark_blue text_museosans500">811 Wilshire Blvd, 21st Fl, Los Angeles CA</a></li>									</ul>								</div>								<div class="event_info_2">									<a href="" alt="" class="btn_event_details"></a>									<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;NETWORKERS ATTENDED THIS EVENT!!</div>									<div class="clear"></div>								</div>								<div class="clear"></div>							</li>						</ul>						<div class="clear"></div>					</div>					<div class="others_who_attended_event">							<a href="" alt="" class="text_museosans500">See full list</a>							<h4 class="text_gray text_museosans500">Others who attended this event</h4>						<div class="text_gray">							<div class="others_who_attended_photo_layout">								<a href="" alt=""><img src="../images/dashboard/other_attended_1.png" alt="" /></a>								<div><span>Peter Hershberg</span><br /> <span>Rotomedia</span></div>							</div>							<div class="others_who_attended_photo_layout">								<a href="" alt=""><img src="../images/dashboard/other_attended_2.png" alt="" /></a>								<div><span>David Tisch</span><br /> <span>TechStars NYC</span></div>							</div>							<div class="others_who_attended_photo_layout">								<a href="" alt=""><img src="../images/dashboard/other_attended_3.png" alt="" /></a>								<div><span>Sizhao Yang</span><br /> <span>Group Me</span></div>							</div>						</div>						<div class="text_gray">							<div class="others_who_attended_photo_layout">								<a href="" alt=""><img src="../images/dashboard/other_attended_4.png" alt="" /></a>								<div><span>Lesli Chicoine</span><br /> <span>Lovely,Inc.</span></div>							</div>							<div class="others_who_attended_photo_layout">								<a href="" alt=""><img src="../images/dashboard/other_attended_1.png" alt="" /></a>								<div><span>Peter Hershberg</span><br /> <span>Rotomedia</span></div>							</div>							<div class="others_who_attended_photo_layout">								<a href="" alt=""><img src="../images/dashboard/other_attended_2.png" alt="" /></a>								<div><span>David Tisch</span><br /> <span>TechStars NYC</span></div>							</div>						</div>					</div>				</div>			</div><?php include_component('home','sidebar'); ?>