<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/userdbconnect.php' ?>

<?php
	
$error = false;


$user_username = $_SESSION['user_username'];

//profession 
if(isset($_POST["user_profession"])){
	$user_profession = clean_input($_POST['user_profession']);
	$sql = "UPDATE user SET user_profession='$user_profession' WHERE user_username = '$user_username'";
	if ($conn->query($sql) === TRUE) {
		echo "profession updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	} 
}

//contact info
if(isset($_POST["submitNewContactInfo"])){
	$user_email = clean_input($_POST['user_email']);
	$user_phonenumber = clean_input($_POST['user_phonenumber']);
	$user_address = clean_input($_POST['user_address']);
	$user_city = clean_input($_POST['user_city']);
	$user_country = clean_input($_POST['user_country']);
	echo $user_country;

	//contact
	if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		echo "Error";
		include 'editProfileRedirection.php';
	} else {

		$sql = "
			UPDATE user SET user_contact_email='$user_email' WHERE user_username = '$user_username'
		";

		if ($conn->query($sql) === TRUE) {
			echo "E-mail updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
	}

	//phone number
	if(!preg_match("/[+]?[0-9]{3}[-]?[0-9]{2,4}[-]?[0-9]{2,4}[-]?[0-9]{2,4}/", $user_phonenumber)){
		echo "phone number error";	
	} else {
		$sql = "
			UPDATE user SET user_phonenumber='$user_phonenumber' WHERE user_username = '$user_username'
		";

		if ($conn->query($sql) === TRUE) {
			echo "Phone number updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
	}

	//address
	$sql = "UPDATE user SET user_address='$user_address' WHERE user_username = '$user_username'
	";
	if ($conn->query($sql) === TRUE) {
		echo "Address updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	} 

	//city
	$sql = "UPDATE user SET user_city='$user_city' WHERE user_username = '$user_username'
	";
	if ($conn->query($sql) === TRUE) {
		echo "City updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	} 

	//country
	$sql = "UPDATE user SET user_country='$user_country' WHERE user_username = '$user_username'
	";	

	if ($conn->query($sql) === TRUE) {
		echo "Country updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	} 
}

if(isset($_POST['submitNewBasicInformation'])){
	$user_dob = clean_input($_POST['user_dob']);
	$user_gender = clean_input($_POST['user_gender']);
	
	//Date of birth
	$sql ="
		UPDATE user SET user_dob='$user_dob' WHERE user_username='$user_username'
	";
	if ($conn->query($sql) === TRUE) {
		echo "Date of Birth updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	//gender
	$sql = "
		UPDATE user set user_gender='$user_gender' WHERE user_username='$user_username'
	";
		if ($conn->query($sql) === TRUE) {
		echo "Gender updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
}




function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}

include '../components/editUserProfileRedirection.php';

$conn->close();

?>