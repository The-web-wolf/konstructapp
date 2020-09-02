<?php $openpage = 'review'; require 'includes/dynamic/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

    <style>

body.darkmode{
        background-color: #2a2c48
    }
    .heading-title,.title {
        color:#dee2e6
    }

    .crumina-teammembers-item .teammember-content .socials li a{
        color:white !important;
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

    @media(max-width:1024px){
        .firstSection{
            padding-top:100px
        }
        .negative-margin-right150 {
            margin-right: 0; 
            margin-bottom:30px
        }     
	}
	
		.w-list a,.footer p{
			font-size: 16px;
			color: #dee2e6
		}
		.footer .title{
			font-size: 24px;
		}

    
    </style>
<body class=" darkmode">


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

<section class=' medium-padding180 first-section'  style='background:#131417'>

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


<!-- ... end Footer Full Width -->

<script src="assets/js/libs/perfect-scrollbar.js"></script>
<script src="assets/js/libs/svgxuse.js"></script>
<script src="assets/js/libs/Headroom.js"></script>
<script src="assets/js/libs/material.min.js"></script>
<script src="assets/js/libs/bootstrap-select.js"></script>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/libs-init/libs-init.js"></script>
<script defer src="assets/fonts/fontawesome-all.js"></script>

<script src="assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- SVG icons loader -->
<script src="assets/js/svg-loader.js"></script>
<!-- ------------------ -->

</body>
</html>