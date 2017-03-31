
<?php include 'controllers/headFrontEnd.php' ?>
	
	<body>
	
<?php include 'controllers/navFrontEnd.php'; ?>
	
    <!-- Page Header --> 
     <header class="intro-header" style="background-image: url(resources/images/mainBackground.jpg); height:65vh;">
	 <!--style="background-image: url(resources/images/mainBackground2.jpg);--> 
        <div class="container-fluid"> 
			<div class="row" style="margin-top: 3%"> 
				<div class="col-xs-1"> </div>
				<div class="col-xs-6"> 
				<!-- Carousel -->
					<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
						<!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						  </ol>

						  <div class="carousel-inner" role="listbox" style="width:100%">
						  
							<div class="item active site-heading"> 
									<h1 class="headerText">FoundUp</h1> 
									 <!--<hr class="small">-->
									<span class="subheaderText">Find talented people for your StartUp</span>
							</div>	
						
							<div class="item site-heading"> 
								 <h1 class="headerText">Make it easy </h1> 
									 <!--<hr class="small">-->
								<span class="subheaderText">StartUp with FoundUp</span>
							</div>
							
							<div class="item site-heading"> 
								 <h1 class="headerText">Find a team</h1> 
									 <!--<hr class="small">-->
								<span class="subheaderText">Build your dream StartUp team</span>
							</div>
							
						</div> 
					</div>
				 
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
				 
             </div> 
				<div class="col-xs-1"> </div>
            <div class="col-xs-4" id="frontPageLogin">
                <h2>Sign In</h2>
                <form name="loginform" action="components/login_authentication.php" method="post">
					<input type="text" class="form-control" name="email" placeholder="Email" required></input>
					<input type="password" class="form-control" name="password" placeholder="Password" required></input>
					<input type="submit" class="form-control" name="submitLogin" value="Log in"></input>
                    <a href="registerindividual.php">or register</a><br>
				</form>    
             </div>

         </div> 
         </div>
 </header> 
	 
	 <div class="container" id="sec">
	 
	 
		<div class="row" id="infoImages">
			<div class="col-sm-4">
				<h2> SAVE MONEY </h2>
				<h2> <br><br>IMAGE GOES HERE<br><br></h2>
			</div>
			<div class="col-sm-4">
				<h2> SAVE TIME </h2>
				<h2> <br><br>IMAGE GOES HERE<br><br></h2>
			</div>
			<div class="col-sm-4">
				<h2> SAVE EFFORT </h2>
				<h2> <br><br>IMAGE GOES HERE<br><br></h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12" id="signup">
				
				<h2>I am a...</h2>

			</div>
		</div>
	 
		<div class="row" style="text-align: center;" id="frontRegister">
			<div class="col-xs-6" class="select">
				<h2>Worker</h2>
				<img src="resources/images/person.jpg" alt="Worker" /> <br>
				<h2> Looking for a StartUp </h2>
				<button type="button" class="btn btn-default">Search</button>
			</div>
		
			<div class="col-xs-6" class="select">
				<h2>StartUp</h2>
				<img src="resources/images/startup.jpg" alt="StartUp" /> <br>
				<h2> Looking for people </h2>
				<button type="button" class="btn btn-default">Search</button>
			</div>
			
		</div>

	</div>

	

	</body>

<?php include 'controllers/footer.php'; ?>