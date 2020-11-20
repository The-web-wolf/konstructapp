<?php 
	$page_name = 'Portfolio';
	$page_mode = 'user';
	require 'includes/dynamic/header.php';
	$pretitle = 'User portfolios'; 
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/static/headcontent.php') ?>

<style type="text/css">
	#all-portfolio-container .all-portfolio .video-player img{
		height: 190px;
		width: 100%;
		object-fit: cover;
	}
	.features-video .video-player img{
		width: 100%;
		max-height: 500px;
		object-fit: cover;
	}

</style>

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
									<li class="active-li">
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

<div id="root">
	<div class="loader-activity">
	  <div class="indeterminate"></div>
	</div>

	<!-- ... end Top Header-Profile -->
	<div class="container" id="featured-portfolio-header">
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title inline-items">
						<div class="btn btn-control btn-control-small bg-yellow">
							<svg class="olymp-trophy-icon"><use xlink:href="#olymp-trophy-icon"></use></svg>
						</div>
						<h6 class="title"><?php echo $req_user_data['firstName']; ?>’s Featured Portfolio</h6>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				
				<!-- Features Video -->
				
				<div id="featured-portfolio-container">
					<div class="ui-block features-video">
						
					</div>				
				</div>

				
				<!-- ... end Features Video -->
			</div>
		</div>
	</div>

	<div class="container" id="howto-featured">
		<div class="page-description" style="">
			<div class="icon">
				<svg class="olymp-info-icon left-menu-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="PROFILE INFO"><use xlink:href="#olymp-info-icon"></use></svg>
			</div>
			<span>Set a featured portfolio to be displayed in other to captivate visitors and boost your work <a href="#">See how it works</a></span>
		</div>		
	</div>

	<div class="container" id="all-portfolio-header">
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title">
						<div class="h6 title"><?php echo $req_user_data['firstName'] ?>’s Portfolio</div>

						<?php if ($self_user): ?>
							<div class="align-right">
								<a href="#" class="btn btn-primary btn-md-2" data-toggle="modal" data-target="#create-new-portfolio">Create portfolio +</a>
							</div>						
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="all-portfolio-container">
			<div class="row all-portfolio">
				
			</div>			
		</div>
	</div>
	
</div>




<?php include('includes/static/components/modals/portfolio.php') ?>

<?php include('includes/static/scripts.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>

<?php include('models/portfolio.php') ?>
<?php include('models/likes.php') ?>
<?php include('includes/app/portfolio.php') ?>

</body>
</html>
