<?php $openpage = 'faq'; require 'includes/dynamic/header.php'; $pretitle = 'Frequently asked questions';  ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class=" darkmode">

<style>
    body.darkmode{
        background-color: #2c304a
    }
    .heading-title,.title {
        color:#dee2e6
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


<!-- Stunning header -->

<div class="stunning-header bg-primary-opacity">

	
	<!-- Header Standard Landing  -->
	
	<div class="header--standard header--standard-landing " id="header--standard">
		<div class="container">
			<div class="header--standard-wrap">

				<a href="#" class="logo">
					<div class="img-wrap">
						<img src="assets/img/logo/white.png" alt="logo" class="web-only">
						<img src="assets/img/logo/white.png" alt="logo" class="logo-colored">
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
		
	<!-- ... end Header Standard Landing  -->
	<div class="header-spacer--standard"></div>

	<div class="stunning-header-content">
		<h1 class="stunning-header-title">Frequently Asked Questions</h1>
		<ul class="breadcrumbs">
			<li class="breadcrumbs-item">
				<a href="https://konstructapp.com">Home</a>
				<span class="icon breadcrumbs-custom">/</span>
			</li>
			<li class="breadcrumbs-item active">
				<span>FAQs</span>
			</li>
		</ul>
	</div>

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- End Stunning header -->

<section class="mb60">
	<div class="container">
		<div class="row">
			<div class="col col-xl-8 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
				<div id="accordion" role="tablist" aria-multiselectable="true" class="accordion-faqs">
					<div class="card">
						<div class="card-header" role="tab" id="headingOne">
							<h3 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									What's KonstructApp?
									<span class="icons-wrap">
										<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
										<svg class="olymp-accordion-close-icon"><use xlink:href="#olymp-accordion-close-icon"></use></svg>
									</span>
								</a>
							</h3>
						</div>
					</div>
					<div class="card">
						<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
							<p>
								Konstructapp is a cloud-based user-generated platform that enables quick, low-cost access to construction services leveraging data. 
							</p>
							<p>
								With KonstructApp, you can:
							</p>
							<p>
								✔ Quickly Pre-qualify: Post jobs to receive competitive bids, verify identity and technical competence. See listed service provider’s reviews and ratings.
							</p>
							<p>
								✔ Promote Servicer: Create Portfolio to show-case projects, services and 
							</p>
							<p>
								✔ Quick Loans: Access quick in-app loans for LPO financing or projects such as emergency home repairs, renovations, and spread repayments.
							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-header" role="tab" id="headingOne-1">
							<h3 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
									How do I use it?
									<span class="icons-wrap">
														<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
														<svg class="olymp-accordion-close-icon"><use xlink:href="#olymp-accordion-close-icon"></use></svg>
													</span>
								</a>
							</h3>
						</div>
					</div>
					<div class="card">
						<div id="collapseOne-1" class="collapse" role="tabpanel" aria-labelledby="headingOne-1">
							<p>
								Simply visit <a href='https://konstructapp.com'> konstructapp.com </a> to signup, customize and complete your personal profile, certification and professional experience. To get the best out of KonstructApp, you should constantly share your work, get your client to rate your services, verify your identity/certifications and continue to update your portfolio.
							</p>
				
						</div>
					</div>
					<div class="card">
						<div class="card-header" role="tab" id="headingOne-2">
							<h3 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
									 Do I need to pay for it?
									<span class="icons-wrap">
														<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
														<svg class="olymp-accordion-close-icon"><use xlink:href="#olymp-accordion-close-icon"></use></svg>
													</span>
								</a>
							</h3>
						</div>
					</div>
					<div class="card">
						<div id="collapseOne-2" class="collapse" role="tabpanel" aria-labelledby="headingOne-2">
							<p>
								Signup and usage is free, just dive in and start networking. However, you may choose to get more with paid subscriptions, in-app purchases, ads and more.
							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-header" role="tab" id="headingOne-3">
							<h3 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3" class="collapsed">
									Can I invite my contacts to join KonstructApp?
									<span class="icons-wrap">
														<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
														<svg class="olymp-accordion-close-icon"><use xlink:href="#olymp-accordion-close-icon"></use></svg>
													</span>
								</a>
							</h3>
						</div>
					</div>
					<div class="card">
						<div id="collapseOne-3" class="collapse" role="tabpanel" aria-labelledby="headingOne">
							<p>
								Yes you can invite your contacts to join and same time ask them to view your portfolio on KonstructApp.
							</p>

						</div>
					</div>
					<div class="card">
						<div class="card-header" role="tab" id="headingOne-4">
							<h3 class="mb-0">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-4" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
									I have other questions.
									<span class="icons-wrap">
														<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
														<svg class="olymp-accordion-close-icon"><use xlink:href="#olymp-accordion-close-icon"></use></svg>
													</span>
								</a>
							</h3>
						</div>
					</div>
					<div class="card">
						<div id="collapseOne-4" class="collapse" role="tabpanel" aria-labelledby="headingOne">
							<p>
								What's on your mind, <a href='contact'>contact us </a> . We would get back to you ASAP :))
							</p>

						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>


<!-- Footer Full Width -->

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

<script src="assets/js/libs/perfect-scrollbar.min.js"></script>
<script src="assets/js/libs/svgxuse.js"></script>
<script src="assets/js/libs/Headroom.js"></script>
<script src="assets/js/libs/material.min.js"></script>
<script src="assets/js/libs/bootstrap-select.js"></script>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="assets/js/main.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/libs-init/libs-init.js"></script>
<script defer src="assets/fonts/fontawesome-all.js"></script>

<script src="assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- SVG icons loader -->
<script src="assets/js/svg-loader.js"></script>
<!-- ------------------ -->

</body>
</html>