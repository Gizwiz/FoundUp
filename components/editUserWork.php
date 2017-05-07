<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/userdbconnect.php' ?>

<?php

$id=$_POST['id'];
$work_title=clean_input($_POST['work_title']);
$work_description=clean_input($_POST['work_description']);
$work_url=clean_input($_POST['work_url']);
$work_start_time=clean_input($_POST['work_start_time']);
$work_end_time=clean_input($_POST['work_end_time']);
$sql = "UPDATE works SET work_title='$work_title',work_description='$work_description', work_url = '$work_url', work_time_start='$work_start_time', work_time_end='$work_end_time' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    include 'editUserProfileRedirection.php';
} else {
    echo "Error editing record: " . $conn->error;
}

function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}
?>
