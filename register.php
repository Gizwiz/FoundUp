<?php include 'controllers/headFrontEnd.php'; ?>

	<body>
	
<?php include 'controllers/navFrontEnd.php'; ?>
		
	<div class="container">
		<div class="row" id="registrationTypeChoice">
		
			<br><br><br><br><br>
			<div class="col-xs-6">
				<a href="registerindividual.php"><h1>REGISTER AS AN INDIVIDUAL</h1></a>
				<img src="resources/images/person.jpg" alt="Worker" > <br>
				<a href="registerindividual.php">
					<input type=button value="Sign Up">
				</a>
			</div>
			<div class="col-xs-6">
				<a href="registercompany.php"><h1>REGISTER AS A COMPANY</h1></a>
				<img src="resources/images/startup.jpg" alt="StartUp" > <br>
				<a href="registercompany.php">
					<input type=button value="Sign Up">
				</a>
			</div>

			
		</div>
		
		<div class="row" style="text-align:center">
			<div class="col-lg-12">
				<h3><br>Already have an account?<br></h3>
				<h3><a href="login.php">Log in</a></h3>
			</div>
		</div>
	</div>
	
	</body>
	
