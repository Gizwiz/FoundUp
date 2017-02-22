<?php

	session_start();
	require '../database/userdbconnect.php';
	require '../database/companydbconnect.php';
	session_destroy();
	header('location: ../login.php?logout=success');

?>