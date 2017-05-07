<?php include 'controllers/headFrontEnd.php'; ?>

<body>

<?php include 'controllers/navFrontEnd.php'; ?>
		
	<div class="container">
		
		<div class="row" id="companyRegInfo">

			
		</div>

		<div class="row" id="registrationCompany">

		<?php
			$errmsg = "";
			$error = false;
			$error_css = 'border-color:red';
			$okay_css = 'border-color:green';
			$name_css = $email_css = $pw_css = "";
			$name_error = $email_error = $pw_error = false;
			$company_email = $company_name = $company_password = $company_confirmpassword = "";
			$company_username = "";
			
					if($_SERVER["REQUEST_METHOD"] === "POST") {
						
						$company_email = clean_input($_POST['company_email']);
						$company_name = clean_input($_POST['company_name']);
						$company_password = $_POST['company_password'];
						$company_confirmpassword = $_POST['company_confirmpassword'];
						$company_username = $company_name;
						
						//name
						if (!preg_match("/[a-zA-ZåäöÅÄÖ 0123456789.-]*$/", $company_name)) {
							$name_css=$error_css;
							$name_error = true;
						} else {
							$name_css=$okay_css;	
							$name_error = false;
						}
						
						//email
						if(!filter_var($company_email, FILTER_VALIDATE_EMAIL)){
						 	$email_css = $error_css;	
							$email_error = true;
						} else {
							$email_css = $okay_css;
							$email_error = false;
						}
						
						//password
						
						if($company_password != $company_confirmpassword){
							$errmsg .= "Entered passwords do not match";
							$pw_css = $error_css;
							$pw_error = true;
						} else {
							//password hasing
							$company_password = password_hash($company_password, PASSWORD_DEFAULT);
							$pw_css = $okay_css;
							$pw_error = false;
						}
						
						if($name_error or $email_error or $pw_error){
							$error = true;	
						} else {
							$error = false;	
						}
						
						if($error){
				
						} else {
							
							/* checks for matching email in user databse*/
							include 'database/userdbconnect.php';
							//check if an individual account with the email already exists
							$sql = "SELECT user_email FROM user";
							$res = $conn->query($sql);


							if($res->num_rows>0){
									//if an email match is found, produce errors
								while($row=$res->fetch_assoc()){
									if($row['user_email']===$company_email){
										$errmsg = 'An account with this email already exists.';
										$email_css = $error_css;
										$error = true;
									}

							}
							}
							$conn->close();
								
							/*checks for matching email in company database*/
							include 'database/companydbconnect.php';
							//check if a company account with the email already exists
							$sql = "SELECT company_email FROM company";
							$res = $conn->query($sql);
							if($res->num_rows>0){
								while($row=$res->fetch_assoc()){
									if($row['company_email']===$company_email){
										$errmsg = "An account with this email already exists.";
										$email_css = $error_css;
										$email_error = true;
										$error = true;
									}
								}
							}
						
														
						if(!$error){
							$errmsg = "	error";
							//if no error, create account
							$sql = "
								INSERT INTO company (
									company_name,
									company_email,
									company_password,
									company_username,
									company_avatar,
									company_joindate
								)
								VALUES (
									'$company_name',
									'$company_email',
									'$company_password',
									'$company_username',
									'../../resources/companyAvatars/startup.jpg',
									CURRENT_TIMESTAMP
								)
							";
					
					session_start();
					mysqli_query($conn,$sql) or die(mysqli_error($conn));
					$_SESSION['company_username'] = $company_username;
					header('Location: application/company/companyFrontpage.php?username='.$company_username);		

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
			
			<div class="col-lg-12">
			 <h3 style="text-align:center;color:red">Registering as a company is currently disabled because of database problems in Azure. Please register <a href=registerindividual.php>as an individual</a> instead.</a></h3>
				<h1>Register as a company</h1>
				<h4><br>Register as <a href=registerindividual.php>an individual</a> instead<br><br></h4>
				
				<!--<form action="<?php #echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">-->
                <!-- Company registering disabled because of non-functionining database in azure -->
                    <form>
					<div id="companyRegErrMsg">
						<span><?php echo $errmsg; ?></span>
					</div><br>
					<input type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>" style="<?php echo $name_css; ?>" placeholder="Company Name" autofocus required><br>
					<input type="text" class="form-control" name="company_email" value="<?php echo $company_email; ?>" placeholder="Company E-mail" style="<?php echo $email_css; ?>" required><br>
					<input type="password" class="form-control" name="company_password" value="<?php echo $company_password;?>"  style="<?php echo $pw_css; ?>" placeholder="Password" required><br>
					<input type="password" class="form-control" name="company_confirmpassword" value="<?php echo $company_confirmpassword;?>"  style="<?php echo $pw_css; ?>" placeholder="Confirm Password" required><br>
					<input type="submit" class="registerButton" name="regButtonCompany" value="Register" required>					

				    </form>
               

			
			</div>

		</div>
	
	</div>

</body>
