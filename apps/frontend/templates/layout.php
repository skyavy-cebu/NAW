<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<!--[if lt IE 8]>
		<meta http-equiv="X-UA-Compatible" content="IE=9">
		<![endif]-->   
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
		<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>
    <!--[if IE]>
      <script src="/js/ie-html5-fix.js"></script>
    <![endif]-->
	</head>
	<body>
		<div class="header">
			<div class="header_wrapper">
				<a href="<?php echo url_for('/'); ?>" alt=""><img src="/images/nwaw_logo_header.png" class="top_logo ie_anchor_no_border" /></a>
				<div class="header_controls">
          <?php if(!$sf_context->getUser()->isAuthenticated()): ?>
					<a href="<?php echo url_for('/login/facebook'); ?>" alt="" title="Facebook" class="header_sns_fb"></a>
          <a href="<?php echo url_for('/login/linkedin'); ?>" alt="" title="LinkedIn" class="header_sns_linked_in"></a>
          <?php endif; ?>
					<!--
					<a href="" alt="" title="Twitter" class="header_sns_tt"></a>
					<a href="" alt="" title="Olio" class="header_sns_orkut"></a> -->
          <?php if($sf_context->getUser()->isAuthenticated()): ?>
            <a href="<?php echo url_for('/logout'); ?>" alt="" class="btn_logout_small" alt=""></a>
          <?php else: ?>
            <a href="<?php echo url_for('/login'); ?>" alt="" class="btn_login_small" alt=""></a>
          <?php endif; ?>
				</div>
				<div class="header_nav_buttons_wrapper">
					<a href="" alt="" class="btn_events"></a>
					<a href="<?php echo url_for('/news'); ?>" alt="" class="btn_news"></a>
					<a href="" alt="" class="btn_blog"></a>
					<a href="" alt="" class="btn_photos"></a>
					<a href="" alt="" class="btn_contact"></a>
				</div>
			</div>
    </div><!-- header -->
		<!-- header -->
    
    <?php if($sf_context->getModuleName() == 'home'): ?>
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
                <?php $cities = CityTable::getInstance()->getCitiesByState(); ?>
                <?php foreach($cities as $x => $city): ?>
                  <option value="<?php echo $city->getId(); ?>"><?php echo $city->getName(); ?></option>
                <?php endforeach; ?>
							</select>
						</div>
						<a href="http://www.youtube.com/watch?v=oHg5SJYRHA0" rel="prettyPhoto" alt="" class="btn_look_at_events"></a>
					</div>
				</div>
			</div>
			<div class="banner_bottom_line"></div>
		</div>
		<!-- banner --> 
    <?php endif; ?>
    
    <div class="content">
			<div class="banner_bottom_line"></div>
			<div class="content_wrapper">
				<?php echo $sf_content ?>
      <div class="clear"></div>
		</div>
		<div class="footer">
			<div class="footer_wrapper">
				<a href="" alt=""><img src="/images/nwaw_logo_footer.png" class="footer_logo ie_anchor_no_border" /></a>
				<div class="footer_nav">
					<p><a href="<?php echo url_for('/register'); ?>" alt="">Register now for free</a> to create your profile and view others!</p>
					<ul>
						<li><a href="<?php echo url_for('/'); ?>" alt="">HOME</a>&nbsp;&nbsp; |</li>
						<li>&nbsp;&nbsp;<a href="" alt="">EVENTS</a>&nbsp;&nbsp; |</li>
						<li>&nbsp;&nbsp;<a href="" alt="">CONTACT</a>&nbsp;&nbsp; |</li>
						<li>&nbsp;&nbsp;<a href="<?php echo url_for('about'); ?>" alt="">ABOUT</a></li>
					</ul>
				</div>
				<div class="footer_sns">
					<a href="" alt="" title="Facebook" class="footer_sns_fb"></a>
					<a href="" alt="" title="Twitter" class="footer_sns_tumblr"></a>
					<a href="" alt="" title="LinkedIn" class="footer_sns_linked_in"></a>
				</div>
				<div class="footer_copyright">Copyright &copy Network After Work <?php echo date('Y'); ?></div>
			</div>
		</div>
	</body>
</html>