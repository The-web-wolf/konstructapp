<?php 
	$page_name = 'About';
	$page_mode = 'user';
	require 'includes/dynamic/header.php';
	$pretitle = 'User about'; 
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
									<li>
										<a href="user?id=<?php echo $req_user_data['_id'] ?>">Profile</a>
									</li>
									<li class="active-li">
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
							<img src="<?php echo $req_user_data['userPic'] ?>" class='custom-bg' alt="<?php $req_user_data['firstName']?>'s avatar" >
						</a>

						<div class="author-content">
							<a href="#" class="h4 author-name">
								<?php echo $req_user_data['firstName'] ?> <?php echo $req_user_data['lastName'] ?>  
								<?php if($req_user_data['userIdentityVerify']) : ?>
									<span class='fa fa-check-circle text-primary'></span>
								<?php endif; ?>
							</a>
							<div class="country"><?php echo $req_user_data['occupation'] ?></div>

							<div class="star-rating u-average-rating" >
								<div class="cornerimage" style="width:<?php echo ($req_user_data['averageRating'] * 20); ?>%;">
									<img src="./assets/img/stars_full.png" alt="<?=$req_user_data['averageRating']?> star rating">
								</div>	
								<img src="./assets/img/stars_blank.png" alt="<?=$req_user_data['averageRating']?> star rating">										
							</div>
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
		<div class="col order-2 col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Certifications</h6>
				</div>
				<div class="ui-block-content">
					<div id="education-root">

					</div>
				</div>
			</div>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Work History</h6>
				</div>
				<div class="ui-block-content">
					<div id="work-history-root">

					</div>
				</div>
			</div>
			<div class="ui-block mobile-only">
				<div class="ui-block-title">
					<h6 class="title">Share profile</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">

					
					<!-- Widget About -->
					
					<div class="widget w-about">
						<p>Share <?php echo $req_user_data['firstName'] ?>'s profile on one of the following social platforms to promote them </p>
						<ul class="socials">
							<li>
								<a href="#facebook" class="no-ajaxy" data-sharer='facebook' data-hashtag='KonstructApp' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-facebook-square" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#twitter" class="no-ajaxy" data-sharer='twitter' data-title="Check Out <?php echo $req_user_data['firstName'] ?>'s professional profile On KonstructApp" data-hashtags='KonstructApp,Construction,<?php echo $req_user_data['occupation'] ?>' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-twitter"  aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#reddit" class="no-ajaxy" data-sharer='reddit' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-reddit" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#whatsapp" class="no-ajaxy" data-sharer='whatsapp' data-title="Check Out <?php echo $req_user_data['firstName'] ?>'s professional profile On KonstructApp" data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-whatsapp" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#linkedin" class="no-ajaxy" data-sharer='linkedin' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
					
					<!-- ... end Widget About -->

				</div>
			</div>	
		</div>

		<div class="col col-xl-4 order-1 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title" style="display: block;">Bio: <span class="text" style="color:#888da8;font-weight: normal;font-size: 12px;float:right;"> <?php echo $req_user_data['bio'] ?> </span></h6>
				</div>
				<div class="ui-block-content">

					
					<!-- W-Personal-Info -->
					
					<ul class="widget w-personal-info item-block">

						<li>
							<span class="title">Location:</span>
							<span class="text"><?php echo $req_user_data['city'] ?> <?php echo $req_user_data['state'] ?>, <?php echo $req_user_data['country'] ?></span>
						</li>
						<li>
							<span class="title">Profession:</span>
							<span class="text"><?php echo $req_user_data['occupation'] ?></span>
						</li>
						<li>
							<span class="title">Joined:</span>
							<span class="text date-to-format"><?php echo $req_user_data['createdAt'] ?></span>
						</li>
						<li>
							<span class="title">Gender:</span>
							<span class="text"><?php echo $req_user_data['gender'] ?></span>
						</li>
					</ul>
					
					<!-- ... end W-Personal-Info -->
				</div>
			</div>
			<div class="ui-block web-only">
				<div class="ui-block-title">
					<h6 class="title">Share profile</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">

					
					<!-- Widget About -->
					
					<div class="widget w-about">
						<p>Share <?php echo $req_user_data['firstName'] ?>'s profile on one of the following social platforms to promote them </p>
						<ul class="socials">
							<li>
								<a href="#facebook" class="no-ajaxy" data-sharer='facebook' data-hashtag='KonstructApp' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-facebook-square" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#twitter" class="no-ajaxy" data-sharer='twitter' data-title="Check Out <?php echo $req_user_data['firstName'] ?>'s profile On KonstructApp" data-hashtags='KonstructApp,Construction,<?php echo $req_user_data['occupation'] ?>' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-twitter"  aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#reddit" class="no-ajaxy" data-sharer='reddit' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-reddit" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#whatsapp" class="no-ajaxy" data-sharer='whatsapp' data-title="Check Out <?php echo $req_user_data['firstName'] ?>'s profile On KonstructApp" data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
									<i class="fab fa-whatsapp" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#linkedin" class="no-ajaxy" data-sharer='linkedin' data-url="https://app.konstructapp.com/user?id=<?php echo $req_user_data['_id'] ?>">
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





<?php include('includes/static/scripts.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>

<?php include('includes/app/profile_about.php') ?>

<script>
	$(document).ready(function(){
		let newnode = $('.date-to-format');
		let nodetext = $(newnode).text()
		let relative_date	= moment(nodetext).fromNow();
		$(newnode).text(relative_date)
	})
</script>

</body>
</html>
