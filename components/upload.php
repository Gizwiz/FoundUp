<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php require '../../database/userdbconnect.php' ?>

<?php

	$target_dir = '../../resources/useravatars/';
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$del_dir = "";
	$uname = $_SESSION['user_username'];
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	if(isset($_POST["submitImg"])) {
		echo $target_file;
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false){
			$uploadOk = 1; 
		} else {
			$uploadOk = 0;
		}
	}

	//check file size. 100000 = 10KB
	if($_FILES["fileToUpload"]["size"] > 100000) {
		echo "File size must be under 100KB";
		$uploadOk = 0;
	}

	//allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo "File format must be .jpg, .jpeg or .png";
			$uploadOk = 0;
	}

	if($uploadOk == 0){
	
	} else {
		
					
			$sql = "SELECT user_avatar FROM user WHERE user_username = '$uname'";
			$res = $conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc()){
					$del_dir = $row['user_avatar'];
				}
			}
			
			//deletes previous avatar file of user to manage disk space
			unlink($del_dir);

		
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			
			$sql = "UPDATE user SET user_avatar = '$target_file' WHERE user_username = '$uname'";
			if($conn->query($sql) === TRUE){
				echo "Image uploaded succefully";	
				header('location: editProfileRedirection.php');
			} else {
				echo "Error uploading image: ".$conn->error;	
			}
			
		} else {
			
		}
	}	
$conn->close();
	
	
?>