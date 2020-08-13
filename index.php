<?php $page_name = 'index'; require 'includes/dynamic/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/static/headcontent.php') ?>

<link rel="stylesheet" href="assets/css/owl-carousel.min.css" />

<body class="page-has-left-panels darkmode">

	<?php include('includes/static/sidebar-left.php') ?>

	<?php include('includes/static/header-top.php') ?>

	<div class="header-spacer"></div>

	<div class="container">
		<div class="ui-block">
		
			<!-- News Feed Form  -->
			
			<div class="news-feed-form">
				<ul class="nav nav-tabs" style="display: flex !important;flex-wrap: nowrap;">
					<li class="nav-item">
						<a class="nav-link inline-items no-ajaxy" href="#create-status" id='status-container-toggle'>
			
							<svg class="olymp-status-icon"><use xlink:href="#olymp-status-icon"></use></svg>
			
							<span>Update Status</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link inline-items no-ajaxy" href="#create-portfolio" data-toggle="modal" data-target="#create-new-portfolio">
			
							<svg class="olymp-multimedia-icon"><use xlink:href="#olymp-trophy-icon"></use></svg>
			
							<span>Add Portfolio</span>
						</a>
					</li>
			
					<li class="nav-item">
						<a class="nav-link inline-items no-ajaxy" href="#create-bid" data-toggle="modal" data-target="#create-new-bid">
							<svg class="olymp-blog-icon"><use xlink:href="#olymp-blog-icon"></use></svg>
			
							<span>Create Bid</span>
						</a>
					</li>
				</ul>
				<div id="status-container" >
					<form class="status-form" id="new-status" data-method='POST' data-action="<?=$devUrl?>/api/status">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Share what you are thinking here...</label>
							<textarea class="form-control " placeholder="" name="statusText" minlength="10" style="border-left: none;border-right: none"></textarea>
							<input type="hidden" name="portfolio">
							<span id="imageUploadStatus"></span>
							<span id="taggedPortfolio"></span>
						</div>
						<div class="row">	
							<div class="col-8 col-xs-4">
								<div class="add-options-message">
									<a class="options-message image-upload no-ajaxy" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO(S)" href="#photo-upload" href="#upload-images">
										<input type="file" name="pictures" multiple="" style="position: absolute;height: 22px;width: 22px;top: 0px;left: 0px;z-index: 100;opacity: 0">
										<svg class="olymp-multimedia-icon" data-toggle="modal" data-target="#status-image-upload"><use xlink:href="#olymp-multimedia-icon"></use></svg>
									</a>								
									<a href="#s" class="options-message choose-portfolio-tag no-ajaxy" data-toggle="tooltip" data-placement="top"   data-original-title="TAG PORTFOLIO" id="status_tag_portfolio">									
										<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
									</a>
								
								</div>

							</div>
							<div class="col-4 col-xs-4">
								<div style="padding-top: 18px">	<button type="submit" class="btn btn-primary btn-md-2" id="createStatus">Post</button> </div>
							</div>
						</div>				
					</form>				
				</div>				
			</div>
			
			<!-- ... end News Feed Form  -->			
		</div>		
	</div>

	<div class="sections container">

		<section id="users-section">
			<!-- <div class="ui-block-title no-border" style="padding-left: 0px">
				<div class="h5 title">Featured Users</div>
				<div class="align-right">
						<a href="users" class="more" >See all &nbsp <span class="fa fa-long-arrow-right">	</span></a>
					</div>			
			</div> -->
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>			
			<div class="owl-carousel ui-blocks">
			
			</div>	
		</section>		
	
		<section id="bids-section">
			<div class="ui-block-title no-border">
				<div class="h5 title">Bids</div>
					<div class="align-right">
						<a href="bids" class="more" >See all &nbsp <span class="fa fa-long-arrow-right">	</span></a>
					</div>			
			</div>
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>
			<div class="owl-carousel ui-blocks">
	
			</div>	
		</section>

		<section id="portfolio-section">
			<div class="ui-block-title no-border" style="padding-left: 0px">
				<div class="h5 title">Portfolio</div>
					<div class="align-right">
						<a href="portfolio" class="more" >See all &nbsp <span class="fa fa-long-arrow-right">	</span></a>
					</div>			
			</div>
			<div class="loader-activity">
			  <div class="indeterminate"></div>
			</div>			
			<div class="owl-carousel ui-blocks">
			
			</div>	
		</section>

	</div>

	<div class='row'>
		<div class='col-md-8 col-lg-6 mr-auto ml-auto'>
			<div class="container">
				<div id="newsfeed-items-grid">
				</div>	
				<a id="load-more-feed-status" href="#load-more" class="btn btn-control btn-more no-ajaxy">
					<svg class="olymp-three-dots-icon">
						<use xlink:href="#olymp-three-dots-icon"></use>
					</svg>
				</a>		
			</div>
		</div>
	</div>

	<a class="back-to-top" href="#">
		<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
	</a>

	<!-- Load portfolio and bids files -->

	<?php include('includes/static/components/modals/bids.php') ?>
	<?php include('includes/static/components/modals/status.php') ?>
	<?php include('includes/static/components/modals/portfolio.php') ?>

	<!-- JS Scripts -->
	<?php include('includes/static/scripts.php') ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
	<script src="assets/js/freewall.js"></script>


	<?php include('models/bids.php') ?>
	<?php include('models/portfolio.php') ?>
	<?php include('models/status.php') ?>
	<?php include('models/likes.php') ?>
	<?php include('includes/app/feeds.php') ?>

	<script type="text/javascript">		

	$(document).ready(function(){
		writeFeed();
		/*=========*/
		createStatusHandler();
		createPortfolioHandler()
		createBidHandler()
	})
	</script>

</body>
</html>