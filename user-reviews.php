<?php 
	$page_name = 'Reviews';
	$page_mode = 'user';
 	require 'includes/dynamic/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/static/headcontent.php') ?>

<style type="text/css">
	#root .container{
		margin-bottom:60px
	}
	.section .title.h5{
		color:white;
		padding-bottom: 10px
	}
	.rate-item .rate-author-name{
		text-transform:capitalize
	}
	.rate-item .text-rating{
		display: block;
		margin-top: 10px;
		text-align:center;
	}
	.rate-item .rate-client{
		text-transform:capitalize
	}
	.rate-item .rate-date{
		color:#888da8;
		font-size:10px;
	}
	.rate-item .text-rating{
		margin-bottom:10px
	}
	.star-rating {
		position: relative;
		width: 100px;
		margin: 10px auto 0px auto;
	} 
	.cornerimage {
		border: 0;
		position: absolute;
		top: 0;
		left: 0;
		overflow: hidden;
	} 
	.star-rating img{
		max-width: 100px;
	}	
	
</style>

<body class="page-has-left-panels darkmode">

<!-- ... end Profile Settings Responsive -->

<?php include ('includes/static/sidebar-left.php'); ?>

<?php include('includes/static/header-top.php') ?>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>

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
									<li >
										<a href="user?id=<?php echo $req_user_data['_id'] ?>">Profile</a>
									</li>
									<li>
										<a href="user-about?id=<?php echo $req_user_data['_id'] ?>">About</a>
									</li>
								</ul>
							</div>
							<div class="col col-xs-6 col-lg-5 ml-auto col-md-5">
								<ul class="profile-menu">
									<li class="">
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

<div id="root">

	<div class="container section">
		<div class="h5 title">My Reviews</div>		
		<div class="loader-activity">
		  <div class="indeterminate"></div>
		</div>
		<div id="all-reviews-container">
			<div class="row all-reviews">
				
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

<!-- Portfolio actions -->
<?php include('includes/app/reviews.php') ?>

</body>
</html>
