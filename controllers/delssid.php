<?php
	require('../includes/dynamic/header.php');
	function destroySession(){
		if(isset($_SESSION['_token'])){
			unset($_SESSION['_id']);
			unset($_SESSION['_token']);
			session_start();
			session_destroy();
			setcookie('_id', '', time() - 900, "/");	
			setcookie('_token', '', time() - 900, "/");	
			header('location:../signin');

		} else {

			header('location:../signin');
		}
	}
	return destroySession();