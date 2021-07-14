<?php

function sanitizeString($val){
	$val=strip_tags($val);
	$val=htmlentities($val);
	$val= str_replace("'" , "\'" , $val);
	$val= str_replace('"' , '\"' , $val);
	$val=htmlspecialchars($val);
	return $val;

}

function save($key,$value){
    $_SESSION[$key]	= $value;
    setcookie($key, $value, time() + (86400 * 30), "/");
}


// checks and ensure the request to a page is HTTP POSTrequest else, blocks the user access
function check_post(){
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		http_response_code(404);
		header('location:./index');

		die('Unrecognised server request');		
	}
}

// checks and ensure the request to a page is HTTP GET request by checking a key else, blocks the user access
function check_get($key){
	$key = $key;

	if($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET[$key])){
		http_response_code(404);
		$response = "{'response' : false, 'message' : 'Unrecognised server request'}";
		die($response);
	}
}

// convert array to json for javascript

function to_json($array){
	if(!is_array($array)){ // check if the argument passed is an aray
		$build = array('status' => 'error', 'description' => 'data passed is not an array'); ; // builds a json of error
		$pass  = json_encode($build , true);
		return $pass;
	}
	else{
		$build = $array;
		$pass = json_encode($build , true);
		return $pass; // converts the array passed to json and returns it
	}
}

function killSession(){
	if(isset($_SESSION['_id'])){
		unset($_SESSION['_id']);
		unset($_SESSION['_token']);
		session_start();
		session_destroy();
		setcookie('_id', '', time() - 900, "/");
		setcookie('_token', '', time() - 900, "/");	

		header('location:./signin');

	} else {

		header('location:./signin');
	}
}

function prodArena($environment){

	if ($environment == 'test') {
		$devUrl = 'https://konstructapps.herokuapp.com';
	}
	else if ($environment == 'live'){
		$devUrl = 'https://api.konstructapp.com';
	}

	return $devUrl;

}


/* gets the data from a URL */
function requestUser($url) {
	$ch = curl_init();
	$timeout = 10;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_FAILONERROR, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);	
	$data = curl_exec($ch);
    if(curl_errno($ch)){
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        throw new Exception ($http_status, 1);
    }	
    curl_close($ch);
	return $data;
}