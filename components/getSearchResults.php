<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/userdbconnect.php' ?>

<?php 
	
	$fname = clean_input($_POST['fname']."%");
	$lname = clean_input($_POST['lname']."%");


//if first name but not last name
if($lname == "%" && $fname != "%"){
	$sql = "SELECT user_id, user_firstname, user_lastname, user_username, user_avatar, user_profession, user_country FROM user WHERE user_firstname LIKE '$fname' ORDER BY user_firstname";
} 
//if last name but not first name
else if($fname == "%" && $lname != "%"){
	$sql = "SELECT user_id, user_firstname, user_lastname, user_username, user_avatar, user_profession, user_country FROM user WHERE user_lastname LIKE '$lname' ORDER BY user_lastname";
} 
//else if both first name and last name
else if($fname != "%" && $lname != "%"){
	$sql = "SELECT user_id, user_firstname, user_lastname, user_username, user_avatar, user_profession, user_country FROM user WHERE user_firstname LIKE '$fname' AND user_lastname LIKE '$lname'  ORDER BY user_lastname";
} else {
	exit();
}

	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$profurl = '../../application/shared/profile.php?user='.$row['user_username'];
			echo "<a href=".$profurl."><div> <img class='searchAvatar' src='".$row['user_avatar']."'>".$row['user_firstname']." ".$row['user_lastname']. "<br></div></a>";
		}
	} else {
		echo "No results";	
	}
		
	
			 

	function clean_input($data){
		//clean data to prevent sql injection
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
	
?>