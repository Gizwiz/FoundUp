<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include '../../controllers/headApplication.php' ?>
<body>
	<?php include '../../controllers/navApplication.php'; ?>	
<?php 

	$profile_user_id = clean_input(($_POST["user_id"]));		

	//    header( "refresh:1;url=../login.php" ); 
	
$profile_user_email = $profile_user_firstname = $profile_user_lastname = $profile_user_phonenumber = $profile_user_avatar = $profile_user_bio = $profile_user_dob = $profile_user_profession = $profile_user_gender = $profile_user_maritalstatus = $profile_user_address = $profile_user_city = $profile_user_joindate = $profile_user_country = "";

$sql = "
	SELECT user.user_id, user.user_firstname, user.user_lastname, user.user_username, user.user_contact_email, user.user_phonenumber, user.user_avatar, user.user_profession, user.user_bio, user.user_skills, user.user_dob, user.user_maritalstatus, user.user_address, user.user_country, user.user_city, user.user_joindate, profession.profession_id, profession.profession_field_id, profession.profession_name, field.field_id, field.field_name, country.country_id, country.country_name, gender.gender_id, gender.gender_name
	FROM user 
	INNER JOIN profession 
	ON user.user_profession=profession.profession_id 
	INNER JOIN field 
	ON profession.profession_field_id=field.field_id
	INNER JOIN country
	ON user.user_country=country.country_id
	INNER JOIN gender
	ON user.user_gender = gender.gender_id
	WHERE user_id = '$profile_user_id'
	";
	
$res = $conn->query($sql);

if($res->num_rows>0){
	while($row = $res->fetch_assoc()){
		$profile_user_id = $row['user_id'];
		$profile_user_email = $row['user_contact_email'];	
		$profile_user_firstname= $row['user_firstname'];
		$profile_user_lastname= $row['user_lastname'];
		$profile_user_phonenumber= $row['user_phonenumber'];
		$profile_user_avatar= $row['user_avatar'];
		$profile_user_bio= $row['user_bio'];
		$profile_user_skills = $row['user_skills'];
		$profile_user_dob= $row['user_dob'];
		$profile_user_profession= $row['profession_name'];
		$profile_user_gender= $row['gender_name'];
		$profile_user_maritalstatus= $row['user_maritalstatus'];		
		$profile_user_address= $row['user_address'];
		$profile_user_city = $row['user_city'];
		$profile_user_joindate= $row['user_joindate'];
		$profile_user_country= $row['country_name'];

	}
} else {
	$profile_user_id = $profile_user_email = $profile_user_firstname = $profile_user_lastname = $profile_user_phonenumber = $profile_user_bio = $profile_user_skills = $profile_user_dob = $profile_user_profession = $profile_user_gender = $profile_user_maritalstatus = $profile_user_address = $profile_user_city = $profile_user_joindate = $profile_user_country = "N/A";	
}

function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}

?>
	
	
	<div class="container-fluid">
		
		<div class="row" id="myInfo">

			<div class = "col-xs-3">
				<!-- Get and display user avatar image -->

				<img src="<?php echo $profile_user_avatar; ?>" alt="<?php echo $profile_user_avatar; ?>" class="uImg">
				<br>

			</div>
			
			<div class= "col-xs-6" id="name">


					<br>
					<h1><?php echo $profile_user_firstname." ".$profile_user_lastname; ?></h1>					
					<h3 id="profession"><?php echo $profile_user_profession; ?></h3>
					<h4><?php echo $profile_user_city.' '.$profile_user_country; ?></h4>
					<br><br>
				
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a data-toggle="tab" href="#contactInformation">Contact Information</a></li>
					<li><a data-toggle="tab" href="#basicInformation">About Me</a></li>
					<li><a data-toggle="tab" href="#workInformation">Work and Projects</a></li>
				</ul>
				
				<div class="tab-content">
					<div id="contactInformation" class="tab-pane fade in active">
						<h2>Contact Information</h2><br>
						<h4>E-mail:<?php echo ' '.$profile_user_email; ?></h4>
						<h4>Phone:<?php echo ' '.$profile_user_phonenumber; ?></h4>
						<h4>Address:<?php echo ' '.$profile_user_address.' '.$profile_user_city.' '.$profile_user_country; ?></h4>
					</div>
					<div id="basicInformation" class="tab-pane fade">

						<h2>About <?php echo $profile_user_firstname.' '.$profile_user_lastname ?></h2><br>
						<div class="row">
							<div class="col-xs-6">
								<h4>Date of Birth:<?php echo ' '.$profile_user_dob; ?></h4>
								<h4>Gender:<?php echo ' '.$profile_user_gender; ?></h4>
								<br>
							</div>
							<div class="col-xs-6">
								<h4>Marital Status:<?php echo ' '.$profile_user_maritalstatus; ?></h4>
								<h4>Join date:<?php echo ' '.$profile_user_joindate; ?></h4>
								<br>
							</div>

						</div>
						<h4>My skills:<div style="margin-top: -2%; margin-left:17%" id="myBio"><?php echo $profile_user_skills; ?></div></h4><br>
						<h4>About me:<div style="margin-top: -2%;margin-left:17%" id="myBio"><?php echo $profile_user_bio; ?></div></h4>
	
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

				
			</div>

		</div>
		<br>
		
	</div>

	
</body>