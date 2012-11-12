 <div class="right_bar">
				<div class="right_logged_in">
          <?php if($sf_context->getUser()->isAuthenticated()): ?>
					<!-- Login User -->
          <h4 class="text_novecentowidenormal">LOGGED IN AS</h4>
					<div>
						<?php if($profile->getImageSmall()): ?>
              <img src="/uploads/user/<?php echo $profile->getImageSmall(); ?>" alt="" />
            <?php else: ?>
              <img class="default_small" src="/images/default.png" alt="" />
            <?php endif; ?>
						<div class="logged_in_details"><span class="text_gray"><?php echo $name; ?></span><br /><span class="text_dark_blue"><?php echo $profile->getCompany(); ?></span></div>
						<div class="clear"></div>
						<a href="<?php echo url_for('dashboard'); ?>" alt="" class="btn_my_dashboard"></a>
						<a href="<?php echo url_for('profile/edit'); ?>" alt="" class="btn_edit_profile"></a>
						<a href="logout" alt="" class="btn_logout"></a>
					</div><!-- Login User -->
          <?php else: ?>
          <!-- Login Form -->
          <h4 class="text_gray text_novecentowidenormal">LOGIN/REGISTER</h4>
          <div class="right_current_members">
            CURRENT MEMBERS <a href="" class="text_sky_blue text_no_underline">50,342</a>
          </div>
          <span class="text_dark_blue right_login_medium_text">Login to see events</span><br />
          <p class="right_login_small_text">you're registered to attend, past events, list of attendees and more!</p>
          <a href="<?php echo url_for('/login'); ?>" alt="" class="btn_login_big"></a>
          <span class="text_dark_blue right_login_medium_text">Don't have an account?</span><br />
          <p class="right_login_small_text">Register for free!</p>
          <a href="<?php echo url_for('/register'); ?>" alt="" class="btn_register_big"></a>
          <!-- Login Form -->
          <?php endif; ?>
          
				</div><!-- right_logged_in -->
        
				<div class="right_latest_news">
					<a href="<?php echo url_for('/news'); ?>" alt="">See More</a><h4 class="text_novecentowidenormal">LATEST NEWS</h4>
          <?php if($news): ?>
            <ul>
              <?php foreach($news as $x => $row): ?>
              <li>
                <div class="right_latest_news_date"><?php echo date('m.d.Y',strtotime($row->getPostDate())); ?></div>
                <div class="right_news_description"><?php echo $row->getTitle(); ?></div>
              </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
				</div>
				<div class="right_member_spotlight">
					<h4 class="text_novecentowidenormal">MEMBER SPOTLIGHT</h4>
					<div>
						<img src="../images/member_spotlight.png" alt="" />
							<div class="right_member_spotlight_info">
								<span class="text_museosans500 text_dark_blue">company name</span><br />
								<span class="text_museosans500 text_gray">industry</span>
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
          <?php if($sponsor): ?>
            <?php foreach($sponsor as $x => $row): ?>
              <a target="_blank" href="<?php echo $row->getUrl(); ?>" alt="<?php echo $row->getCompany(); ?>" title="<?php echo $row->getCompany(); ?>">
                <img src="<?php echo url_for('/uploads/sponsor/'.$row->getImage()); ?>" alt="<?php echo $row->getCompany(); ?>" class="ie_anchor_no_border" />
              </a>
            <?php endforeach; ?>
          <?php endif; ?>
				</div>
			</div>
		