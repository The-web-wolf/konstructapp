<?php
	require('../includes/dynamic/header.php');
	function destroySession(){
		if(isset($_SESSION['_id'])){
			unset($_SESSION['_id']);
			session_start();
			session_destroy();
			setcookie('_id', '', time() - 900, "/");	

			header('location:../signin');

		} else {

			header('location:../signin');
		}
	}
	return destroySession();