<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>


<?php include '../../controllers/headApplication.php' ?>


<body>
	
	<?php include '../../controllers/navApplication.php'; ?>

	<div class="container-fluid">
		
		<div class="row" id="myInfo">

			<div class = "col-md-3">
				

								<!-- Get and display user avatar image -->
				<?php include '../../components/getImage.php' ?>
				<img src="<?php echo $user_avatar; ?>" alt="<?php echo $user_avatar; ?>" id="uImg">
				<br>

			</div>
			
			<div class= "col-md-5" id="name">

				<br>
				<h1><?php echo $user_firstname." ".$user_lastname; ?></h1>					
				<h3 id="profession"><?php echo $user_profession; ?></h3>
				<h4><?php echo $user_city.', '.$user_country; ?></h4>
				<br><br>
				
				
				<?php include '../../components/userActions.php' ?>

			</div>
			<div class = "col-md-3">
					
				<div id="editProfileButton">
					<form method="post" action="../../components/editUserProfileRedirection.php">
						<input type="submit" name="edit" value="Edit Profile">
					</form>
				</div>
				
			</div>

		</div>
		<br>
		<div class="row" id="about">
			<div class="col-xs-3"></div>
			<div class= "col-xs-6" style="text-align: left">
				
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#contactInformation">Contact Information</a></li>
					<li><a data-toggle="tab" href="#basicInformation">Basic Information</a></li>
					<li><a data-toggle="tab" href="#workInformation">Work and Projects</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="contactInformation" class="tab-pane fade in active">
						<h2>Contact Information</h2><br>
						<h4>E-mail:<?php echo ' '.$user_email; ?></h4>
						<h4>Phone:<?php echo ' '.$user_phonenumber; ?></h4>
						<h4>Address:<?php echo ' '.$user_address.' '.$user_city.' '.$user_country; ?></h4>
					</div>
					<div id="basicInformation" class="tab-pane fade">
						<h2>Basic Information</h2><br>
						<h4>Date of Birth:<?php echo ' '.$user_dob; ?></h4>
						<h4>Gender:<?php echo ' '.$user_gender; ?></h4>
						<h4>Marital Status:<?php echo ' '.$user_maritalstatus; ?></h4>
						<h4>Join date:<?php echo ' '.$user_joindate; ?></h4>
					</div>
					<div id="workInformation" class="tab-pane fade pre-scrollable">
						<h2>Work and Projects</h2><br>
						<?php include '../../components/getUserWorks.php' ?>
						<br><br>
					</div>
				</div>
			</div>
			
		<div class="col-xs-3">asd</div>

		</div>
		
		
	</div>

	
</body>