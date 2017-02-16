<?php include '../components/authentication.php' ?>
<?php include '../components/session-check.php' ?>
<?php
	$current_user = $_SESSION['user_username'];
?>

<?php include '../controllers/headApplication.php'; ?>

	<body>
		
<?php include '../controllers/navApplication.php'; ?>
	
	<div class="container">
		<div class="row">
			
			<div class="col-lg-12">
				
				<?php 
					echo $_SESSION['user_username'];
				?>
			</div>
			
		</div>
	</div>
	
	</body>
