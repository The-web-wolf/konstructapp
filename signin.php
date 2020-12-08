<?php $authpage = 'signin'; require 'includes/dynamic/header.php'; $pretitle = 'Signin or create account'; ?>
<!DOCTYPE html>
<html lang="en">

	<?php include('includes/static/headcontent.php') ?>

<body class="landing-page darkmode">

<style>
	.social-login{
		border-radius:15px;
		background-color:transparent;
		border:1px solid #f8ac09;
		color:#f8ac09
		
	}
	.social-login svg{
		position:absolute;
		right:10px;
	}

	.social-login:active,.social-login:hover{
		border:1px double #f8ac09
	}

</style>

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
							<a href="./about" class="nav-link">About Us</a>
						</li>
						<li class="nav-item">
							<a href="./contact" class="nav-link">Contact Us</a>
						</li>
						<li class="nav-item">
							<a href="./terms" class="nav-link">Terms & Conditions</a>
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

<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard "></div>
<div class="container">
	<div class="row display-flex">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			
			<!-- Login-Registration Form  -->
<!-- <img src="chatvia-dark.angular.themesbrand.com/assets/imar-4.jpg" style='height:400px;width:400px;' alt=""> -->
			
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
							<a href="#" id="googleSignin" class="btn btn-block btn-md social-login">
								<svg class="pass-SocialButton-icon pass-SocialButton-icon--google" width="16" height="16" viewBox="0 0 16 16"><defs><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-8a"></path><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-10c"></path><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-12e"></path><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-14g"></path></defs><g fill="none" fill-rule="evenodd"><g transform="translate(.08 .07)"><mask id="id-9b" fill="#dee2e6"><use xlink:href="#id-8a"></use></mask><path fill="#FBBC05" fill-rule="nonzero" mask="url(#id-9b)" d="M-.72 12.616V3.244L5.406 7.93z"></path></g><g transform="translate(.08 .07)"><mask id="id-11d" fill="#dee2e6"><use xlink:href="#id-10c"></use></mask><path fill="#EA4335" fill-rule="nonzero" mask="url(#id-11d)" d="M-.72 3.244L5.406 7.93 7.93 5.731l8.651-1.405V-.721H-.72z"></path></g><g transform="translate(.08 .07)"><mask id="id-13f" fill="#dee2e6"><use xlink:href="#id-12e"></use></mask><path fill="#34A853" fill-rule="nonzero" mask="url(#id-13f)" d="M-.72 12.616l10.813-8.29 2.848.36 3.64-5.407v17.302H-.72z"></path></g><g transform="translate(.08 .07)"><mask id="id-15h" fill="#dee2e6"><use xlink:href="#id-14g"></use></mask><path fill="#4285F4" fill-rule="nonzero" mask="url(#id-15h)" d="M16.581 16.581L5.407 7.931 3.965 6.848l12.616-3.605z"></path></g></g></svg>
									Login with  google
								</a>	

							<div class="or"></div>						
							<div class="row">
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">Your Phone number</label>
										<input class="form-control" placeholder="" type="tel" name="phoneNumber" required="">
									</div>
									<br>
									<div class="form-group label-floating">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password" name="password" required="" minlength='8'>
									</div>
									<br>
									<button type="submit" class="btn btn-lg btn-primary full-width">Login</button>
									<!-- <p class="web-only">Forgotten your password? <a href="#" data-toggle="modal" data-target="#restore-password-1" >Click here!</a> to set a new one</p> -->
			
	
									<p class="web-only">Don't have an account? <a href="#" class="custom-register-trigger">Click here!</a> to set up a new account! and experience Konstructapp</p>
		
								</div>
							</div>
						</form>
						<br>
						<!-- <div class="reset_password_btn">
							<a href="#" class="forgot mobile-only c-white"  data-toggle="modal" data-target="#restore-password-1">Forgot my Password</a>
							
						</div>						 -->
					</div>
					<div class="tab-pane" id="register" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Register</div>
						
						<form class="content" id="registerationForm" data-method="POST" data-action="<?=$devUrl?>/api/register" enctype="multipart/form-data">
									
							<a href="#" id="googleSignup" class="btn btn-block btn-md social-login">
								<svg class="pass-SocialButton-icon pass-SocialButton-icon--google" width="16" height="16" viewBox="0 0 16 16"><defs><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-8a"></path><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-10c"></path><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-12e"></path><path d="M15.32 6.488H7.93v3.064h4.254c-.397 1.947-2.055 3.064-4.254 3.064A4.677 4.677 0 0 1 3.244 7.93 4.677 4.677 0 0 1 7.93 3.244c1.118 0 2.127.397 2.92 1.046l2.307-2.307C11.751.757 9.949 0 7.93 0A7.907 7.907 0 0 0 0 7.93a7.907 7.907 0 0 0 7.93 7.93c3.965 0 7.57-2.883 7.57-7.93 0-.468-.072-.973-.18-1.442z" id="id-14g"></path></defs><g fill="none" fill-rule="evenodd"><g transform="translate(.08 .07)"><mask id="id-9b" fill="#dee2e6"><use xlink:href="#id-8a"></use></mask><path fill="#FBBC05" fill-rule="nonzero" mask="url(#id-9b)" d="M-.72 12.616V3.244L5.406 7.93z"></path></g><g transform="translate(.08 .07)"><mask id="id-11d" fill="#dee2e6"><use xlink:href="#id-10c"></use></mask><path fill="#EA4335" fill-rule="nonzero" mask="url(#id-11d)" d="M-.72 3.244L5.406 7.93 7.93 5.731l8.651-1.405V-.721H-.72z"></path></g><g transform="translate(.08 .07)"><mask id="id-13f" fill="#dee2e6"><use xlink:href="#id-12e"></use></mask><path fill="#34A853" fill-rule="nonzero" mask="url(#id-13f)" d="M-.72 12.616l10.813-8.29 2.848.36 3.64-5.407v17.302H-.72z"></path></g><g transform="translate(.08 .07)"><mask id="id-15h" fill="#dee2e6"><use xlink:href="#id-14g"></use></mask><path fill="#4285F4" fill-rule="nonzero" mask="url(#id-15h)" d="M16.581 16.581L5.407 7.931 3.965 6.848l12.616-3.605z"></path></g></g></svg>
								Register with  google
							</a>	

						<div class="or"></div>
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
										<input class="form-control" placeholder="" type="password" name="password" required="" minlength='8'>
									</div>
			
									<div class="remember">
										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" type="checkbox" required="">
												I accept the <a href="terms" style="display: inline;">Terms and Conditions</a>
											</label>
										</div>
									</div>
			
									<button type='submit' class="btn btn-primary btn-lg full-width">Complete Registration!</button>
								
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
</div>

<!-- ... end Window-popup Restore Password -->

<!-- ... end Window Popup Main Search -->

<script src="assets/js/libs/perfect-scrollbar.min.js"></script>
<script src="assets/js/libs/svgxuse.js"></script>
<script src="assets/js/libs/Headroom.js"></script>
<script src="assets/js/libs/material.min.js"></script>
<script src="assets/js/libs/bootstrap-select.js"></script>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="assets/js/main.min.js?ver=<?=$__ver?>"></script>
<script src="assets/js/app.min.js?ver=<?=$__ver?>"></script>
<script src="assets/js/libs-init/libs-init.js?ver=<?=$__ver?>"></script>
<script defer src="assets/fonts/fontawesome-all.js"></script>
<script src="https://apis.google.com/js/api:client.js"></script>

<script src="assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- SVG icons loader -->
<script src="assets/js/svg-loader.js"></script>
<!-- ------------------ -->
<script type='text/javascript' src='assets/js/app/login.js'></script>
</body>
</html>