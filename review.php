<?php $openpage = 'review'; require 'includes/dynamic/header.php'; $pretitle = 'Make review';  ?>

<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class=" darkmode">
	<style>

	body.darkmode{
		background-color: #2a2c48
	}
	.heading-title,.title {
		color:#dee2e6
	}
	.socials--round .social-item{
		width: 36px;
		height:36px;
		font-size:15px;
	}

	.darkmode #footer{
		background-color:#2a2c48
	}

	.darkmode .sub-footer-copyright{
		border-top:0px
	}	
		.w-list a,.footer p{
		font-size: 16px;
		color: #dee2e6
	}
	.footer .title{
		font-size: 24px;
	}

	#primary_content .post-thumb img{
		width : 100%;
		margin:0px auto;
		height:500px;
		object-fit:cover
	}

	</style>

<div class="header--standard header--standard-landing " id="header--standard">
	<div class="container">
		<div class="header--standard-wrap">

			<a href="#" class="logo">
				<div class="img-wrap">
					<img src="assets/img/logo/transparent.png" alt="logo" class="web-only">
					<img src="assets/img/logo/transparent.png" alt="logo" class="logo-colored">
				</div>
			</a>

			<a href="#" class="open-responsive-menu js-open-responsive-menu">
				<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>
			</a>

			<div class="nav nav-pills  header-menu">
				<div class="mCustomScrollbar">
					<ul>
						<li class="nav-item">
							<a href="https://konstructapp.com" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">About</a>
						</li>
						<li class="nav-item">
							<a href="./contact" class="nav-link">Contact</a>
						</li>
						<li class="nav-item">
							<a href="https://konstructapp.com/business" class="nav-link">Business</a>
						</li>
						<li class="nav-item">
							<a href="./" class="nav-link">Get Started</a>
						</li>
						<li class="close-responsive-menu js-close-responsive-menu">
							<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
						</li>
						<li class="nav-item js-expanded-menu">
							<a href="#" class="nav-link">
								<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>
								<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="header-spacer header-spacer-large"></div>

<section class=' medium-padding80 first-section'  style='background:#131417'>
	<div class="container" >
		<div class="row mt50" id='absolute_root'>
			
			<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12" id='primary_content'>

			</div>

			<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" id='secondary_content'>

			</div>

		</div>

	</div>
</section>

<div class="footer footer-full-width" id="footer">
	<div class="container">
		<div class="row">
			<div class="col col-lg-2 col-md-4 col-sm-12 col-12">

				
				<!-- Widget About -->
				
				<div class="widget w-about">
				
					<a href="https://konstructapp.com" class="logo">
						<div class="img-wrap">
							<img src="assets/img/logo/transparent.png" style='width:100px' alt="KonstructApp">
						</div>
					</a>
				</div>
				
				<!-- ... end Widget About -->

			</div>

			<div class="col col-lg-3 col-md-4 col-sm-12 col-12">

				
				<!-- Widget List -->
				
				<div class="widget w-list">
					<h6 class="title">Company.</h6>
					<ul>					
						<li>
							<a href="./about">About Us</a>
						</li>
						<li>
							<a href="./contact">Contact Us</a>
						</li>
						<li>
							<a href="https://konstructapp.com/how-it-works">How it works</a>
						</li>
					</ul>
				</div>
				
				<!-- ... end Widget List -->

			</div>
			<div class="col col-lg-3 col-md-4 col-sm-12 col-12">

				
				<div class="widget w-list">
					<h6 class="title">KonstructApp</h6>
					<ul>
						<li>
							<a href="terms">User Agreement</a>
						</li>
						<li>
							<a href="./policy">Privacy Policy</a>
						</li>
						<li>
							<a href="faq">Frequently asked question</a>
						</li>
					</ul>
				</div>

			</div>

            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
					<h6 class="title">Quick Line.</h6>
                    <p>Write us a line at <a href="mailto:info@konstructapp.com">info@konstructapp.com</a>
                    or reach out to us on our social handles</p>
                    <ul class="socials">
						<li>
							<a href="https://twitter.com/KonstructApp" target='_blank'>
								<i class="fab fa-twitter-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://web.facebook.com/KonstructApp/" target='_blank'>
								<i class="fab fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://www.linkedin.com/company/konstructapp" target="_blank">
								<i class="fab fa-linkedin" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
            </div>

			<div class="col col-lg-12 col-md-12 col-sm-12 col-12">

				
				<!-- SUB Footer -->
				
				<div class="sub-footer-copyright">
					<span>
						Copyright <a href="https://konstructapp.com">KonstructApp</a> All Rights Reserved <?php echo date('Y')?>
					</span>
				</div>
				
				<!-- ... end SUB Footer -->

			</div>
		</div>
	</div>
</div>



<?php include('includes/static/components/modals/portfolio.php') ?>

<?php include('includes/static/scripts.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha256-+BEKmIvQ6IsL8sHcvidtDrNOdZO3C9LtFPtF2H0dOHI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js" integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>

<?php include('models/portfolio.php') ?>
<?php include('models/likes.php') ?>

<?php include('includes/app/client_review.php'); ?>

</body>
</html>