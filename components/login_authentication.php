
<?php
	
	session_start();

	if($_SESSION['user_username']){
		header('location: ../application/userFrontPage.php');	
	}

	if(isset($_REQUEST['submitLogin']) && !empty($_REQUEST['email']) && !empty($_REQUEST['password'])){
		require '../database/dbconnect.php';
		
		$user_email = $_REQUEST['email'];
		$user_password = $_REQUEST['password'];
		
		$sql = "SELECT user_email, user_password, user_username FROM user WHERE user_email='$user_email' AND user_password='$user_password'";
		$res = $conn->query($sql);
		
		if ($res->num_rows > 0) {
			// output data of each row
			while($row = $res->fetch_assoc()) {
				if ($row['user_email']===$user_email && $row['user_password']===$user_password);
				$user_username = $row['user_username'];
				$_SESSION['user_username'] = $user_username;
				header('location: ../application/userFrontpage.php?user='.$user_username);
			}
		} else {
			echo 'Login Error';
			$_SESSION['ERR'] = 'lOGINERROR';
			session_write_close();
			header("location: ../login.php");
			exit();
		}
		
	} else {
		echo 'Login Error';
		$SESSION['ERR'] = 'lOGINERROR';
		session_write_close();
		header("location: ../login.php");
		exit();
	}

?>