<?php
$authpage = 'googleauth';
require_once '../includes/dynamic/functions.php';
check_post();

require_once '../vendor/autoload.php';

if (!isset($_POST['googleToken'])) {
	http_response_code(400);
	exit();
}
else if(isset($_POST['googleToken']) && empty($_POST['googleToken'])){
	http_response_code(401);
	exit();
}

$CLIENT_ID = '294565636344-a8stj0fogvkdqkb6ed3m5atqj0nolt8i.apps.googleusercontent.com';
$id_token  = sanitizeString($_POST['googleToken']);

// Get $id_token via HTTPS POST.

$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend

$payload = $client->verifyIdToken($id_token);
if ($payload) {
  $userid = $payload['sub'];
 	if ($payload['aud'] != $CLIENT_ID) {
 		// user token is not from our app
 		http_response_code(401);
 		exit();
 	}
 	if ($payload['iss'] != 'accounts.google.com' && $payload['iss'] != 'https://accounts.google.com') {
 		// from an untrusted source 
 		http_response_code(400);
 		exit();
 	}
 	// if all is good print info
  $output = to_json($payload);
  print($output);
  
} else {
  // Invalid ID token
  http_response_code(401);
 	exit();
}