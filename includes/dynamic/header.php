<?php
session_name('KONSTRUCTAPP');
session_start();

//starts a session for all pages

//inherits all from functions.php where all my functions lies
require_once 'functions.php';

$devUrl = prodArena('test');
$__ver = 5; // for styles and scripts

date_default_timezone_set("Africa/Lagos");

$page = isset($page_name) ? $page_name : "anonymous";

// social media tag predefine 

$og_image = 'https://res.cloudinary.com/konstructapp/image/upload/v1597157743/logo/app_muqoyt_tqzyw5.png'; 
$og_title = 'KonstructApp | Demand And Supply Starts Here'; 
$og_description = 'Quick, low-cost access to Construction Services & Project Financing anytime, anywhere.' ;

$complete_profile = true;


$requested_page = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$requested_page = str_replace('.php', '', $requested_page);
$requested_page = str_replace('=', '_sp_61_', $requested_page);
$requested_page = str_replace('?', '_sp_63_', $requested_page);

if(!isset($authpage) && !isset($openpage) && !isset($_COOKIE['_id'])){

	// allow view of some pages if not registered
	
	if ( (isset($page_mode) && $page_mode == 'user' && isset($_GET['id'])) || ($page_name == 'Bids' && isset($_GET['id'])) || ($page_name == 'Portfolio' && isset($_GET['id'])) ){
		
	}
	else{
		header('location:signin?return_url='.$requested_page); // redirects to signin page if cookie for user does not exist
		exit();
	}
}

if (isset($_COOKIE['_id']) && isset($authpage)) {
	header('location:./'); // redirects to feed if user cookie exists and pops on an auth page
	exit();
}

if (isset($_COOKIE['_id']) && !isset($openpage)) { // avoid checking for user if in an open
	$user_prf  	= $devUrl ."/api/user/" . $_COOKIE['_id'];
		try{
			$get_user = requestUser($user_prf);
			if($get_user){
				$user_data = json_decode($get_user, true);
				$user_data = $user_data['data'];	

				// saved identity_verification status
				$identity_verified = $user_data['userIdentityVerify'];
				
				foreach ($user_data as $key => $value) {
					if (strlen($value) < 2) {
						$complete_profile = false;
					}
				}
				//TODO :  map cookie to check user decision concerning showing complete profile alert
			}
			else{
				throw new Exception("Error Processing Request", 1);
				exit();				
			}
		} 
		
		catch(Exception $e){
				$http_status = $e->getMessage();
				if ($http_status == 400){
					// user not found(self user does not exist);
					// ID in cookie does not match record, log out user
					 killSession();
					 exit();
				}
				else{
					// server error
					http_response_code(500);
					header('location:500');
				}
		}
		

}

if (isset($page_mode) && $page_mode == 'user') {
	if (isset($_GET['id'])) {
		$requested_user = sanitizeString($_GET['id']);
		$req_user_url 	= $devUrl ."/api/user/" . $requested_user;
				try{
					$req_user_data = requestUser($req_user_url);
					 if($req_user_data){
						save('req_id', $requested_user); // saves the reqested_user id in cookie
						$req_user_data = json_decode($req_user_data, true);
						$req_user_data = $req_user_data	['data'];
		
						// Check if I'm the user
				
						if(isset($user_data)){
							$self_user = $requested_user == $_COOKIE['_id'] ? true : false;               
						}
						else{
							$self_user = false;
						}
					 }	
				} 
				
				catch(Exception $e){
					$http_status = $e->getMessage();
					http_response_code(404);
					header('location:404');
					exit();
			
				}		

	}
	else{
		http_response_code(404);
		header('location:404');
		exit();
	}
}
