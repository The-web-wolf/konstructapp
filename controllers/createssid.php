<?php 
	$authpage = TRUE;

	require('../includes/dynamic/header.php');
	
	if (isset($_POST['token']) && !empty($_POST['token'])) {
		$user_token = sanitizeString($_POST['token']);
		$user_id 	= sanitizeString($_POST['user']);

		save('token', $user_token);
		save('_id', $user_id); // save data to both cookie and session for ref
	}