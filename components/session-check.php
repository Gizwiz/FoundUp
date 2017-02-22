<?php

	@session_start();

	if(!file_exists('../../database/userdbconnect.php')){
		require '../database/userdbconnect.php';
	} else {
		require '../../database/userdbconnect.php';
	}

	if(!file_exists('../../database/companydbconnect.php')){
		require '../database/companydbconnect.php';
	} else {
		require '../../database/companydbconnect.php';
	}

	if(!isset($_SESSION['user_username']) and !isset($_SESSION['company_username'])){
		//header("location:../../login.php?session=notset");	
	}

?>