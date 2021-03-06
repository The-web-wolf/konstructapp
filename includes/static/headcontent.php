<head>
	<title><?php echo $pretitle ? $pretitle : '' ?> | KonstructApp | Demand And Supply Start  Here</title>
	<meta name='title' content='<?=$og_title?>'>
	<meta name='description' content='<?=$og_description?>'>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="preconnect" href="https://api.konstructapp.com" crossorigin>
    <link rel="dns-prefetch" href="https://api.konstructapp.com/">
	<!-- Social media -->
    <meta property="og:image" content="<?=$og_image?>">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo("https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']); ?>"/>
    <meta property="og:title" content="<?=$og_title?>" />
    <meta property="og:description" content="<?=$og_description?>" />

	<!-- Main Font -->
	<script src="assets/js/libs/webfontloader.min.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin'],
			}
		});
	</script>	
	<!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content='default'>

	<meta name="apple-mobile-web-app-title" content="KonstructApp">
	<meta name="application-name" content="KonstructApp"/>
	<meta name="theme-color" content="#2c304a">

	<link rel="shortcut icon" type="image/png" href="./icons/favicon-128.png" />
	<link rel="icon" type="image/png" href="./icons/favicon-128.png" />

	<link rel="manifest" href="manifest.webmanifest">
	<script src="https://unpkg.com/pwacompat" crossorigin="anonymous"></script>

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" type="text/css" href="assets/Bootstrap/dist/css/bootstrap.css">

	<script src="assets/js/jQuery/jquery-3.4.1.js"></script>

	<!-- Main Styles CSS  versioned-->
	<link rel="stylesheet" type="text/css" href="assets/css/main.min.css?ver=<?=$__ver?>">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.min.css?ver=<?=$__ver?>">


	<link rel="stylesheet" type="text/css" href="assets/css/fonts.min.css">
	<link defer rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" integrity="sha256-cZDeXQ7c9XipzTtDgc7DML5txS3AkSj0sjGvWcdhfns=" crossorigin="anonymous" />

	<style type="text/css">
		body{
			max-width: 100%;
			width: 100%;
		}
	</style>

	<script>
	function initFreshChat() {
		window.fcWidget.init({
		token: "d50d2a82-0bc7-4d68-98f4-6bb2ed31ecdc",
		host: "https://wchat.freshchat.com"
		});

		window.fcWidget.setExternalId(Cookies.get('_id'));

		// To set user name
		window.fcWidget.user.setFirstName(localStorage.getItem('firstName') + ' ' +  localStorage.getItem('lastName'));

		// To set user email
		window.fcWidget.user.setEmail(localStorage.getItem('email'));	
	}
	function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))
	
	}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
	</script>

	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '643940446251253'); 
	fbq('track', 'PageView');
	</script>
	<noscript>
	<img height="1" width="1" 
	src="https://www.facebook.com/tr?id=643940446251253&ev=PageView
	&noscript=1"/>
	</noscript>	

</head>


<!-- Place preloader outside the body -->

<!-- Loader for page load -->
<div class="fullpageloader" id="hellopreloader">
	<div class="preloader">
		<div class="loader-activity"><div class="indeterminate"></div></div>
	</div>
</div>

<!-- Loader for actions -->
<div class="fullpageloader" id="requestpreloader" >
	<div class="preloader">
		<div class="loader-activity"><div class="indeterminate"></div></div>
	</div>
</div>