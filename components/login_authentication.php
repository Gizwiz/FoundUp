
<?php
	
	session_start();
	session_regenerate_id();

	if(isset($_POST['submitLogin']) && !empty($_POST['email']) && !empty($_POST['password'])||$_REQUEST['auto']==1){
		/*check for user login*/
		require '../database/userdbconnect.php';
		
		$login_email = $_POST['email'];
		$login_password =$_POST['password'];
		
		
		$sql = "SELECT user_email, user_password, user_username FROM user WHERE user_email = '$login_email' ";
		$res = $conn->query($sql);
		
		if (!$res) {
			trigger_error('Invalid query: ' . $conn->error);
		}
		
		if ($res->num_rows > 0) {
			// output data of each row
			while($row = $res->fetch_assoc()) {
				
				if ($row['user_email']===$login_email){
					
					if(password_verify($login_password, $row['user_password'])){
						echo $row['user_password'];
						$user_username = $row['user_username'];
						$_SESSION['user_username'] = $user_username;
						header("location: ../application/user/userFrontpage.php?user=$user_username&request=login&status=success");
						exit();
					} else {
						echo 'passwords do not match';
					}
				}
			} 
		}
		//no matching result found
		else {
			
			//session_write_close();
			//header:('location: login.php?session=invalid');
			
		
		$conn->close();
		
		/*check for company login*/
		
		require '../database/companydbconnect.php';
		echo "$login_email";
		$sql = "SELECT company_email, company_password, company_username FROM company WHERE company_email = '$login_email' ";
		$res = $conn->query($sql);
			
		if (!$res) {   
			trigger_error('Invalid query: ' . $conn->error);
		}
			
		if ($res->num_rows > 0) {
			
			// output data of each row
			while($row = $res->fetch_assoc()) {
				if ($row['company_email']===$login_email);
					if(password_verify($login_password, $row['company_password'])){
						$company_username = $row['company_username'];
						$_SESSION['company_username'] = $company_username;
						header("location: ../application/company/companyFrontpage.php?user=$company_username&request=login&status=success");
						exit();
					} else {
						echo 'passwords do not match';
					}
			}
		} else {
			echo 'Login Error';
			$_SESSION['ERR'] = 'LOGINERROR';
			session_write_close();
			//header("location: ../login.php");
			$conn->close();
			exit();
		}
		}
		
	} else {
		echo 'Login Error';
		echo $login_password;
		$_SESSION['ERR'] = 'LOGINERROR';
		session_write_close();
		//header("location: ../login.php");
		exit();
	}

?>