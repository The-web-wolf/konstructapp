<?php
session_name('KONSTRUCTAPP');
session_start();

//starts a session for all pages

//inherits all from functions.php where all my functions lies
require_once 'functions.php';

$devUrl = prodArena('live');

date_default_timezone_set("Africa/Lagos");

$page = isset($page_name) ? $page_name : "anonymous";

if(!isset($authpage) && !isset($openpage) && !isset($_COOKIE['_id'])){
	header('location:signin'); // redirects to signin page if cookie for user does not exist
}

if (isset($_COOKIE['_id']) && isset($authpage)) {
	header('location:./'); // redirects to feed if user cookie exists and pops on an auth page
}

if (isset($_COOKIE['_id']) && !isset($openpage)) { // avoid checking for user if in an open
	save('_id', $_COOKIE['_id']); // refreshes cookie
	$user_prf  	= $devUrl ."/api/user/" . $_COOKIE['_id'];
    try{
        $get_user = requestUser($user_prf);
		if($get_user){
            $user_data = json_decode($get_user, true);
		    $user_data = $user_data['data'];		    
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
        
        		$self_user = $requested_user == $_COOKIE['_id'] ? true : false;               
           }	
        } 
        
        catch(Exception $e){
            $http_status = $e->getMessage();
            if ($http_status == 404){
                // user not found(wrong ID in url);
                http_response_code(404);
                header('location:404');
               exit();
            }
            else{
                // server error
                http_response_code(500);
                header('location:500');
                exit();
            }
        }		

	}
	else{
		http_response_code(404);
		header('location:404');
		exit();
	}
}
