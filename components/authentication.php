<?php

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	require '../database/dbconnect.php';
	$user_username=$_SESSION['user_username'];

?>