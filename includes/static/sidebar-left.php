<?php if(isset($user_data)): ?>

	<div class="fixed-sidebar">
		<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

			<div data-mcs-theme="dark">
				<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="OPEN MENU"><use xlink:href="#olymp-menu-icon"></use></svg>
						</a>
					</li>
					<li>
						<a href="./">
							<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="FEEDS"><use xlink:href="#olymp-newsfeed-icon"></use></svg>
						</a>
					</li>
					<li>
						<a href="user?id=<?php echo $_COOKIE['_id'] ?>">
							<svg class="olymp-happy-face-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="PROFILE"><use xlink:href="#olymp-happy-face-icon"></use></svg>
							
						</a>
					</li>
					<li>
						<a href="portfolio">
							<svg class="olymp-trophy-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="PORTFOLIO"><use xlink:href="#olymp-trophy-icon"></use></svg>
						</a>
					</li>
					<li>
						<a href="bids">
							<svg class="olymp-status-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="BIDS"><use xlink:href="#olymp-status-icon"></use></svg>
						</a>
					</li>
					<li>
						<a href="user-reviews?id=<?php echo $_COOKIE['_id']; ?> ">
							<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="REVIEWS AND RATINGS"><use xlink:href="#olymp-star-icon"></use></svg>
						</a>
					</li>
					<li>
						<a href="#loans" data-toggle='modal' data-target='#coming-soon'>
							<svg class="olymp-share-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="LOANS"><use xlink:href="#olymp-share-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<svg class="olymp-close-icon left-menu-icon"><use xlink:href="#olymp-close-icon"></use></svg>
							<span class="left-menu-title">Collapse Menu</span>
						</a>
					</li>
					<li>
						<a href="./">
							<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="FEEDS"><use xlink:href="#olymp-newsfeed-icon"></use></svg>
							<span class="left-menu-title">Feeds</span>
						</a>
					</li>
					<li>
						<a href="user?id=<?php echo $_COOKIE['_id'] ?>">
							<svg class="olymp-happy-face-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="PROFILE"><use xlink:href="#olymp-happy-face-icon"></use></svg>
							<span class="left-menu-title">Public Profile</span>
						</a>
					</li>
					<li>
						<a href="portfolio">
							<svg class="olymp-trophy-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="PORTFOLIO"><use xlink:href="#olymp-trophy-icon"></use></svg>
							<span class="left-menu-title">Portfolio</span>
						</a>
					</li>
					<li>
						<a href="bids">
							<svg class="olymp-status-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="BIDS"><use xlink:href="#olymp-status-icon"></use></svg>
							<span class="left-menu-title">Bids</span>
						</a>
					</li>
					<li>
						<a href="user-reviews?id=<?php echo $_COOKIE['_id']; ?> ">
							<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="REVIEWS AND RATINGS"><use xlink:href="#olymp-star-icon"></use></svg>
							<span class="left-menu-title">Reviews and ratings</span>
						</a>
					</li>
					<li>
						<a href="#loans" data-toggle='modal' data-target='#coming-soon'>
							<svg class="olymp-share-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="LOANS"><use xlink:href="#olymp-share-icon"></use></svg>
							<span class="left-menu-title">Loans</span>
						</a>
					</li>
					
				</ul>

				<div class="profile-completion">

					<div class="skills-item">
						<div class="skills-item-info">
							<span class="skills-item-title">Profile Completion</span>
							<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
						</div>
						<div class="skills-item-meter">
							<span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
						</div>
					</div>

					<span>Complete <a href="settings">your profile</a> so people can know more about you!</span>

				</div>
			</div>
		</div>
	</div>

	<!-- ... end Fixed Sidebar Left -->


	<!-- Fixed Sidebar Left -->

	<div class="fixed-sidebar fixed-sidebar-responsive">

		<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
			<a href="#" class="logo js-sidebar-open" style="background: #2c304a">
				<img src="assets/img/logo/menulogo.png" alt="app">
			</a>

		</div>

		<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
			<div class="mCustomScrollbar" data-mcs-theme="dark">

				<div class="control-block" style="padding-top: 25px">
					<div class="author-page author vcard inline-items">
						<div class="author-thumb">
							<img alt="avatar" src="<?php echo $user_data['userPic'] ?>" class="avatar custom-bg" style='width: 40px'>
						</div>
						<a href="user?id=<?php echo $_COOKIE['_id'] ?>" class="author-name fn">
							<div class="author-title c-white">
								<?php echo $user_data['firstName'] ?> <?php echo $user_data['lastName'] ?> 
							</div>
							<span class="author-subtitle"><?php echo $user_data['occupation'] ?></span>
						</a>
					</div>
				</div>


	<!-- 			<div class="ui-block-title ui-block-title-small">
					<h6 class="title">MAIN SECTIONS</h6>
				</div> -->

				<ul class="left-menu">
					<li>
						<a href="./">
							<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="FEEDS"><use xlink:href="#olymp-newsfeed-icon"></use></svg>
							<span class="left-menu-title">Feeds</span>
						</a>
					</li>
					<li>
						<a href="user?id=<?php echo $_COOKIE['_id'] ?>">
							<svg class="olymp-happy-face-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="PROFILE"><use xlink:href="#olymp-happy-face-icon"></use></svg>
							<span class="left-menu-title">Public Profile</span>
						</a>
					</li>				
					<li>
						<a href="portfolio">
							<svg class="olymp-trophy-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="PORTFOLIO"><use xlink:href="#olymp-trophy-icon"></use></svg>
							<span class="left-menu-title">Portfolio</span>
						</a>
					</li>
					<li>
						<a href="bids">
							<svg class="olymp-status-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="BIDS"><use xlink:href="#olymp-status-icon"></use></svg>
							<span class="left-menu-title">Bids</span>
						</a>
					</li>
					<li>
						<a href="user-reviews?id=<?php echo $_COOKIE['_id']; ?> ">
							<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Reviews and ratings"><use xlink:href="#olymp-star-icon"></use></svg>
							<span class="left-menu-title">Reviews and ratings</span>
						</a>
					</li>
					<!-- <li>
						<a href="marketplace">
							<svg class="olymp-shopping-bag-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MARKETPLACE"><use xlink:href="#olymp-shopping-bag-icon"></use></svg>
							<span class="left-menu-title">Marketplace</span>
						</a>
					</li> -->
					<li>
						<a href="#" data-toggle='modal' data-target='#coming-soon'>
							<svg class="olymp-share-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" data-original-title="LOANS"><use xlink:href="#olymp-share-icon"></use></svg>
							<span class="left-menu-title">Loans</span>
						</a>
					</li>
					<li>
						<a href="#" class="installAppPrompt" style="display: none">
							<svg class="olymp-plus-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="INSTALL APP"><use xlink:href="#olymp-plus-icon"></use></svg>
							<span class="left-menu-title">Install app icon</span>
						</a>
					</li>
					<hr style="height: 0.1px;background: rgba(52, 55, 75, .51); padding: 0 3px; margin: 10px 7px 0px 7px;">
					<li>
						<a href="settings">

							<svg class="olymp-menu-icon left-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>

							<span>Profile Settings</span>
						</a>
					</li>
					<li>
						<a href="./about">
							<svg class="olymp-info-icon left-menu-icon"><use xlink:href="#olymp-info-icon"></use></svg>

							<span>About KonstructApp</span>
						</a>
					</li>
					<li>
						<a href="controllers/delssid">
							<svg class="olymp-logout-icon left-menu-icon"><use xlink:href="#olymp-logout-icon"></use></svg>

							<span>Log Out</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- ... end Fixed Sidebar Left -->

