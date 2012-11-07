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
				<a href="<?php echo url_for('/'); ?>" alt=""><img src="../images/nwaw_logo_header.png" class="top_logo ie_anchor_no_border" /></a>
				<div class="header_controls">
					<a href="" alt="" title="Facebook" class="header_sns_fb"></a>
					<a href="" alt="" title="LinkedIn" class="header_sns_linked_in"></a>
					<a href="" alt="" title="Twitter" class="header_sns_tt"></a>
					<a href="" alt="" title="Olio" class="header_sns_orkut"></a>
          <?php if($sf_context->getUser()->isAuthenticated()): ?>
            <a href="<?php echo url_for('/logout'); ?>" alt="" class="btn_logout_small" alt=""></a>
          <?php else: ?>
            <a href="<?php echo url_for('/login'); ?>" alt="" class="btn_login_small" alt=""></a>
          <?php endif; ?>
				</div>
				<div class="header_nav_buttons_wrapper">
					<a href="" alt="" class="btn_events"></a>
					<a href="" alt="" class="btn_news"></a>
					<a href="" alt="" class="btn_blog"></a>
					<a href="" alt="" class="btn_photos"></a>
					<a href="" alt="" class="btn_contact"></a>
				</div>
			</div>
    </div><!-- header -->
		<!-- header -->
   
    
    <div class="content">
			<div class="banner_bottom_line"></div>
			<div class="content_wrapper">
				<?php echo $sf_content ?>
      <div class="clear"></div>
		</div>

	</body>
</html>