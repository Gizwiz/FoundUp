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
	
	//USER INFORMATION OF CURRENTLY LOGGED IN USER = OWN INFO
	$user_id = $user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_avatar = $user_bio = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_city = $user_joindate = $user_country = "";

	$user_username = $_SESSION['user_username'];
	$sql = "
		SELECT
			user_id,
			user_contact_email,
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
			user_city,
			user_joindate,
			user_country
		
		FROM user
		
		WHERE user_username = '$user_username'
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
			$user_dob= $row['user_dob'];
			$user_profession= $row['user_profession'];
			$user_gender= $row['user_gender'];
			$user_maritalstatus= $row['user_maritalstatus'];		
			$user_address= $row['user_address'];
			$user_city = $row['user_city'];
			$user_joindate= $row['user_joindate'];
			$user_country= $row['user_country'];

		}
	} else {
		$user_id = $user_email = $user_firstname = $user_lastname = $user_phonenumber = $user_bio = $user_dob = $user_profession = $user_gender = $user_maritalstatus = $user_address = $user_city = $user_joindate = $user_country = "N/A";	
	}
	
	//get profession name from profession table using profession id form user table
	$sql = "
		SELECT profession_name FROM profession WHERE profession_id = '$user_profession'
	";

	$res = $conn->query($sql);

	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			
			$user_profession = $row['profession_name'];	

		}
	} 
	//get country name from country table using country id from user table
	$sql = "
		SELECT country_name FROM country WHERE country_id = '$user_country';
	";
	
	$res = $conn->query($sql);

	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			
			$user_country = $row['country_name'];	
		}
	}

	//get gender name from gender table using gender id from user table
	$sql = "SELECT gender_name FROM gender WHERE gender_id = '$user_gender' ";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$user_gender = $row['gender_name'];	
		}
	}
	$conn->close();
?>