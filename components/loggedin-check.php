<?php

	if (session_status() == PHP_SESSION_ACTIVE){
		header('location: ../application/userFrontpage.php');
	} else {
	
	}
?>