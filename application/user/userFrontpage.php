<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>

<?php
	$current_user = $_SESSION['user_username'];
?>

<?php include '../../controllers/headApplication.php'; ?>

	<body>
		
<?php include '../../controllers/navApplication.php'; ?>
		
	
	<div class="container-fluid" id="frontPageTop">

				
		<div class="row" id="frontPageSearch">
		
			<div class="col-xs-3"></div>
			<div class="col-xs-6"><h1>Start Searching For a Team</h1></div>
			<div class="col-xs-3"></div>
			
		</div>
		
		<div class="row" id="frontPageSearchInformation">
		
			<div class="col-xs-3"></div>
			<div class="col-xs-3">
				<h2>Search for Talented People</h2>
				<img src="../../resources/images/person.jpg" alt="Worker" /> <br>
			</div>
			<div class="col-xs-3">
				<h2>Search for StartUps</h2>
				<img src="../../resources/images/startup.jpg" alt="Worker" /> <br>
			</div>
			<div class="col-xs-3"></div>
			
		</div>
		
		<div class="row" id="frontPageSearchButtons">
			<div class="col-xs-3"></div>
			<div class="col-xs-3">
				<form action="../shared/search.php" method="get">
					<input type="submit" class="btn btn-default btn-lg" value="Search" name="userSearchButton">
			</div>
			<div class="col-xs-3">
				<form action="../shared/search.php" method="post">
					<input type="submit" class="btn btn-default btn-lg" value="Search" name="companySearchButton">
				</form>
			</div>
			<div class="col-xs-3"></div>
		</div>

		<div class="row" id="frontPageSearchSuggestions">
			
			<div class="col-xs-2">
			</div>
			<div class="col-xs-8">
				<?php include '../../controllers/suggestionsCarousel.php' ?>
			</div>
			
			<div class="col-xs-2">
			</div>
			
		</div>



		</div>

	</body>
