<!DOCTYPE html>

<html>

	<head>
	
		<title>FoundUp</title>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<script  src="js/jquery-3.1.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
		<link rel="stylesheet" href="css/FoundUp.css">
	
	</head>

	<body>
	
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation"> 
         <div class="container-fluid"> 
             <!-- Brand and toggle get grouped for better mobile display --> 
             <div class="navbar-header"> 
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navLinks"> 
                     <span class="sr-only">Toggle navigation</span> 
                     <span class="icon-bar"></span> 
                     <span class="icon-bar"></span> 
                     <span class="icon-bar"></span> 
                 </button> 
                 <a class="navbar-brand" href="index.php" id="logo">
					FoundUp
				 </a> 
             </div> 
             <!-- Collect the nav links, forms, and other content for toggling --> 
             <div class="collapse navbar-collapse" id="navLinks"> 
                 <ul class="nav navbar-nav navbar-right"> 
					 <li>
						<a href="login.php">Log In</a>
					 </li>
					 <li>
						<a href="register.php">Register</a>
					 </li>
                     <li> 
                         <a href="about.php">About</a> 
                     </li> 
                     <li> 
                         <a href="services.php">Services</a> 
                     </li> 
                     <li> 
                         <a href="contact.php">Contact</a> 
                     </li> 
					 <li>
						<div class="input-group stylish-input-group" id="searchNavBar" style="width:10em; margin-top: 5%;">
							<input type="text" class="form-control"  placeholder="Search" id="searchBar" onkeydown="checkForEnterKey(event)" >
							<div class="input-group-addon" onclick="searchForEnteredData()" >
								<button type="submit">
									<span class="glyphicon glyphicon-search" style="color:black; background-color:#white"></span>
								</button>  
							</div>
						</div>
					 </li>
                     
                 </ul> 
            </div> 
             <!-- /.navbar-collapse --> 
         </div> 
         <!-- /.container --> 
    </nav> 
	
	<div class="container">
		<div class="row">
			
			<div class="col-lg-12">
			</div>
			
		</div>
	</div>
	
	</body>
	
</html>
