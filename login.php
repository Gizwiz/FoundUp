<?php include 'controllers/headFrontEnd.php'; ?>
<?php include 'components/loggedin-check.php' ?>
	<body>
	
<?php include 'controllers/navFrontEnd.php'; ?>
	
	<div class="container" id="login">
		<div class="row">
			
			<div class="col-lg-12">
				<h1>Login&nbsp;</h1>
			</div>
			
		</div>
		
		<div class="row" id="loginInput">
		
			<div class="col-lg-12">
				<form name="loginform" action="components/login_authentication.php" method="post">
					<input type="text" class="form-control" name="email" placeholder="Email" required></input>
					<input type="password" class="form-control" name="password" placeholder="Password" required></input>
					<input type="submit" class="form-control" name="submitLogin" value="Log in"></input>
				</form>
			</div>
		
		</div>
	</div>
	
	</body>
