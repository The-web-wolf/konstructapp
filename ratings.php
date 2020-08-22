<?php 
	$page_name = 'Ratings';
 	require 'includes/dynamic/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/static/headcontent.php') ?>

<style type="text/css">
	.section .title.h5{
		color:white;
		padding-bottom: 10px
	}
	.rate-item .star-rating{
		
	}
	.rate-item .text-rating{
		display: block;
		margin-top: 10px
	}
	
</style>

<body class="page-has-left-panels darkmode">

<!-- ... end Profile Settings Responsive -->

<?php include ('includes/static/sidebar-left.php'); ?>

<?php include('includes/static/header-top.php') ?>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>


<div id="root">

	<div class="container section">
		<div class="h5 title">My Ratings</div>		
		<div class="loader-activity">
		  <div class="indeterminate"></div>
		</div>
		<div id="all-portfolio-container">
			<div class="row all-portfolio">
				
			</div>			
		</div>
		<div class="ui-block">
				
				<div class="rate-item inline-items">
					<div class="author-thumb">
						<img src="assets/img/logo/app.png" style="width: 36px;border:1px solid rgba(255,255,255,.1)" alt="author">
					</div>
					<div class="rate-author-name">
						<a href="#" class="h6 author-name">Taye Olajide </a>
						<div class="rate-date">KonstructApp</div>
					</div>
					<a href="#" class="btn btn-sm bg-primary">View Project</a>
					<div class="star-rating">
						<ul class="rait-stars">
							<li>
								<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
							</li>
							<li>
								<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
							</li>

							<li>
								<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
							</li>
							<li>
								<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
							</li>
							<li>
								<i class="far fa-star star-icon" aria-hidden="true"></i>
							</li>
						</ul>						
					</div>
					<div class="text-rating">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.
					</div>
				</div>
							
		</div>		
	</div>
	
</div>


<a class="back-to-top" href="#">
	<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<?php include('includes/static/components/modals/portfolio.php') ?>

<?php include('includes/static/scripts.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>

<?php include('models/portfolio.php') ?>
<?php include('models/likes.php') ?>

<!-- Portfolio actions -->
<?php include('includes/app/ratings.php') ?>

</body>
</html>
