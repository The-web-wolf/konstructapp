<?php 
	$page_name = 'Portfolio';
	 require 'includes/dynamic/header.php';
	 $pretitle = 'Portfolio'; 
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
	.section .title.h5{
		color:white;
		padding-bottom: 10px
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
		<div class="h5 title">All Portfolio</div>		
		<div class="loader-activity">
		  <div class="indeterminate"></div>
		</div>
		<div id="all-portfolio-container">
			<div class="row all-portfolio">
				
			</div>			
		</div>
		<a id="load-more-portfolio" href="#load-more" class="btn btn-control btn-more no-ajaxy">
			<svg class="olymp-three-dots-icon">
				<use xlink:href="#olymp-three-dots-icon"></use>
			</svg>
		</a>		
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
<?php include('includes/app/portfolio_page.php') ?>

</body>
</html>
