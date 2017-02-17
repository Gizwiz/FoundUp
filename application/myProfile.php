<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../components/getUserInfo.php' ?>

<?php include '../controllers/headApplication.php' ?>


<body>
	
	<?php include '../controllers/navApplication.php'; ?>

	<div class="container-fluid">

		<div class="row" id="myInfo">
			<div class = "col-md-4">
				
				<!-- Get and display user avatar image -->
				<?php include '../components/getImage.php' ?>
				<img src="<?=$user_avatar ?>" alt="user_Picture">
				<br>
				

				
			</div>
			
			<div class = "col-md-4">

				<h1><br><?php echo $user_firstname." ".$user_lastname; ?></h1>
				<h3 id="profession"><?php echo $user_profession; ?></h3>
				<h4><?php echo $user_country; ?></h4>
				<br><br>
				
				<?php include '../components/userActions.php' ?>
				
			</div>
			

			<div class = "col-md-4">
						
				<form method="post" action="../components/editProfileRedirection.php" style="display:inline-block";>
					<input type="submit" name="edit" value="Edit Profile">
				</form>
			</div>
		</div>
		
		
		
		
	</div>

	
</body>