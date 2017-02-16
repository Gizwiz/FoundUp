<?php

	require '../database/dbconnect.php';
	if(!$_SESSION['user_username']){
		header('location:login.php?session=invalid');
	}
?>