
<?php
	
	session_start();
	session_regenerate_id();

	if(isset($_POST['submitLogin']) && !empty($_POST['email']) && !empty($_POST['password'])||$_REQUEST['auto']==1){
		require '../database/userdbconnect.php';
	
		
		$login_email = $_POST['email'];
		$login_password = $_POST['password'];
		
		$sql = "SELECT user_email, user_password, user_username FROM user WHERE user_email = '$login_email' AND user_password = '$login_password' ";
		$res = $conn->query($sql);
		if (!$res) {
    trigger_error('Invalid query: ' . $conn->error);
}
		if ($res->num_rows > 0) {
			
			// output data of each row
			while($row = $res->fetch_assoc()) {
				
				if ($row['user_email']===$login_email && $row['user_password']===$login_password);
				$user_username = $row['user_username'];
				$_SESSION['user_username'] = $user_username;
				header("location: ../application/user/userFrontpage.php?user=$user_username&request=login&status=success");
				exit();
			}
		} 
		//no matching result found
		else {
			session_write_close();
			//header:('location: login.php?session=invalid');
			
		}
		$conn->close();
		
		require '../database/companydbconnect.php';
		
		$sql = "SELECT company_email, company_password, company_username FROM company WHERE company_email = '$login_email' AND company_password = '$login_password'";
		$res = $conn->query($sql);
				if (!$res) {
    trigger_error('Invalid query: ' . $conn->error);
}
		if ($res->num_rows > 0) {
			// output data of each row
			while($row = $res->fetch_assoc()) {
				if ($row['company_email']===$login_email && $row['company_password']===$login_password);
				$company_username = $row['company_username'];
				$_SESSION['company_username'] = $company_username;
				header("location: ../application/company/companyFrontpage.php?user=$company_username&request=login&status=success");
				exit();
			}
		} else {
			echo 'Login Error';
			$_SESSION['ERR'] = 'LOGINERROR';
			session_write_close();
			//header("location: ../login.php");
			$conn->close();
			exit();
		}
		
		
	} else {
		echo 'Login Error';
		$_SESSION['ERR'] = 'LOGINERROR';
		session_write_close();
		//header("location: ../login.php");
		exit();
	}

?>