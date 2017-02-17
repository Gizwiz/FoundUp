<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>

<?php
	
	$user_username = $_SESSION['user_username'];
	$user_avatar = "";
	$sql = "SELECT user_avatar, user_username FROM user WHERE user_username = '$user_username'";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_Assoc()) {
			if($row['user_username']===$user_username){
			$user_avatar = $row['user_avatar'];
			}
		}
	} else {

	}

	  echo $user_avatar;

	  
?>
	<img src="<?=$user_avatar ?>" alt="aa">
	
