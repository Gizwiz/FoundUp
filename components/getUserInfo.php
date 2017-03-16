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
	SELECT user.user_id, user.user_firstname, user.user_lastname, user.user_contact_email, user.user_phonenumber, user.user_avatar, user.user_profession, user.user_bio, user.user_skills, user.user_dob, user.user_maritalstatus, user.user_address, user.user_country, user.user_city, user.user_joindate, profession.profession_id, profession.profession_field_id, profession.profession_name, field.field_id, field.field_name, country.country_id, country.country_name, gender.gender_id, gender.gender_name
	FROM user 
	INNER JOIN profession 
	ON user.user_profession=profession.profession_id 
	INNER JOIN field 
	ON profession.profession_field_id=field.field_id
	INNER JOIN country
	ON user.user_country=country.country_id
	INNER JOIN gender
	ON user.user_gender = gender.gender_id
	WHERE user.user_username = '$user'
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
        echo "<br><br><br>no". $_SESSION['user_username'];
		$user_id = $user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_bio = $user_skills = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_city = $user_joindate = $user_country = "N/A";
	}

?>