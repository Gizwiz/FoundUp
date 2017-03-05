<?php
if(!file_exists('../../components/authentication.php')){
require '../components/authentication.php';
} else {
require '../../components/authentication.php';
}
if(!file_exists( '../../components/session-check.php')){
require '../components/session-check.php';
} else {
require '../../components/session-check.php';
} 

?>


<?php
	include '../database/userdbconnect.php';
	$id=clean_input($_POST['id']);

	$sql = "
	SELECT
		user.user_id,
		user.user_contact_email,
		user.user_firstname,
		user.user_lastname,
		user.user_username,
		user.user_phonenumber,
		user.user_avatar,
		user.user_skills,
		user.user_dob,
		user.user_profession,
		user.user_city,
		user.user_joindate,
		user.user_country,
		profession.profession_id,
		profession.profession_name,
		profession.profession_field_id,
		field.field_id,
		field.field_name,
		country.country_id,
		country.country_name
	FROM user
	INNER JOIN profession
	ON user.user_profession=profession.profession_id
	INNER JOIN field
	ON profession.profession_field_id=field.field_id
	INNER JOIN country
	ON user.user_country=country.country_id
	WHERE user.user_id = '$id'
		";

	$res = $conn->query($sql);

	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			
			echo "
		
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>&times;</button>
					<div class='col-xs-4'>
						<img class='img-responsive' style='width:12em; height:12em;display:inline-block;margin-top:12%;margin-left 5%;' src='".$row['user_avatar']."'>
					</div>
					<div class='col-xs-6'>
						<h2 style='display:inline-block;margin-top:2vh;' class='modal-title'><br>".$row['user_firstname']." ".$row['user_lastname']."<br></h2>
						<h3>".$row['user_city'].' '.$row['country_name']."</h3>
						<h2>".$row['field_name']."<br>".$row['profession_name']."</h2>
					</div>
					<div class='col-xs-2'></div>
				</div>
				
				<div class='modal-body' id='profilePreview'>
					<div class='row'>
					<div class='col-xs-1'></div>
					<div class='col-xs-10'>
						<h3>Date of Birth: </h3><p>".$row['user_dob']."</p>
						<h3>Email: </h3><p>".$row['user_contact_email']."</p>
						<h3>My skills: </h3><p> ".$row['user_skills']."</p>
						<br>
					</div>
					<div class='col-xs-1'></div>
					</div>
					
					<div class='row'>
						<div class='col-xs-4'></div>
						<div class='col-xs-4'>
							<form action='profile.php' method='post'>
								<input type='hidden' name='user_id' value='".$row['user_id']."'/>
								<input type='submit' class='btn btn-default btn-lg' name='viewUserProfile' value='View Full Profile'/>
							</form>
						</div>
						<div class='col-xs-4'></div>
					</div>
				</div>
				
				<div class='modal-footer'>
						<button type='button' class='btn btn-default btn-lg' data-dismiss='modal'>Close</button>
				</div>
		";
			
			
		}
		
		
	} else {
		echo "No Results";	
	}


function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}
?>