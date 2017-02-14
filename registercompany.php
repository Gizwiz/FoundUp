<?php include 'controllers/headFrontEnd.php'; ?>

	<body>

<?php include 'controllers/navFrontEnd.php'; ?>
		
	<div class="container">
		
		<div class="row" id="indivRegInfo">

			
		</div>

		<div class="row" id="registrationUser">
			
			<div class="col-lg-3">
				
			</div>
			<div class="col-lg-6">
			
				<h1>Register as a company</h1>
				<h4><br>Register as <a href=registerindividual.php>an individual</a> instead<br><br></h4>
				
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" autocomplete="off">
					<input type="text" class="form-control" name="user_firstname" default = "" placeholder="First Name" required>
					<input type="text" class="form-control" name="user_lastname" placeholder="Last Name" required>
					<input type="text" class="form-control" name="user_email" placeholder="Email" required>
					<input type="text" class="form-control" name="user_phonenumber" placeholder="Phone number" required>
					<input type="password" class="form-control" name="user_password" placeholder="Password" required>
					<input type="password" class="form-control" name="user_confirmpassword" placeholder="Confirm Password" required>
					<input type="submit" class="form-control" name="a" value="Register" style="background-color: #2976F2; color:white;">
				</form>

				<? php
					
					if($SERVER["REQUEST_METHOD"] === "POST") {
						
						echo "post";	
					}
	
				?>
			
			</div>
			<div class="col-lg-3">
				
			</div>
		
		</div>
	
	</div>

	</body>
