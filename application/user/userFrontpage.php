<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../components/getUserInfo.php' ?>
<?php
	$current_user = $_SESSION['user_username'];
?>

<?php include '../../controllers/headApplication.php'; ?>

	<body>
		
<?php include '../../controllers/navApplication.php'; ?>
	
	<div class="container-fluid">
		<div class="row" id="frontPageTop">
			<br><br>
			<div class="col-lg-4">
				
				<?php include '../../components/getImage.php' ?>
				<img src="<?php echo $user_avatar ?>" alt="userImage" style="display:block; float:left; margin-left:5%;"></img>
				<h4>Currently logged in as</h3>
				<?php 
					echo '<h4>'.$user_firstname.' '.$user_lastname.'<br>'.$user_email.'</h4>';
				?>
			</div>
			<div class="col-lg-4">
				
				<h1>Haloo</h1>
				
			</div>
			<div class="col-lg-4">
			</div>
		</div>
		</div>

<?php include '../../controllers/suggestionsCarousel.php' ?>
	</body>
