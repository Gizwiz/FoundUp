<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php
	$current_user = $_SESSION['user_username'];
?>

<?php include '../../controllers/headApplication.php'; ?>

	<body>
		
<?php include '../../controllers/navApplication.php'; ?>
		
	
	<div class="container-fluid">

		<div class="row" id="frontPageTop">

			
		</div>
				
		<div class="row" id="frontPageSearch">
		
			<div class="col-lg-3"></div>
			<div class="col-lg-6"><h1>Search For a Team</h1></div>
			<div class="col-lg-3"></div>
			
		</div>
		
		<div class="row" id="frontPageSearchChoice">
		
			<div class="col-xs-3"></div>
			<div class="col-xs-3">
				
			
				<form action="../shared/search.php" method="post">
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
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8">
				<?php include '../../controllers/suggestionsCarousel.php' ?>
			</div>
			
			<div class="col-lg-2">
				
			</div>
		</div>



		</div>

	</body>
