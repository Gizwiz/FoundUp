<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>

<?php
	
	$user_username = $_SESSION['user_username'];
	$user_avatar = "";
	$sql = " SELECT user_avatar FROM user WHERE user_username = $user_username ";
	$res = $conn->query($sql);
	echo "haloo";
	if($res->num_rows>0){
		while($row = $res->fetch_Assoc()) {
			$user_avatar = $row['user_avatar'];
			echo $user_avatar;
		}
	}
	


?>