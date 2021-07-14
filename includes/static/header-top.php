<!-- Header-BP -->

<header class="header" id="site-header">

	<div class="page-title">
		<h6> <?=$pretitle?></h6>
	</div>

	<div class="header-content-wrapper">
		<form class="search-bar w-search user-search-form more has-items notification-list friend-requests">
			<div class="form-group with-button ">
				<input class="form-control user-search" style='color:white;font-weight:bold' placeholder="Type here to start searching..." type="search">
				<button type='submit'>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
				</button>
			</div>
			
			<div class="more-dropdown more-with-triangle triangle-top-right" id='searchBox' style='width:100vh; max-width:360px'>
			<div class='selectize-dropdown'>
						<div class='selectize-dropdown-content search-result-content' >
						</div>
					</div>
			</div>
		</form>
		
		<?php if(isset($user_data)): ?>	

			<div class='control-block'>
				<div class="author-page author vcard inline-items more">
					<div class="author-thumb">
						<img alt="avatar" src="<?php echo $user_data['userPic'] ?>" class="avatar default-bg" style='width: 40px;border:1px solid rgba(225,255,255,.5)'>
						<div class="more-dropdown more-with-triangle">
							<div class="mCustomScrollbar" data-mcs-theme="dark">
								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">Your Account</h6>
								</div>

								<ul class="account-settings">
									<li>
										<a href="settings">

											<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>

											<span>Profile Settings</span>
										</a>
									</li>
									<li>
										<a href="./controllers/delssid">
											<svg class="olymp-logout-icon"><use xlink:href="#olymp-logout-icon"></use></svg>

											<span>Log Out</span>
										</a>
									</li>
								</ul>


								<div class="ui-block-title ui-block-title-small">
									<h6 class="title">More Information</h6>
								</div>

								<ul>
									<li>
										<a href="./about">
											<span>About KonstructApp</span>
										</a>
									</li>
									
								</ul>
							</div>

						</div>
					</div>
					<a href="user?id=<?php echo($_COOKIE['_id']) ?>" class="author-name fn">
						<div class="author-title">
							<?php echo $user_data['firstName'] ?> <?php echo $user_data['lastName'] ?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="#olymp-dropdown-arrow-icon"></use></svg>
						</div>
						<span class="author-subtitle" style="color: white"><?php echo $user_data['occupation'] ?></span>
					</a>
				</div>			
			</div>

		<?php endif; ?>

		
		<?php if(!isset($user_data)): ?>	

		<div class='control-block'>
			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="avatar" src="https://res.cloudinary.com/konstructapp/image/upload/v1597157743/logo/app_muqoyt_tqzyw5.png" class="avatar default-bg" style='width: 40px;border:1px solid rgba(225,255,255,.5)'>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="signin?return_url=<?=$requested_url?>">
										<svg class="olymp-happy-face-icon"><use xlink:href="#olymp-happy-face-icon"></use></svg>

										<span>Create Account</span>
									</a>
								</li>
								<li>
									<a href="signin?return_url=<?=$requested_url?>">
										<svg class="olymp-login-icon"><use xlink:href="#olymp-login-icon"></use></svg>

										<span>Signin account</span>
									</a>
								</li>
							</ul>


							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">More Information</h6>
							</div>

							<ul>
								<li>
									<a href="./about">
										<span>About KonstructApp</span>
									</a>
								</li>
								
							</ul>
						</div>

					</div>
				</div>
				<a href="#" class="author-name fn">
					<div class="author-title">
						KonstructApp <svg class="olymp-dropdown-arrow-icon"><use xlink:href="#olymp-dropdown-arrow-icon"></use></svg>
					</div>
					<span class="author-subtitle" style="color: white">Get started</span>
				</a>
			</div>			
		</div>

		<?php endif; ?>		

	</div>

</header>

<!-- ... end Header-BP -->


<!-- Responsive Header-BP -->

<header class="header header-responsive" id="site-header-responsive">

	<div class="header-content-wrapper">
		<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
			<li class="nav-item"  style='position:absolute;right:10px'>
				<a class="nav-link push-right" data-toggle="tab" href="#search" role="tab">
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
					<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
				</a>
			</li>
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content tab-content-responsive">

		<div class="tab-pane " id="search" role="tabpanel">

			<div class='notification-list friend-requests'>
				<form class="search-bar w-search user-search-form">
					<div class="form-group with-button">
						<input class="form-control user-search" style='color:white;font-weight:bold' placeholder="Type here to start searching..." type="search">
						<button type='submit'> 
							<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
						</button>
					</div>
				</form>

				<div class='selectize-dropdown ' >
					<div class='selectize-dropdown-content search-result-content' style='padding-top:65px;'>
						
					</div>
				</div>
			</div>

		</div>

	</div>
	<!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->