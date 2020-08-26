<!DOCTYPE html>
<html lang="en">
<?php include('includes/static/headcontent.php') ?>
<meta http-equiv="Refresh" content="1000; URL=https://app.konstructapp.com/">
<body class="body-bg-white darkmode">
	<style type="text/css">
		#offline-icon{
			width: 400px !important;
			height: auto;
			fill:#9A9FBF !important
		}
		.heading-text{
			font-size: 20px;
		}
		.crumina-heading{
			margin-top: 70px;

		}
		@media (max-width: 720px){
			.crumina-heading{
				margin-top: 0px;
			}
			#offline-icon{
				max-width: 85% !important;
				height:200px !important;
			}		
			.heading-text{
				font-size: 14px;
			}	
		}
	</style>

<section class="page-500-content medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">

				<svg xmlns="http://www.w3.org/2000/svg" id='offline-icon' style="" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px"><title>no internet connection detected</title><path d="M93.25,51.11a21.22,21.22,0,0,1-14.18,20L31.43,23.49a20.78,20.78,0,0,1,33.85,7.45A21.23,21.23,0,0,1,93.25,51.11ZM27.74,28.29L22.42,23l-4.24,4.24,7.3,7.3a20.59,20.59,0,0,0-.37,3.88c-0.44,0-.88-0.07-1.34-0.07a17,17,0,0,0,0,34H63.33l10,10,4.25-4.25-5.75-5.75Z"/></svg>
			</div>
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="h1 heading-title">An error occured!</h2>
					<p class="heading-text color-white">
						It's not you, It's us. we are working on fixing this, if the problem persists, send us a mail to: <a href="mailto:support@konstructapp.com" target="_blank">support@konstructapp.com</a>
					</p>
					<a href="./" class="btn btn-primary btn-lg error-previous-page">Return to home</a>
				</div>
				
			</div>
		</div>
	</div>
</section>


<!-- JS Scripts -->
<?php include('includes/static/scripts.php') ?>

</body>
</html>