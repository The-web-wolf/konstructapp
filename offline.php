<?php $pretitle = 'Offline'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php include('includes/static/headcontent.php') ?>
    
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

<!-- ... end Preloader -->
<section class="page-500-content medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">

				<svg xmlns="http://www.w3.org/2000/svg" id='offline-icon' style="" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px"><title>no internet connection detected</title><path d="M93.25,51.11a21.22,21.22,0,0,1-14.18,20L31.43,23.49a20.78,20.78,0,0,1,33.85,7.45A21.23,21.23,0,0,1,93.25,51.11ZM27.74,28.29L22.42,23l-4.24,4.24,7.3,7.3a20.59,20.59,0,0,0-.37,3.88c-0.44,0-.88-0.07-1.34-0.07a17,17,0,0,0,0,34H63.33l10,10,4.25-4.25-5.75-5.75Z"/></svg>
			</div>
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="h1 heading-title">Uh-oh!</h2>
					<p class="heading-text color-white">Sorry, KonstructApp requires an active internet connection. Kindly check your internet connection and try again
					</p>
					<a href="" id="reloadPage" class="btn btn-primary btn-lg">Try again</a>
				</div>
				
			</div>
		</div>
	</div>
</section>


<!-- JS Scripts -->

<!-- SVG icons loader -->
<script src="assets/js/svg-loader.js"></script>
<!-- /SVG icons loader -->

<script type="text/javascript">

	$('document').ready(function(){
		$('#hellopreloader').fadeOut('slow'); // remove preloader when page is ready
	});	
	$('#reloadPage').click(function(){
		$('#hellopreloader').fadeIn('fast');
		location.reload()
	})

	var simulateOffline = $('.simulate-offline');
	var simulateOfflinePage = $('.simulate-offline-page');
	var simulateOnline = $('.simulate-online');
	var detectedOnline = 'online-message-active'
	var detectedOffline = 'offline-message-active'

	if (!$('.offline-message').length) {
	  $('body').append('<p style="width:95%;margin:auto" class="offline-message ">No internet connection detected</p>');
	  $('body').append('<p style="width:95%;margin:auto" class="online-message ">You are back online. Welcome!</p>');
	}

	var onlineMessage = $('.online-message');
	var offlineMessage = $('.offline-message');
	var detectedOnline = 'online-message-active'
	var detectedOffline = 'offline-message-active'

	if (!$('.offline-message').length) {
	  $('body').append('<p style="width:95%;margin:auto" class="offline-message ">No internet connection detected</p>');
	  $('body').append('<p style="width:95%;margin:auto" class="online-message ">You are back online. Welcome!</p>');
	}

	function updateOnlineStatus(event) {
	  var condition = navigator.onLine ? "online" : "offline";
	  onlineMessage.addClass(detectedOnline);
	  offlineMessage.removeClass(detectedOffline);
	  // reload to destination when page goes online 
	  location.reload()	  
	}
	window.addEventListener('online', updateOnlineStatus);	
</script>
</body>
</html>
