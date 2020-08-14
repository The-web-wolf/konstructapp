<?php $openpage = 'about'; require 'includes/dynamic/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class=" darkmode">

<style>
		:root {
			--section-divider-height: 60;
			--section-divider-width: 1920;
			--section-divider-ratio: calc(100% * var(--section-divider-height) / var(--section-divider-width));
		}

		.has-section-divider {
			position: relative;
			padding-bottom: var(--section-divider-ratio);
		}

		.section-divider {
			display: block;
			position: absolute;
			left: 0;
			bottom: -1px;
			width: 100%;
			height: auto;
		}


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
		.our-values h1{
			font-weight:800;
			color : #2a2c48;
		}
		.our-values h2{
			font-weight:400;
			color:#2a2c48
		}
		.our-values p{
			font-weight : 700;
			color:#2a2c48;
			font-family:cursive
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
<section class="medium-padding180 firstSection has-section-divider" >
	<div class="container">
		<div class="row">
      <div class="col col-xl-6 col-lg-6 ml-auto col-md-12 col-sm-12 col-12 align-right order-lg-2">
				<img src="assets/img/laptop.png" alt="screen" class="negative-margin-right150">
      </div>            
            
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 m-auto order-lg-1">
				<div class="crumina-module crumina-heading">
					<h1 class="heading-title c-white">About <span class='c-yellow'>Us</span></h1>
					<p class="heading-text" style='font-size:22px'>KonstructApp is a cloud-based Construction Networking Platform that helps with quick, low-cost access to Construction Services.
					</p>
				</div>
			</div>
		</div>

	</div>
	  <svg class="section-divider" viewBox="0 0 1920 60" aria-hidden="true"><path data-theme="soft-Secondary" fill="#F8AC09" d="M0,80.75H1920V45.833H1742.083a80.491,80.491,0,0,1,12.863-1.55c5.2-.26,17.24-.3,24.153-.24,26.69.222,54.377,1.094,79.341.96,19.287-.1,37.1-.372,53.573-.788L1920,44V34.078l-6.614.216-9.221.256c-6.252.147-12.7.249-19.265.32-13.132.14-26.739.15-40.206.125-26.935-.052-53.313-.247-74.22.168-14.367-1.4-32.582-.756-48.293-1.92-10.145.509-20.876.936-24.149,2.4-16.09-.266-37.611,2.532-50.019.479V34.684c-10.959-2.291-33.371-1.869-48.292-3.84-15.861-.512-26.214,1.347-39.671,1.92-7.032.178-5.941-.773-13.8-.481-40.751-.071-41.131,5.477-62.087,8.16-4.569-5.691-47.085-5.126-77.622-5.04-2.333-4.154-22.643-5.808-50.015-6.479-4.677-2.069-17.763-2.969-22.423-5.04-4.7-.175-3.474.477-6.9.479-11.485-2.964-40.092-2.449-63.813-3.36-23.312.6-29.4,3.589-55.195,3.841-8.3-3.783-56.5-4.561-84.513-3.361-.316-1.857-5.682-3.862-20.7-4.8-2.193-.137-6.78.122-10.352,0-16.331-.564-22.974-3.145-39.671-1.441-22.812-1.938-73.831-3.919-98.311-.719-4.315-2.2-15.369-3.462-20.7-5.521-23.122-.714-41.26-2.815-65.54-2.64-13.5,1-29.918,1.6-39.671,3.12.27,1.317-1.305,2.38-6.9,2.88-35.562-1.333-83.117-2.545-93.139,2.88-14.338-.314-8.341,2.2-22.423,1.92-5.17-.16-2.615-1.4-6.9-1.68-36.327-1.894-80.653-1.762-100.041,2.161-12.433-1.631-21.648-3.708-36.221-5.04-13.359.1-36.33-.325-48.293-1.2-32.483.6-42.463,4.331-53.471,7.92-25.227-.147-43.752,2.274-58.641,4.321-11.966-1.189-27.56-.426-39.67-1.441-19.514,1.284-40.772,2.328-53.468,4.561C301.584,31.04,294,33.888,283.7,37.8c-15.047-.774-19.865-3.5-36.221-4.321-10.453-.522-37.12-1.01-48.3-.959-10.184.046-17.188,1.062-27.595.719-18.244,2.022-31.516,4.736-46.57,7.2-3.726,2.091-9.8,3.854-17.5,5.39H4.061c-.734-1.281-1.512-2.592-2.344-3.949-.546-.09-1.13-.175-1.717-.26Z"/></svg>
</section>

<section class='medium-padding80 our-values' style='background-color:#F8AC09'>
	<div class='container' >
		<div class='row' style='height:150px'>
			<div class='col-xs-12 col-md-4'>
				<div>
					<h1 class='text-center'>Vision</h1>
					<p class='text-center'>Making professionalism accessible to all.</p>
				</div>
			</div>
			<div class='col-xs-12 col-md-4'>
				<div>
					<h1 class='text-center'>Goal</h1>
					<p class='text-center'>To create a scalable, profitable business while stimulating significant positive impact in Africa and emerging global markets.</p>
				</div>
			</div>
			<div class='col-xs-12 col-md-4'>
				<div>
					<h1 class='text-center'>Vision</h1>
					<p class='text-center'>Making professionalism accessible to all.</p>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-12 col-md-12'>
				<div style='margin-top:80px'>
					<h1 class='text-center'> Our Values</h1>
				</div>
			</div>
		</div>
		<div class='row' style='margin-top:50px'>
			<div class='col-xs-12 col-md-4'>
				<div>
					<h2 class='text-center'>Curiosity</h1>
					<p class='text-center'>Making professionalism accessible to all.</p>
				</div>
			</div>
			<div class='col-xs-12 col-md-4'>
				<div>
					<h2 class='text-center'>Team Work</h1>
					<p class='text-center'>To create a scalable, profitable business while stimulating significant positive impact in Africa and emerging global markets.</p>
				</div>
			</div>
			<div class='col-xs-12 col-md-4'>
				<div>
					<h2 class='text-center'>Growth</h1>
					<p class='text-center'>Making professionalism accessible to all.</p>
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
					<h2 class="heading-title">Meet Our Team</h2>
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
				
						<div class="teammembers-item-prof">CEO</div>
				
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
				
						<div class="teammembers-item-prof">CFO</div>
				
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
						<img class="main" src="assets/img/team/amaz.jpg" alt="Ahmad Abdulaziz">
						<img class="hover" src="assets/img/team/amaz.jpg" alt="Ahmad Abdulaziz">
					</div>
				
					<div class="teammember-content">
				
						<a class="h5 teammembers-item-name">Ahmad Abdulaziz</a>
				
						<div class="teammembers-item-prof">CTO</div>
				
						<ul class="socials socials--round">

							<li>
								<a href="https://twitter.com/devamaz" target='_blank' class="social-item twitter">
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
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
						<img class="main" src="assets/img/team/abeshi.jpg" alt="Abeshi Emmanuel">
						<img class="hover" src="assets/img/team/abeshi.jpg" alt="Abeshi Emmanuel">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Abeshi Emmanuel</a>
				
						<div class="teammembers-item-prof">ENGINEERING</div>
				
						<ul class="socials socials--round">
				
							<li>
								<a href="https://twitter.com/abeshi_emmanuel" target='_blank' class="social-item twitter">
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
						<img class="main" src="assets/img/team/new.png" alt="Growth">
						<img class="hover" src="assets/img/team/new.png" alt="Growth">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Growth</a>
				
						<div class="teammembers-item-prof">Join Us</div>
				
						<ul class="socials socials--round">
				
							<li>
								<a href="https://twitter.com/KonstructApp" target='_blank' class="social-item twitter">
                                    <span class='fab fa-twitter'></span>									
								</a>
							</li>
						</ul>
					</div>
				</div>
				
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
							<img src="assets/img/logo/transparent.png" style='width:100px' alt="KonstructApp">
						</div>
					</a>
				</div>
				
				<!-- ... end Widget About -->

			</div>

			<div class="col col-lg-2 col-md-4 col-sm-12 col-12">

				
				<!-- Widget List -->
				
				<div class="widget w-list">
					<h6 class="title">Company.</h6>
					<ul>
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
							<a href="terms">User Agreement</a>
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