<?php $authpage = 'about'; require 'includes/dynamic/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class=" darkmode">

<style>
    body.darkmode{
        background-color: #2a2c48
    }
    .heading-title,.title {
        color:#fff
    }
    .teammembers-thumb{
        border-radius:5px
    }
    .teammembers-thumb img{
        width:370px;
        height:466px;
        object-fit:cover;
    }
    .teammembers-item-prof{
        text-transform:uppercase
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
							<a href="./policy" class="nav-link">Privacy Policy</a>
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
						<!-- <li class="menu-search-item">
							<a href="#" class="nav-link" data-toggle="modal" data-target="#main-popup-search">
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="medium-padding180 firstSection" style='background-color:#34374b'>
	<div class="container">
		<div class="row">
            <div class="col col-xl-6 col-lg-6 ml-auto col-md-12 col-sm-12 col-12 align-right order-lg-2">
				<img src="assets/img/laptop.png" alt="screen" class="negative-margin-right150">
            </div>            
            
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto order-lg-1">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title c-white">About Us</h2>
					<p class="heading-text">KonstructApp is a cloud-based Construction Networking Platform that helps with quick, low-cost access to Construction Services. It leverages data, social selling and social proof to address Quackery, Marketing barriers, and Financial access in the Construction Industry. Individuals, Private and Public Business use the platform to achieve better value for money and smart business growth.
					</p>
				</div>
			</div>
		</div>

	</div>
</section>

<section class="medium-padding80">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 m-auto">
				<div class="crumina-module crumina-heading align-center">
					<h2 class="heading-title">Meet our Team</h2>
					<p class="heading-text">On an adventure, learning new things daily.
					</p>
				</div>
			</div>
		</div>

		<div class="row teammembers-wrap">
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb" >
						<img class="main" src="assets/img/team/ceo.jpg" alt="Taye Olajide">
						<img class="hover" src="assets/img/team/ceo.jpg" alt="Taye Olajide">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Taye Olajide</a>
				
						<div class="teammembers-item-prof">KONSTRUCTAPP CEO</div>
				
						<ul class="socials socials--round">
							<li>
								<a href="" class="social-item facebook">
									<span class='fab fa-facebook'></span>
								</a>
							</li>
				
							<li>
								<a href="" class="social-item twitter">
                                    <span class='fab fa-twitter'></span>									
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
						<img class="main" src="assets/img/team/vincent.png" alt="Vincent Ajie">
						<img class="hover" src="assets/img/team/vincent.png" alt="Vincent Ajie">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Vincent Ajie</a>
				
						<div class="teammembers-item-prof">Chief F Officer</div>
				
						<ul class="socials socials--round">
							<li>
								<a href="" class="social-item facebook">
									<span class='fab fa-facebook'></span>
								</a>
							</li>
				
							<li>
								<a href="" class="social-item twitter">
                                    <span class='fab fa-twitter'></span>									
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
						<img class="main" src="assets/img/team/amaz.jpg" alt="team member">
						<img class="hover" src="assets/img/team/amaz.jpg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Ahmad Abdulaziz</a>
				
						<div class="teammembers-item-prof">Chief Technology Officer</div>
				
						<ul class="socials socials--round">
							<li>
								<a href="" class="social-item facebook">
									<span class='fab fa-facebook'></span>
								</a>
							</li>
				
							<li>
								<a href="" class="social-item twitter">
                                    <span class='fab fa-twitter'></span>									
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
						<img class="main" src="assets/img/team/Odu.jpg" alt="Odu Udo">
						<img class="hover" src="assets/img/team/Odu.jpg" alt="Odu Udo">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Odu Udo</a>
				
						<div class="teammembers-item-prof">OPERATIONS</div>
						<ul class="socials socials--round">
							<li>
								<a href="" class="social-item facebook">
									<span class='fab fa-facebook'></span>
								</a>
							</li>
				
							<li>
								<a href="" class="social-item twitter">
                                    <span class='fab fa-twitter'></span>									
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<!-- <div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
						<img class="main" src="assets/img/team/abeshi.png" alt="team member">
						<img class="hover" src="assets/img/team/abeshi.png" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Abeshi Emmanuel</a>
				
						<div class="teammembers-item-prof">Lead Developer</div>
				
						<ul class="socials socials--round">
							<li>
								<a href="" class="social-item facebook">
									<span class='fab fa-facebook'></span>
								</a>
							</li>
				
							<li>
								<a href="" class="social-item twitter">
                                    <span class='fab fa-twitter'></span>									
								</a>
							</li>
						</ul>
					</div>
				</div>
				 -->
				<!-- ... end Teammember Item  -->

			</div>
		</div>

	</div>
</section>



<!-- Block Action  -->

<div class="container mb60">
	<div class="block-action bg-section4 background-cover">
		<div class="row">
			<div class="col col-xl-5 col-lg-12 col-md-12 col-sm-12  mr-auto">
				<div class="crumina-module crumina-heading custom-color c-white mb-0">
					<h2 class="heading-title">Do you wanna join our team?</h2>
					<p class="heading-text"><a href="#">Click here</a> to check out all of our available positions. If you don’t see
						anything that fits you, keep an eye open!
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Footer Full Width -->

<div class="footer footer-full-width" id="footer">
	<div class="container">
		<div class="row">
			<div class="col col-lg-4 col-md-4 col-sm-12 col-12">

				
				<!-- Widget About -->
				
				<div class="widget w-about">
				
					<a href="https://konstructapp.com" class="logo">
						<div class="img-wrap">
							<img src="assets/img/logo/white.png" style='width:100px' alt="KonstructApp">
						</div>
					</a>
					<p>Quick, low-cost access to Construction Services & Project Financing anytime, anywhere.</p>
				</div>
				
				<!-- ... end Widget About -->

			</div>

			<div class="col col-lg-2 col-md-4 col-sm-12 col-12">

				
				<!-- Widget List -->
				
				<div class="widget w-list">
					<h6 class="title">Company.</h6>
					<ul>
						<li>
							<a href="https://konstructapp.com">Landing</a>
						</li>
						<li>
							<a href="./about">About</a>
						</li>
						<li>
							<a href="./about#team">Team</a>
						</li>
						<li>
							<a href="https://konstructapp.com/how-it-works">How it works</a>
						</li>
					</ul>
				</div>
				
				<!-- ... end Widget List -->

			</div>
			<div class="col col-lg-2 col-md-4 col-sm-12 col-12">

				
				<div class="widget w-list">
					<h6 class="title">KonstructApp</h6>
					<ul>
						<li>
							<a href="./policy">Privacy Policy</a>
						</li>
						<li>
							<a href="#">Help and Support</a>
						</li>
						<li>
							<a href="terms">Terms Of Use</a>
						</li>
						<li>
							<a href="faq">Frequently asked question</a>
						</li>
					</ul>
				</div>

			</div>

            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
					<h6 class="title">Contact Us.</h6>
                    <p>Write us a line at <a href="mailto:info@konstructapp.com">info@konstructapp.com</a>
                    or reach out to us on our social handles</p>
                    <ul class="socials">
						<li>
							<a href="https://twitter.com/KonstructApp" target='_blank'>
								<i class="fab fa-facebook-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://web.facebook.com/KonstructApp/" target='_blank'>
								<i class="fab fa-twitter" aria-hidden="true"></i>
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