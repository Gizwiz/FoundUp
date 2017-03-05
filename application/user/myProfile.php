<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../components/getUserInfo.php' ?>

<?php include '../../controllers/headApplication.php' ?>


<body>
	
	<?php include '../../controllers/navApplication.php'; ?>

		<div class="container-fluid">
		
		<div class="row" id="myInfo">

			<div class = "col-xs-3">
				<!-- Get and display user avatar image -->


				<?php include '../../components/getImage.php' ?>
				<img src="<?php echo $user_avatar; ?>" alt="<?php echo $user_avatar; ?>" class="uImg">
				<br>

			</div>
			
			<div class= "col-xs-6" id="name">


					<br>
					<h1><?php echo $user_firstname." ".$user_lastname; ?></h1>					
					<h3 id="profession"><?php echo $user_profession; ?></h3>
					<h4><?php echo $user_city.' '.$user_country; ?></h4>
					<br><br>
				
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a data-toggle="tab" href="#contactInformation">Contact Information</a></li>
					<li><a data-toggle="tab" href="#basicInformation">About Me</a></li>
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
						<h2>About Me</h2><br>
						<div class="row">
							<div class="col-xs-6">
								<h4>Date of Birth:<?php echo ' '.$user_dob; ?></h4>
								<h4>Gender:<?php echo ' '.$user_gender; ?></h4>
								<br>
							</div>
							<div class="col-xs-6">
								<h4>Marital Status:<?php echo ' '.$user_maritalstatus; ?></h4>
								<h4>Join date:<?php echo ' '.$user_joindate; ?></h4>
								<br>
							</div>

						</div>
						<h4>My skills:<div style="margin-top: -2%; margin-left:12%" id="myBio"><?php echo $user_skills; ?></div></h4><br>
						<h4>About me:<div style="margin-top: -2%; margin-left:12%" id="myBio"><?php echo $user_bio; ?></div></h4>
					</div>
					<div id="workInformation" class="tab-pane fade">
						<h2>Work and Projects</h2><br>
						<?php include '../../components/getUserWorks.php' ?>
						<br><br>
					</div>
				</div>
				
				
				<?php include '../../components/userActions.php' ?>

			</div>
			<div class = "col-xs-3">
					
				<div id="editProfileButton">
					<form method="post" action="../../components/editUserProfileRedirection.php">
						<input type="submit" name="edit" value="Edit Profile">
					</form>
				</div>
				
			</div>

		</div>
		<br>
		
	</div>

	
</body>