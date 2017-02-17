<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>
<?php include '../components/getUserInfo.php' ?>

<?php include '../controllers/headApplication.php' ?>

<body>

	<?php include '../controllers/navApplication.php'; ?>
	
	<div class="container-fluid">
		<div class="row" id="myInfEdit">
			<div class="col-lg-4">
		
				<?php include '../components/getImage.php' ?>
				<img src="<?=$user_avatar ?>" alt="user_Picture">
				<h3>Change profile picture</h3>
				<form action="../components/upload.php" method="post" enctype="multipart/form-data">
					<br>
					<input type="file" name="fileToUpload" id ="fileToUpload">
					<input type="submit" value="Upload" name="submit">
				</form>
			</div>

		</div>
	</div>
	
</body>
