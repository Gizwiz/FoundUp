<?php

	echo session_status();

	if (session_status() == PHP_SESSION_ACTIVE){
		echo "session active";
		header('location: ../application/userFrontpage.php');
	} else {
	
	}
?>