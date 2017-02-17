<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>

<?php
	
	$user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_avatar = $user_bio = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_joindate = $user_country = "";
	$user_username = $_SESSION['user_username'];
	$sql = "
		SELECT
			user_email,
			user_firstname,
			user_lastname,
			user_phonenumber,
			user_avatar,
			user_bio,
			user_dob,
			user_profession,
			user_gender,
			user_maritalstatus,
			user_address,
			user_joindate,
			user_country
		
		FROM user
		
		WHERE user_username = '$user_username'
		";
	$res = $conn->query($sql);

	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$user_email = $row['user_email'];	
			$user_firstname= $row['user_firstname'];
			$user_lastname= $row['user_lastname'];
			$user_phonenumber= $row['user_phonenumber'];
			$user_avatar= $row['user_avatar'];
			$user_bio= $row['user_bio'];
			$user_dob= $row['user_dob'];
			$user_profession= $row['user_profession'];
			$user_gender= $row['user_gender'];
			$user_maritalstatus= $row['user_maritalstatus'];		
			$user_address= $row['user_address'];
			$user_joindate= $row['user_joindate'];
			$user_country= $row['user_country'];

		}
	} else {
		$user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_bio = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_joindate = $user_country = "N/A";	
	}


	$sql = "
		SELECT profession_name FROM profession WHERE profession_id = '$user_profession'
	";

	$res = $conn->query($sql);

	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			
			$user_profession = $row['profession_name'];	

		}
	} 
?>