<?php endif ?>


<?php if(!isset($user_data)): ?>

<div class="fixed-sidebar">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

		<div data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="OPEN MENU"><use xlink:href="#olymp-menu-icon"></use></svg>
						
					</a>
				</li>
				<li>
					<a href="signin?return_url=<?=$requested_page?>">
						<svg class="olymp-login-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="SIGN IN"><use xlink:href="#olymp-login-icon"></use></svg>
					</a>
				</li>

				<li>
					<a href="signin?return_url=<?=$requested_page?>">
						<svg class="olymp-happy-face--icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="CREATE ACCOUNT"><use xlink:href="#olymp-happy-face-icon"></use></svg>
					</a>
				</li>				
			</ul>
		</div>
	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="#olymp-close-icon"></use></svg>
						<span class="left-menu-title">Collapse Menu</span>
					</a>
				</li>
				<li>
					<a href="signin?return_url=<?=$requested_page?>">
						<svg class="olymp-login-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="SIGN IN"><use xlink:href="#olymp-login-icon"></use></svg>
						<span class="left-menu-title">Sign In</span>
					</a>
				</li>

				<li>
					<a href="signin?return_url=<?=$requested_page?>">
						<svg class="olymp-happy-face--icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="CREATE ACCOUNT"><use xlink:href="#olymp-happy-face-icon"></use></svg>
						<span class="left-menu-title">Create Account</span>

					</a>
				</li>				
			</ul>
		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="#" class="logo js-sidebar-open" style="background: #2c304a">
			<img src="assets/img/logo/menulogo.png" alt="app">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<ul class="left-menu">
				<li>
					<a href="signin?return_url=<?=$requested_page?>">
						<svg class="olymp-login-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="SIGN IN"><use xlink:href="#olymp-login-icon"></use></svg>
						<span class="left-menu-title">Sign In</span>
					</a>
				</li>

				<li>
					<a href="signin?return_url=<?=$requested_page?>">
						<svg class="olymp-happy-face--icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="CREATE ACCOUNT"><use xlink:href="#olymp-happy-face-icon"></use></svg>
						<span class="left-menu-title">Create Account</span>
					</a>
				</li>	
				<hr style="height: 0.1px;background: rgba(52, 55, 75, .51); padding: 0 3px; margin: 10px 7px 0px 7px;">

				<li>
					<a href="./about">
						<svg class="olymp-info-icon left-menu-icon"><use xlink:href="#olymp-info-icon"></use></svg>

						<span>About KonstructApp</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left

<?php endif ?>