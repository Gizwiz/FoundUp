<?php include 'controllers/headFrontEnd.php'; ?>

	<body>

<?php include 'controllers/navFrontEnd.php'; ?>
		
	<div class="container">
		
		<div class="row" id="indivRegInfo" >
		
			
		</div>

		<div class="row" id="registrationUser">

			<div class="col-lg-12">
								
				<?php

				$error = false;
				$errmsg = "";
				$error_css = 'border-color: red';
				$okay_css = 'border-color: green';
				$fname_css = $lname_css = $email_css = $phone_css = $pw_css = $pwconf_css = "";
				$fname_error = $lname_error = $email_error = $phonenumber_error = $pw_error = false;
				$user_firstname = $user_lastname = $user_email = $user_phonenumber = $user_password = $user_confirmpassword = "";
				$user_username = "";
                $user_id = "";
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// collect value of input field
					$user_firstname = clean_input($_POST['user_firstname']);
					$user_lastname = clean_input($_POST['user_lastname']);
					$user_email = clean_input($_POST['user_email']);
					//$user_phonenumber = clean_input($_POST['user_phonenumber']);
					$user_password = $_POST['user_password'];
					$user_confirmpassword = $_POST['user_confirmpassword'];
					$user_username = $user_firstname . $user_lastname;
					
					/*FNAME*/
					if (!preg_match("/^[a-zA-ZåäöÅÄÖ ]*$/", $user_firstname)) {
						 
						$errmsg = "Only letters and white space allowed."; 
						$fname_error = true;
						$fname_css =  $error_css;
					} else {
						$fname_error = false;
						$fname_css = $okay_css;
					}
					
					
					/*LNAME*/
					if (!preg_match("/^[a-zA-ZåäöÅÄÖ ]*$/", $user_lastname)) {
						
						$errmsg = $errmsg . "<br>Only letters and white space allowed."; 
						$errmsg = $errmsg . "<br>Only letters and white space allowed."; 
						$lname_css =  $error_css;
						$lname_error = true;
					} else {
						$lname_css = $okay_css;
						$lname_error = false;
					}

					/*EMAIL*/
					if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
						$errmsg = $errmsg . "<br> Invalid Email format. Must be like 'example@example.com'.";
						$email_css = $error_css;
						$email_error = true;
					} else {
						$email_css = $okay_css;	
						$email_error = false;
					}
					
					
					/*PHONENUMBER*/
					$phone_css = $okay_css;
					
					   
					/*PW*/
					if($user_password != $user_confirmpassword){
						$pw_error = true;
						$pw_css = $error_css;
						$errmsg = $errmsg . "<br> Passwords do not match.";
					
					} else {
						//password hasing
						$user_hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
						$pw_css = $okay_css;
						$pw_error = false;
					}
					
					if($fname_error or $lname_error or $email_error or $phonenumber_error or $pw_error){
						$error = true;
					} else {
						$error = false;	
					}
					
					if($error){
						
						
					} else {
						/*checks for matching email in company database*/
						include 'database/companydbconnect.php';
						/*
						$sql = "SELECT company_id FROM company WHERE company_username='$user_username' ";
						$res = $conn->query($sql);
						if($res->num_rows==0){
							
						} else {
							$user_username = $user_username.mt_rand(0,9);	
						}*/
						
						//check if a company account with the email already exists
							$sql = "SELECT company_email FROM company";
							$res = $conn->query($sql);
							if($res->num_rows>0){
								while($row=$res->fetch_assoc()){
									if($row['company_email']===$user_email){
										$errmsg = "An account with this email already exists.";
										$email_css = $error_css;
										$email_error = true;
										$error = true;
									}
								}
							}
						

						$conn->close();
						
						/* checks for matching email in user databse*/
						include 'database/userdbconnect.php';
						//check if an individual account with the email already exists
						$sql = "SELECT user_email FROM users";
						$res = $conn->query($sql);

						
						if($res->num_rows>0){
								//if an email match is found, produce errors
							while($row=$res->fetch_assoc()){
								if($row['user_email']===$user_email){
									$errmsg = 'An account with this email already exists.';
									$email_css = $error_css;
									$error = true;
								}
								
						}
								}
							//if nothing found push info into the database and create account							
							if(!$error){
                                $sql = "
                                    INSERT INTO users (
                                        user_firstname,
                                        user_lastname,
                                        user_email,
                                        user_contact_email,
                                        user_password,
                                        user_username,
                                        user_joindate
                                    )
                                    VALUES (
                                        '$user_firstname',
                                        '$user_lastname',
                                        '$user_email',
                                        '$user_email',
                                        '$user_hashed_password',
                                        '$user_username',
                                        CURRENT_TIMESTAMP
                                    )
                                ";
                                session_start();
                                if (mysqli_query($conn, $sql)) {
                                    echo "New user created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                                
                                $_SESSION['user_username'] = $user_username;
                                
                                                                
                                $sql = "
                                    SELECT user_id FROM users WHERE user_username = '$user_username'                                
                                ";
                                $res = $conn->query($sql);

                                if($res->num_rows>0){
                                    while($row = $res->fetch_assoc()){
                                        $user_id = $row['user_id'];
                                    }   
                                }
                                
                                $sql = "
                                    INSERT INTO mailbox (
                                        user_id
                                    ) VALUES (
                                        '$user_id'
                                    )
                                ";
                                
                               if (mysqli_query($conn, $sql)) {
                                    echo "User's mailbox created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                                header('Location: application/user/userFrontpage.php?user_username='.$user_username);
							}
							
						
						} 
					
					   
				}

				function clean_input($data){
					//clean data to prevent sql injection
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;	
				}
				?>
				

				
				<h1>Register as an individual</h1>
				<h4><br>Register as <a href=registercompany.php>a company</a> instead<br><br></h4>

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off" id="regf">
					
					<div id="userRegErrMsg">
						<span><?php echo $errmsg; ?></span>
					</div><br>
					
					<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>" placeholder="First Name" style="<?php echo $fname_css; ?>" autofocus required/><br>
					<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>"  style="<?php echo $lname_css; ?>" placeholder="Last Name" required/><br>
					<input type="text" class="form-control" id="email" name="user_email" value="<?php echo $user_email;?>"  style="<?php echo $email_css; ?>" placeholder="Email" required/><br>
					<!--<input type="text" class="form-control" name="user_phonenumber" value="<?php echo $user_phonenumber;?>"  style="<?php echo $phone_css; ?>" placeholder="Phone number" required><br>-->
					<input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>"  style="<?php echo $pw_css; ?>" placeholder="Password" required/><br>
					<input type="password" class="form-control" name="user_confirmpassword" value="<?php echo $user_confirmpassword;?>"  style="<?php echo $pw_css; ?>" placeholder="Confirm Password" required/><br>
					
					<input type="submit" class="registerButton" name="regButton" value="Register"/>
					
				</form>
				

			</div>

		</div>
	
	</div>

	</body>
