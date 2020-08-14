<?php 
	$page_name = 'Profile';
	$page_mode = 'user';
 	require 'includes/dynamic/header.php';
?>
<!DOCTYPE html>
<html lang="en">
	<?php include('includes/static/headcontent.php') ?>

<body class="page-has-left-panels darkmode">

<!-- ... end Profile Settings Responsive -->

<?php include ('includes/static/sidebar-left.php'); ?>

<?php include('includes/static/header-top.php') ?>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>

<!-- Main Header Account -->

<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="<?php echo $req_user_data['backgroundPic'] ?>"  alt="Dawn at south dusk" style='max-height: 480px;width: 100%'>
					</div>
					<div class="profile-section">
						<div class="row" >
							<div class="col col-xs-6 col-lg-5 col-md-5 col-sm-12 ">
								<ul class="profile-menu">
									<li class="active-li">
										<a href="user?id=<?php echo $req_user_data['_id'] ?>">Profile</a>
									</li>
									<li>
										<a href="user-about?id=<?php echo $req_user_data['_id'] ?>">About</a>
									</li>
								</ul>
							</div>
							<div class="col col-xs-6 col-lg-5 ml-auto col-md-5">
								<ul class="profile-menu">
									<li>
										<a href="user-bids?id=<?php echo $req_user_data['_id'] ?>">Bids</a>
									</li>
									<li>
										<a href="user-portfolio?id=<?php echo $req_user_data['_id'] ?>">Portfolio</a>
									</li>
								</ul>
							</div>
						</div>

						<?php if ($self_user): ?>
							<div class="control-block-button">
								<div class="btn btn-control bg-primary more">
									<svg class="olymp-settings-icon"><use xlink:href="#olymp-camera-icon"></use></svg>

									<ul class="more-dropdown">
										<li>
											<a href="#" data-toggle="modal" data-target="#update-profile-photo">Update Profile Photo</a>
										</li>
										<li>
											<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
										</li>
									</ul>
								</div>
							</div>							
						<?php endif ?>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb">
							<img src="<?php echo $req_user_data['userPic'] ?>" class='custom-bg' alt="avatar">
						</a>
						<div class="author-content">
							<a href="#" class="h4 author-name"><?php echo $req_user_data['firstName'] ?> <?php echo $req_user_data['lastName'] ?></a>
							<div class="country"><?php echo $req_user_data['occupation'] ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->
<div class="container">
	<div class="row">


		<!-- Left Sidebar -->

		<div class="col col-xl-3 order-1 col-lg-6 order-lg-1 col-md-6 col-sm-6 col-12 web-only" >
			<div class="crumina-sticky-sidebar">
				<div class="sidebar__inner" style="padding-top: 10px">					
					<div class="ui-block web-only">
						<div class="ui-block-title">
							<h6 class="title">Profile Intro</h6>
						</div>
						<div class="ui-block-content">

							<!-- W-Personal-Info -->
							
							<ul class="widget w-personal-info item-block">
								<?php if (!empty($req_user_data['bio'])): ?>							
								<li>
									<span class="title">About Me:</span>
									<span class="text"><?php echo $req_user_data['bio'] ?></span>
								</li>
								<?php endif ?>
								<?php if (!empty($req_user_data['country'])): ?>							
								<li>
									<span class="title">Location:</span>
									<span class="text"><?php echo $req_user_data['city'] ?> <?php echo $req_user_data['state'] ?>, <?php echo $req_user_data['country'] ?></span>
								</li>
								<?php endif ?>
							</ul>
							
							<!-- .. end W-Personal-Info -->
						</div>
					</div>	
					<div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Share profile</h6>
						</div>
						<div class="ui-block-content">

							
							<!-- Widget About -->
							
							<div class="widget w-about">
								<p>Share <?php echo $req_user_data['firstName'] ?>'s profile on one of the following social platforms to promote them </p>
								<ul class="socials">
									<li>
										<a href="#facebook" class="no-ajaxy" data-sharer='facebook' data-hashtag='KonstructApp' data-url="https://konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
											<i class="fab fa-facebook-square" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#twitter" class="no-ajaxy" data-sharer='twitter' data-title="Check Out <?php echo $req_user_data['firstName'] ?>'s profile On KonstructApp" data-hashtags='KonstructApp,Construction,<?php echo $req_user_data['occupation'] ?>' data-url="https://konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
											<i class="fab fa-twitter"  aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#reddit" class="no-ajaxy" data-sharer='reddit' data-url="https://konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
											<i class="fab fa-reddit" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#whatsapp" class="no-ajaxy" data-sharer='whatsapp' data-title="Check Out <?php echo $req_user_data['firstName'] ?>'s profile On KonstructApp" data-url="https://konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
											<i class="fab fa-whatsapp" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#linkedin" class="no-ajaxy" data-sharer='linkedin' data-url="https://konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
											<i class="fab fa-linkedin" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</div>
							
							<!-- ... end Widget About -->

						</div>
					</div>			
				</div>
			</div>

		</div>

		<!-- ... end Left Sidebar -->		

		<!-- Main Content -->

		<div class="col col-xl-6 order-3 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
			<div class="page-description" id="incomplete-profile">
				<div class="icon">
					<svg class="olymp-info-icon left-menu-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="PROFILE INFO"><use xlink:href="#olymp-info-icon"></use></svg>
				</div>
				<span>Complete your <a href="settings"> profile information </a> to get the best of Konstructapp</span>
			</div>

			<div id="newsfeed-items-grid">
				<div class="loader-activity">
				  <div class="indeterminate"></div>
				</div>

			</div>

		</div>

		<!-- ... end Main Content -->


		<!-- Right Sidebar -->

		<div class="col col-xl-3 order-2 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12" >
			<div class="crumina-sticky-sidebar">

				<div class="ui-block web-only">
					<div class="ui-block-title">
						<h6 class="title">Recent Portfolio</h6>
					</div>

					<!-- W-Friend-Pages-Added -->
					
					<ul class="widget w-friend-pages-added notification-list friend-requests" id="recentPortfolio">
						<div class="loader-activity">
						  <div class="indeterminate"></div>
						</div>						
					</ul>
					
					<!-- .. end W-Friend-Pages-Added -->
				</div>

				<div class="ui-block web-only">
					<div class="ui-block-title">
						<h6 class="title">Recent Bids</h6>
					</div>

					<!-- W-Friend-Pages-Added -->
					
					<ul class="widget w-friend-pages-added notification-list friend-requests" id="recentBids">					
						<div class="loader-activity">
						  <div class="indeterminate"></div>
						</div>		
					</ul>
					
					<!-- .. end W-Friend-Pages-Added -->
				</div>
				</div>
			</div>

		</div>

		<!-- ... end Right Sidebar -->

	</div>
</div>


<a class="back-to-top" href="#">
	<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<!-- Load Status files -->

<?php include('includes/static/components/modals/status.php') ?>

<!-- End Load status files -->

<?php include('includes/static/scripts.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
<script src="assets/js/freewall.js"></script>

<?php include('models/likes.php') ?>
<?php include('models/status.php') ?>

<?php include('includes/app/profile.php') ?>

</body>
</html>
