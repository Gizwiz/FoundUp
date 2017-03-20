<?php

if(!file_exists ('../components/authentication.php')){
	 require 'authentication.php';
}else {
	require '../components/authentication.php';
}
if(!file_exists ('../components/session-check.php')){
	require 'session-check.php';
} else {
	require '../components/session-check.php';
}
if(!file_exists ('../../database/userdbconnect.php')){
	require '../database/userdbconnect.php';
} else {
	require '../../database/userdbconnect.php';
}
   ?>


<?php
	$user =  $_SESSION['user_username'];
	//USER INFORMATION OF CURRENTLY LOGGED IN USER = OWN INFO
	$user_id = $user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_avatar = $user_bio = $user_skills = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_city = $user_joindate = $user_country = "";
$sql = "
	SELECT users.user_id, users.user_firstname, users.user_lastname, users.user_contact_email, users.user_phonenumber, users.user_avatar, users.user_profession, users.user_bio, users.user_skills, users.user_dob, users.user_maritalstatus, users.user_address, users.user_country, users.user_city, users.user_joindate, profession.profession_id, profession.profession_field_id, profession.profession_name, field.field_id, field.field_name, country.country_id, country.country_name, gender.gender_id, gender.gender_name
	FROM users
	INNER JOIN profession 
	ON users.user_profession=profession.profession_id 
	INNER JOIN field 
	ON profession.profession_field_id=field.field_id
	INNER JOIN country
	ON users.user_country=country.country_id
	INNER JOIN gender
	ON users.user_gender = gender.gender_id
	WHERE users.user_username = '$user'
	";
	
$res = $conn->query($sql);

if($res->num_rows>0){
	while($row = $res->fetch_assoc()){
        
		$user_id = $row['user_id'];
		$user_email = $row['user_contact_email'];	
		$user_firstname= $row['user_firstname'];
		$user_lastname= $row['user_lastname'];
		$user_phonenumber= $row['user_phonenumber'];
		$user_avatar= $row['user_avatar'];
		$user_bio= $row['user_bio'];
		$user_skills = $row['user_skills'];
		$user_dob= $row['user_dob'];
		$user_profession= $row['profession_name'];
		$user_gender= $row['gender_name'];
		$user_maritalstatus= $row['user_maritalstatus'];		
		$user_address= $row['user_address'];
		$user_city = $row['user_city'];
		$user_joindate= $row['user_joindate'];
		$user_country= $row['country_name'];

	}
}


else {
        echo "<br><br><br>Something went wrong for when fetching user info for user: ". $_SESSION['user_username'];
		$user_id = $user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_bio = $user_skills = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_city = $user_joindate = $user_country = "N/A";
	}

?>