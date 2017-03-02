<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>

<?php include '../components/getUserInfo.php' ?>

<?php
	
$user_username = $_SESSION['user_username'];
$work_title = $work_description = $work_url = $work_start_time = $work_end_time = "";



if(isset($_POST["submitWorkInfo"])){

//set work variables	
	$work_title = clean_input($_POST['work_title']);
	$work_description = clean_input($_POST['work_description']);
	$work_url = clean_input($_POST['work_url']);
	$work_start_time = clean_input($_POST['work_start_time']);
	$work_end_time = clean_input($_POST['work_end_time']);

	if($work_start_time == "0000-00-00"){
		$work_start_time = "";
	}
	if($work_end_time == "0000-00-00"){
		$work_end_time = "";
	}
	
	echo $work_start_time;

//insert into work database
	include '../database/userdbconnect.php';
	$sql = "
		INSERT INTO works
		(
			user_id,
			work_title,
			work_description,
			work_url,
			work_time_start,
			work_time_end
		) 
		VALUES
		(
		'$user_id',
		'$work_title',
		'$work_description',
		'$work_url',
		'$work_start_time',
		'$work_end_time'
		)
		";
	echo $sql;
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	
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