<?php 
	$page_name = 'Bids';
	$page_mode = 'user';
 	require 'includes/dynamic/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/static/headcontent.php') ?>

<style type="text/css">
	#all-bid-container .blog-post-v3 .post-thumb img{
		height: 230px;
		object-fit: cover;
		width: 100%;
	}
	@media(max-width:600px){
		#all-bid-container .blog-post-v3 .post-title{
			margin-bottom: 0px
		}
		#all-bid-container .blog-post-v3 .post-additional-info{
			padding: 20px 0 0;
		}
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
									<li class="active-li">
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
							<img src="<?php echo $req_user_data['userPic'] ?>" alt="avatar">
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

	<div class="loader-activity">
	  <div class="indeterminate"></div>
	</div>

<div class="container" id="bid-sort-container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex1200">
				<div class="ui-block-title">
					<div class="w-select">
						<div class="title">Filter By:</div>
						<fieldset class="form-group">
							<select class="selectpicker form-control">
								<option value="NU">All Categories</option>
								<option value="NU">Fevourite</option>
								<option value="NU">Closed</option>
								<option value="NU">Open</option>
								<option value="NU">Awarded</option>
							</select>
						</fieldset>
					</div>

					<div class="w-select">
						<fieldset class="form-group">
							<select class="selectpicker form-control">
								<option value="NU">Date (Descending)</option>
								<option value="NU">Date (Ascending)</option>
							</select>
						</fieldset>
					</div>

					<a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Filter</a>

					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search <?php echo $req_user_data['firstName'] ?> Bids ......">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container" style="padding-bottom: 50px">
	<div class="row">

		<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">		
				
			<div id="all-bid-container">
				
			</div>

		</div>

		<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" >
			<aside id="featured-bid-container">

			</aside>
		</div>

	</div>

</div>	
</div>


<a class="back-to-top" href="#">
	<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<?php include('includes/static/components/modals/bids.php') ?>

<?php include('includes/static/scripts.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>


<?php include('components/bids.php') ?>
<?php include('components/likes.php') ?>
<?php include('includes/app/bids.php') ?>

</body>
</html>
