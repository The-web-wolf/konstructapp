<?php 
	$authpage = TRUE;

	require('../includes/dynamic/header.php');
	
	if (isset($_POST['_token']) && !empty($_POST['_token'])) {
		$user_token = sanitizeString($_POST['_token']);
		$user_id 	= sanitizeString($_POST['user']);

		save('_token', $user_token);
		save('_id', $user_id); // save data to both cookie and session for ref
	}