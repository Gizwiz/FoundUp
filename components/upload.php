<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php require '../database/userdbconnect.php' ?>

<?php

	$target_dir = '../resources/useravatars/';
    $target_dir_small = '../resources/smalluseravatars';
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$target_file_small = $target_dir_small."/".basename($_FILES["fileToUpload"]["name"]);
	$del_dir = "";
    $del_dir_small_avatar = "";
	$uname = $_SESSION['user_username'];
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    
    //check if filename is default. Do not allow, otherwise it will delete the default avatar and mess up a lot of user's avatars
    if(basename($_FILES["fileToUpload"]["name"]) == "default.png" || basename($_FILES["fileToUpload"]["name"]) == "default.jpg" || basename($_FILES["fileToUpload"]["name"]) == "default.jpeg" || basename($_FILES["fileToUpload"]["name"]) == "default.gif" ){
        echo basename($_FILES["fileToUpload"]["name"]);
        echo '<br>Cannot upload a file with the name "Default". Please try again with a different file name.<br>Redirecting in 3 seconds...';
        header( "refresh:3;url=../application/user/editMyProfile.php" ); 
        exit();
    }

	if(isset($_POST["submitImg"])) {
		echo basename($target_file);
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false){
			$uploadOk = 1; 
		} else {
			$uploadOk = 0;
		}
	}

	//check file size. 100000 = 10KB
	if($_FILES["fileToUpload"]["size"] > 2000000) {
		echo "File size must be under 2MB";
		$uploadOk = 0;
	}

	//allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo "File format must be .jpg, .jpeg or.png";
			$uploadOk = 0;
	}

	if($uploadOk == 0){
        
	} else {
		//normal sized avatar image
			//previous avatar file deletion
			$sql = "SELECT user_avatar, user_avatar_small FROM user WHERE user_username = '$uname'";
			$res = $conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc()){
					//removes a set of ../ from the url stored in the database to match diretory path needed
					//sets deletion directory
                    if ($row['user_avatar']!="../../resources/useravatars/default.png"){
                        $del_dir = str_replace("../../","../",$row['user_avatar']);
                        $del_dir_small_avatar = str_replace("../../","../",$row['user_avatar_small']);
                        //deletes previous avatar file of user to manage disk space
                        unlink($del_dir);
                        unlink($del_dir_small_avatar);
                    }

				}
			}


		
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

			//need to add ../ to the url stored in the database to make getImage.php read the path correctly
			$sql = "
            UPDATE users
            SET user_avatar = '../$target_file'
            WHERE user_username = '$uname'
            ";
			if($conn->query($sql) === TRUE){
				echo "Image uploaded succefully";

				//header('location: editUserProfileRedirection.php');
			} else {
				echo "Error uploading image: ".$conn->error;	
                exit();
			}
            
            			                
		} else {
			
		}
        
            //create small avatar version of image to save bandwith when small version is needed
            $sm = compress_image($target_file, "../resources/smalluseravatars/".basename($target_file), 55);
            echo $target_file;
            $sql = "
            UPDATE users
            SET user_avatar_small = '../$target_file_small'
            WHERE user_username = '$uname'
            ";
			if($conn->query($sql) === TRUE){
				echo "Small Avatar uploaded succefully";

				header('location: editUserProfileRedirection.php');
			} else {
				echo "Error uploading image: ".$conn->error;	
			}


	}	

//quality 0-100
//compresses the uploaded image to drastically save bandwith when loads of user avatars are needed, e.g in messaging
function compress_image($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);
	list($width, $height) = getimagesize($source_url);
    $h = 100;
    $w = 100;
    
    $img_p = imagecreatetruecolor($w, $h);
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    else return;
    imagecopyresampled($img_p, $image, 0, 0, 0, 0, $w, $h, $width, $height);
	//save file
    imagejpeg($img_p, $destination_url, $quality);

}

$conn->close();
	
	
?>