<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- things to do: rename any traces of orkut to "olio me"; rename any traces of tumblr to twitter -->
<html>
	<head>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" />
		<link rel="stylesheet" href="styles/style.css" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
					$("a[rel^='prettyPhoto']").prettyPhoto({allow_expand: false});
					$("a[rel^='login_light']").prettyPhoto();
					
					$('.event_photo_gallery_tiny_wrapper div a img').hover(function() {
						$(this).stop().animate({ opacity: .7 });
					}, function() {
						$(this).stop().animate({ opacity: 1 });
					});
			});
		</script>
	</head>
	<body>
		<div id="login_light" style="margin-left: auto; margin-right: auto;">
			<div style="position: relative; left: 20px;">
				<br />
				<div>
					<div class="btn_sign_in_linked_in"></div><div class="btn_sign_in_facebook"></div>
				</div>
				<br />
				<div style="margin-bottom: 0px;">
					<div class="login_light_form login_light_label_email login_light_label_password_email"><span>Email</span></div>
					<div class="login_light_form login_light_text_area_email login_light_text_area_password_email"><input type="text" size="36" /></div>
				</div>
				<div>
					<div class="login_light_form login_light_label_password login_light_label_password_email"><span>Password</span></div>
					<div class="login_light_form login_light_text_area_password login_light_text_area_password_email"><input type="text" size="36" /></div>
				</div>
				<br />
				<div style="margin-left: 160px; font-size: 9px;">
					<a href="" alt="" style="#color: 000000">Forgot your password?</a>
					<br /><br />
					<br /><br />
					<input type="submit" value="Login" />
				</div>
			</div>
		</div>
		<div class="header">
			<div class="header_wrapper">
				<a href="" alt=""><img src="images/nwaw_logo_header.png" class="top_logo ie_anchor_no_border" /></a>
				<div class="header_controls">
					<a href="" alt="" title="Facebook" class="header_sns_fb"></a>
					<a href="" alt="" title="LinkedIn" class="header_sns_linked_in"></a>
					<a href="" alt="" title="Twitter" class="header_sns_tt"></a>
					<a href="" alt="" title="Olio" class="header_sns_orkut"></a>
					<a href="#login_light" rel="login_light" class="btn_login" alt=""></a>
					<a href="" alt="" class="btn_register"></a>
				</div>
				<div class="header_nav_buttons_wrapper">
					<a href="" alt="" class="btn_events"></a>
					<a href="" alt="" class="btn_news"></a>
					<a href="" alt="" class="btn_blog"></a>
					<a href="" alt="" class="btn_photos"></a>
					<a href="" alt="" class="btn_contact"></a>
				</div>
			</div>
		</div>
		<div class="banner">
			<div class="banner_people_wrap">
				<div class="banner_content_wrap">
					<div class="banner_description">
						<div class="banner_header_text">NETWORK AFTER WORK</div>
						<span>Networking Events for Professionals is a national business and social networking event company that launched in June 2009. We currently host events in seven cities across the country (Chicago, San Francisco, Los Angeles, San Diego, Washington DC, Detroit and Philadelphia). The events are created for professionals who want to expand their network and create new business opportunities. The events range in size from 150- 600 professionals and take place in each city's top nightlife destinations.</span>&nbsp; <a href="" alt="">View more</a>
					</div>
					<div class="banner_photo">
						<img src="images/banner_photo.png" />
					</div>
					<div class="clear"></div>
					<div class="banner_links">
						<!--<a href="" alt=""><div class="btn_find_event_in_city"></div></a>-->
						<div class="find_event_in_city">
							<select>
								<option>FIND AN EVENT IN YOUR CITY!</option>
								<option>Tokyo</option>
								<option>Seoul</option>
								<option>London</option>
								<option>New York</option>
							</select>
						</div>
						<a href="http://www.youtube.com/watch?v=oHg5SJYRHA0" rel="prettyPhoto" alt="" class="btn_look_at_events"></a>
					</div>
				</div>
			</div>
			<div class="banner_bottom_line"></div>
		</div>
		
    <div class="content">
			<div class="content_wrapper">
				<div class="upcoming_events upcoming_events_top_margin">
					<div>
						<h2 class="text_gray upcoming_events_margin text_museosans500">UPCOMING EVENTS</h2>
						<div class="events_city_drop_down_wrapper">
							SEE EVENTS IN YOUR CITY
							<select>
								<option>Tokyo</option>
								<option>Seoul</option>
								<option>London</option>
								<option>New York</option>
							</select>
						</div>
					</div>
					<ul class="per_block_ul_separator">
						<li>
							<div class="calendar_date">
								<div class="calendar_month_shortened">NOV</div>
								<div class="calendar_day"><h1>13</h1></div>
							</div>
							<div class="event_info">
								<ul>
									<li class="event_city">Los Angeles</li>
									<li class="event_name">Network After Work at Elevate Lounge</li>
									<li class="event_date_time">Thu, Oct 13 2011, 6:00p.m. - 9:00 p.m.</li>
									<li class="event_venue"><a href="" alt="" class="text_no_underline text_gray text_museosans500">811 Wilshire Blvd, 21st Fl, Los Angeles CA</a> &nbsp;<a href="" alt="" class="event_venue_see_more">See Map</a></li>
								</ul>
							</div>
							<div class="event_info_2">
								<a href="" alt="" class="btn_sign_up_now"></a>
								<div class="event_dsa_info_2_label"><div class="event_days_left_count text_red"><span>2</span></div>&nbsp;DAYS LEFT</div>
								<div class="event_dsa_info_2_label"><div class="event_spots_left_count text_dark_blue"><span>15</span></div>&nbsp;SPOTS LEFT</div>
								<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;ATTENDING</div>
							</div>
							<div class="clear"></div>
							<div class="event_info_3">
								<div class="event_main_image">
									<img src="images/event_main_image_1.png" alt="" />
								</div>
								<div class="event_long_description">
									Network After Work events are created for professionals to network and create new business opportunities. Events draw 400+ diverse Chicago professionals from all industries and career levels. Upon entering the event guests will receive a name tag color coded by industry which allows for easy navigation. Network After Work hosts monthly events and take place at some of the cities premier venues. Complimentary sponsored cocktails and light appetizers will be provided from 6- 7pm. **<br />
									<a href="" alt="" class="text_dark_blue">View More</a>
								</div>
								<div class="clear"></div>
								<div class="event_photos_text">
									<div>PAST NETWORK AFTER WORK</div>
									LOS ANGELES PHOTOS <a href="" alt="" class="text_dark_blue">See More</a>
								</div>
								<div class="event_photo_gallery_tiny_wrapper">
									<div><a href="images/gallery_photo_tiny_1.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_1.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_2.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_2.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_3.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_3.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_4.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_4.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_5.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_5.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_6.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_6.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_6.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_6.png" alt="" class="ie_anchor_no_border" /></a></div>
								</div>
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
						</li>
						<li>
							<div class="calendar_date">
								<div class="calendar_month_shortened">NOV</div>
								<div class="calendar_day"><h1>10</h1></div>
							</div>
							<div class="event_info">
								<ul>
									<li class="event_city">Washington D.C.</li>
									<li class="event_name">Network After Work at Elevate Lounge</li>
									<li class="event_date_time">Thu, Oct 10 2011, 6:00p.m. - 9:00 p.m.</li>
									<li class="event_venue"><a href="" alt="" class="text_gray text_no_underline text_museosans500">919 19th St. NW, Washington DC, 20006</a> &nbsp;<a href="" alt="" class="event_venue_see_more">See Map</a></li>
								</ul>
							</div>
							<div class="event_info_2">
								<a href="" alt="" class="btn_sign_up_now"></a>
								<div class="event_dsa_info_2_label"><div class="event_days_left_count text_red"><span>1</span></div>&nbsp;DAYS LEFT</div>
								<div class="event_dsa_info_2_label"><div class="event_spots_left_count text_dark_blue"><span>20</span></div>&nbsp;SPOTS LEFT</div>
								<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;ATTENDING</div>
							</div>
							<div class="clear"></div>
							<div class="event_info_3">
								<div class="event_main_image">
									<img src="images/event_main_image_2.png" alt="" />
								</div>
								<div class="event_long_description">
									Join Network After Work on Tuesday October 18th at Cities (919 19th St. NW ) from 6-9 pm. Out monthly DC events attract 200+ diverse professionals of all industries and career levels. Events are created for professional network and creating new business opportunities. Upon entering guests will be provided with a name tag colored coded by industry which allows for easy navigation. Each event takes place at one of DC’s premier venues. Guest will receive complimentary sponsored cocktails from 6-7pm and light appetizers from 7-8pm.<br />
									<a href="" alt="" class="text_dark_blue">View More</a>
								</div>
								<div class="clear"></div>
								<div class="event_photos_text">
									<div>PAST NETWORK AFTER WORK</div>
									LOS ANGELES PHOTOS <a href="" alt="" class="text_dark_blue">See More</a>
								</div>
								<div class="event_photo_gallery_tiny_wrapper">
									<div><a href="images/gallery_photo_tiny_7.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_7.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_8.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_8.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_9.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_9.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_10.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_10.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_11.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_11.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_12.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_12.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_12.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_12.png" alt="" class="ie_anchor_no_border" /></a></div>
								</div>
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
						</li>
						<li>
							<div class="calendar_date">
								<div class="calendar_month_shortened">NOV</div>
								<div class="calendar_day"><h1>10</h1></div>
							</div>
							<div class="event_info">
								<ul>
									<li class="event_city">Washington D.C.</li>
									<li class="event_name">Network After Work at Elevate Lounge</li>
									<li class="event_date_time">Thu, Oct 10 2011, 6:00p.m. - 9:00 p.m.</li>
									<li class="event_venue"><a href="" alt="" class="text_gray text_no_underline text_museosans500">919 19th St. NW, Washington DC, 20006</a> &nbsp;<a href="" alt="" class="event_venue_see_more">See Map</a></li>
								</ul>
							</div>
							<div class="event_info_2">
								<a href="" alt="" class="btn_sign_up_now"></a>
								<div class="event_dsa_info_2_label"><div class="event_days_left_count text_red"><span>1</span></div>&nbsp;DAYS LEFT</div>
								<div class="event_dsa_info_2_label"><div class="event_spots_left_count text_dark_blue"><span>20</span></div>&nbsp;SPOTS LEFT</div>
								<div class="event_dsa_info_2_label"><div class="event_attending_count text_dark_blue"><span>185</span></div>&nbsp;ATTENDING</div>
							</div>
							<div class="clear"></div>
							<div class="event_info_3">
								<div class="event_main_image">
									<img src="images/event_main_image_2.png" alt="" />
								</div>
								<div class="event_long_description">
									Join Network After Work on Tuesday October 18th at Cities (919 19th St. NW ) from 6-9 pm. Out monthly DC events attract 200+ diverse professionals of all industries and career levels. Events are created for professional network and creating new business opportunities. Upon entering guests will be provided with a name tag colored coded by industry which allows for easy navigation. Each event takes place at one of DC’s premier venues. Guest will receive complimentary sponsored cocktails from 6-7pm and light appetizers from 7-8pm.<br />
									<a href="" alt="" class="text_dark_blue">View More</a>
								</div>
								<div class="clear"></div>
								<div class="event_photos_text">
									<div>PAST NETWORK AFTER WORK</div>
									LOS ANGELES PHOTOS <a href="" alt="" class="text_dark_blue">See More</a>
								</div>
								<div class="event_photo_gallery_tiny_wrapper">
									<div><a href="images/gallery_photo_tiny_7.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_7.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_8.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_8.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_9.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_9.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_10.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_10.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_11.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_11.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_12.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_12.png" alt="" class="ie_anchor_no_border" /></a></div>
									<div><a href="images/gallery_photo_tiny_12.png" rel="prettyPhoto"><img src="images/gallery_photo_tiny_12.png" alt="" class="ie_anchor_no_border" /></a></div>
								</div>
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
						</li>
					</ul>
				</div>
				<div class="right_bar">
					<div class="right_login">
						<h4 class="text_gray text_novecentowidenormal">LOGIN/REGISTER</h4>
						<div class="right_current_members">
							CURRENT MEMBERS <a href="" class="text_sky_blue text_no_underline">50,342</a>
						</div>
						<span class="text_dark_blue right_login_medium_text">Login to see events</span><br />
						<p class="right_login_small_text">you're registered to attend, past events, list of attendees and more!</p>
						<a href="" alt="" class="btn_login_big"></a>
						<span class="text_dark_blue right_login_medium_text">Don't have an account?</span><br />
						<p class="right_login_small_text">Register for free!</p>
						<a href="" alt="" class="btn_register_big"></a>
					</div>
					<div class="right_latest_news">
						<a href="" alt="">See More</a><h4 class="text_novecentowidenormal">LATEST NEWS</h4>
						<ul>
							<li>
								<div class="right_latest_news_date">09.07.2011</div>
								<div class="right_news_description">Network After Work is now hosting events in San Diego!</div>
							</li>
							<li>
								<div class="right_latest_news_date">09.07.2011</div>
								<div class="right_news_description">Network After Work is now hosting events in San Diego!</div>
							</li>
							<li>
								<div class="right_latest_news_date">09.07.2011</div>
								<div class="right_news_description">Network After Work is now hosting events in San Diego!</div>
							</li>
						</ul>
					</div>
					<div class="right_member_spotlight">
						<h4 class="text_novecentowidenormal">MEMBER SPOTLIGHT</h4>
						<div>
							<img src="images/member_spotlight.png" alt="" />
							<div class="right_member_spotlight_info">
								<span class="text_dark_blue text_museosans500">company name</span><br />
								<span class="text_gray text_museosans500">industry</span>
							</div>
						</div>
					</div>
					<div class="right_twitter">
						<script>
							new TWTR.Widget({
										version: 2,
										type: 'profile',
										rpp: 1,
										interval: 30000,
										width: 220,
										height: 30,
										theme: {
											shell: {
												background: '#abd2ec',
												color: '#ffffff'
											},
											tweets: {
												background: '#ffffff',
												color: '#505050',
												links: '#08080a'
											}
										},
										features: {
											scrollbar: false,
											loop: false,
											live: true,
											behavior: 'default'
										}
									}).render().setUser('networkafterwrk').start();
						</script>
					</div>
					<div class="right_sponsors">
						<h4 class="text_novecentowidenormal">OUR SPONSORS</h4>
						<a href="" alt=""><img src="images/sponsors_1.png" alt="" class="ie_anchor_no_border" /></a>
						<a href="" alt=""><img src="images/sponsors_2.png" alt="" class="ie_anchor_no_border" /></a>
						<a href="" alt=""><img src="images/sponsors_3.png" alt="" class="ie_anchor_no_border" /></a>
						<a href="" alt=""><img src="images/sponsors_4.png" alt="" class="ie_anchor_no_border" /></a>
						<a href="" alt=""><img src="images/sponsors_5.png" alt="" class="ie_anchor_no_border" /></a>
						<a href="" alt=""><img src="images/sponsors_6.png" alt="" class="ie_anchor_no_border" /></a>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="footer">
			<div class="footer_wrapper">
				<a href="" alt=""><img src="images/nwaw_logo_footer.png" class="footer_logo ie_anchor_no_border" /></a>
				<div class="footer_nav">
					<p><a href="" alt="">Register now for free</a> to create your profile and view others!</p>
					<ul>
						<li><a href="" alt="">HOME</a>&nbsp;&nbsp; |</li>
						<li>&nbsp;&nbsp;<a href="" alt="">EVENTS</a>&nbsp;&nbsp; |</li>
						<li>&nbsp;&nbsp;<a href="" alt="">CONTACT</a>&nbsp;&nbsp; |</li>
						<li>&nbsp;&nbsp;<a href="" alt="">ABOUT</a></li>
					</ul>
				</div>
				<div class="footer_sns">
					<a href="" alt="" title="Facebook" class="footer_sns_fb"></a>
					<a href="" alt="" title="Twitter" class="footer_sns_tumblr"></a>
					<a href="" alt="" title="LinkedIn" class="footer_sns_linked_in"></a>
				</div>
				<div class="footer_copyright">Copyright © Network After Work 2009</div>
			</div>
		</div>
	</body>
</html>