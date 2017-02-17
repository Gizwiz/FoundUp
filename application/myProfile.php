<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>

<?php include '../controllers/headApplication.php' ?>

<body>
	<?php include '../controllers/navApplication.php'; ?>
	
	<div class="container-fluid">
	
		<div class="row" id="userInfo">
			<div class = "col-lg-12">
				
				<?php include '../components/getImage.php' ?>
			</div>
		</div>
		
		
		
		
	</div>
	
	<form action="../components/upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id ="fileToUpload">
		<input type="submit" value="Upload" name="submit">
	</form>
	
</body>