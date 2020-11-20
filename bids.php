<?php 
	$page_name = 'Portfolio';
	 require 'includes/dynamic/header.php';
	 $pretitle = 'Bids'; 
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

	.container .title{
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

	<div class="container">
		<div class="h5 title">All bids</div>		
		<div class="loader-activity">
		  <div class="indeterminate"></div>
		</div>
		<div id="all-bid-container">
			<div class="row all-bids">
				
			</div>			
		</div>
		<a id="load-more-bids" href="#load-more" class="btn btn-control btn-more no-ajaxy">
			<svg class="olymp-three-dots-icon">
				<use xlink:href="#olymp-three-dots-icon"></use>
			</svg>
		</a>		
	</div>
	
</div>




<?php include('includes/static/components/modals/bids.php') ?>

<?php include('includes/static/scripts.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>

<?php include('models/bids.php') ?>
<?php include('models/likes.php') ?>

<!-- Portfolio actions -->
<?php include('includes/app/bids_page.php') ?>

</body>
</html>
