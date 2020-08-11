<?php $authpage = 'signin'; require 'includes/dynamic/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class="landing-page darkmode">

<div class="content-bg-wrap"></div>

<!-- ... end Header Standard Landing  -->

<!-- Header Standard Landing  -->

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
							<a href="#" class="nav-link">About Us</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Terms & Conditions</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Privacy Policy</a>
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
						<li class="menu-search-item">
							<a href="#" class="nav-link" data-toggle="modal" data-target="#main-popup-search">
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard "></div>

<div class="container">
	<div class="row display-flex">
		<!-- <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="landing-content web-only">
				<h1>CONSTRUCTION NETWORKING</h1>
				<p style="font-size: 16px">Quick, low-cost access to construction jobs and services.
				</p>
				<a href="#" class="btn btn-md btn-border c-white">Create A Corporate Account!</a>
			</div>
		</div> -->

		<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
			
			<!-- Login-Registration Form  -->
			
			<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active no-ajaxy signin-trigger" data-toggle="tab" href="#signin" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="#olymp-register-icon"></use></svg>
							<span class="h4 mobile-only">Login</span>
						</a>
					</li>					
					<li class="nav-item">
						<a class="nav-link no-ajaxy register-trigger" data-toggle="tab" href="#register" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="#olymp-login-icon"></use></svg>
							<span class="h4 mobile-only">Sign Up</span>
						</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
			
					<div class="tab-pane active" id="signin" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login to your Account</div>
						<form class="content" id="loginForm" data-method="POST" data-action="<?=$devUrl?>/api/login">
							<div class="row">
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Your Phone number</label>
										<input class="form-control" placeholder="" type="tel" name="phoneNumber" required="">
									</div>
									<br>
									<div class="form-group label-floating">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password" name="password" required="">
									</div>
									<br>
									<button type="submit" class="btn btn-lg btn-primary full-width">Login</button>
									<p class="web-only">Forgotten your password? <a href="#" data-toggle="modal" data-target="#restore-password-1" >Click here!</a> to set a new one</p>
			
									<div class="or"></div>
									<span>Sign in with</span>
	
									<a href="#null" class="btn btn-xs bg-google "><i class="fab fa-google" aria-hidden="true"></i></a>
									<br>
									<p class="web-only">Don't have an account? <a href="#" class="custom-register-trigger">Click here!</a> to set up a new new account! and experience Konstructapp</p>
		
								</div>
							</div>
						</form>
						<br>
						<div class="reset_password_btn">
							<a href="#" class="forgot mobile-only"  data-toggle="modal" data-target="#restore-password-1">Forgot my Password</a>
							
						</div>						
					</div>
					<div class="tab-pane" id="register" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register</div>
						<form class="content" id="registerationForm" data-method="POST" data-action="<?=$devUrl?>/api/register" enctype="multipart/form-data">
							<div class="row">
								<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">First Name</label>
										<input class="form-control" placeholder="" type="text" name="firstName" required="">
									</div>
								</div>
								<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input class="form-control" placeholder="" type="text" name="lastName" required="">
									</div>
								</div>
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Your Email</label>
										<input class="form-control" placeholder="" type="email" name="email" required="" >
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Phone number</label>
										<input class="form-control" placeholder="" type="tel" name="phoneNumber" required="">
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password" name="password" required="">
									</div>
			
									<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox" required="">
												I accept the <a href="#" style="display: inline;">Terms and Conditions</a>
											</label>
										</div>
									</div>
			
									<button type='submit' class="btn btn-primary btn-lg full-width">Complete Registration!</a>

								</div>
							</div>
						</form>	
					</div>					
				</div>
			</div>
			
			<!-- ... end Login-Registration Form  -->		
		</div>
	</div>
</div>

<!-- Window-popup Restore Password -->

<div class="modal fade" id="restore-password-1" tabindex="-1" role="dialog" aria-labelledby="restore-password-1" aria-hidden="true">
	<div class="modal-dialog window-popup restore-password-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Restore your Password</h6>
			</div>

			<div class="modal-body">
				<form class="content no-ajaxy" id="resetForm1" method="POST" action="controllers/reset">
					<p>Enter your email and click the send code button. You’ll receive a code in your email.
					</p>
					<div class="form-group label-floating">
						<label class="control-label">Your Email</label>
						<input class="form-control" placeholder="" type="email" value="user@example.com">
					</div>
					<button class="btn btn-secondary btn-lg full-width">Send me the Code</button>
					
				</form>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="restore-password-2" tabindex="-1" role="dialog" aria-labelledby="restore-password-2" aria-hidden="true">
	<div class="modal-dialog window-popup restore-password-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Restore your Password</h6>
			</div>

			<div class="modal-body">
				<form class="content no-ajaxy" id="resetForm2" method="POST" action="controllers/reset">
					<p>Enter the code sent to your email and a new password to your account</p>
					<div class="form-group label-floating">
						<label class="control-label">Enter the Code</label>
						<input class="form-control" placeholder="" type="text" value="">
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Your New Password</label>
						<input class="form-control" placeholder="" type="password" value="olympus">
					</div>
					<button class="btn btn-primary btn-lg full-width">Change your Password!</button>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Restore Password -->

<!-- ... end Window Popup Main Search -->

<script src="assets/js/libs/perfect-scrollbar.js"></script>
<script src="assets/js/libs/svgxuse.js"></script>
<script src="assets/js/libs/Headroom.js"></script>
<script src="assets/js/libs/material.min.js"></script>
<script src="assets/js/libs/bootstrap-select.js"></script>

<script src="assets/js/main.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/libs-init/libs-init.js"></script>
<script defer src="assets/fonts/fontawesome-all.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

<script src="assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- SVG icons loader -->
<script src="assets/js/svg-loader.js"></script>
<!-- ------------------ -->

<script type="text/javascript">
$(function(){
	$('.custom-signin-trigger').click(function(e){
		e.preventDefault()
		$('.signin-trigger').click()
	})

	$('.custom-register-trigger').click(function(e){
		e.preventDefault()
		$('.register-trigger').click()
	})

	let loginForm = $('#loginForm');
	let registerForm = $('#registerationForm')

	$(registerForm).submit(function(ev){
		ev.preventDefault()
		submitForm('registerationForm', 'userFx')
	})

	$(loginForm).submit(function(ev){
		ev.preventDefault()
		submitForm('loginForm', 'userFx')
	})

	if ($(window).width() > 960) {
		$('.js-expanded-menu a').trigger('click')
	}
})	
</script>

</body>
</html>