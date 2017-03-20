<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/userdbconnect.php' ?>

<?php 
	$fname = $lname = $field = $profession = $country = "";
	$fieldName = $professionName = $countryName = "";
	$fieldDisplayableName = $professionDisplayableName = $countryDisplayableName = "";
	$fname = clean_input($_POST['fname']."%");
	$lname = clean_input($_POST['lname']."%");
	$field = clean_input($_POST['field']);
	$profession = clean_input($_POST['profession']);
	$country = clean_input($_POST['country']);

	$searchLimit = 25;

if($field == "--Select professional field--"){
	$fieldName = "%"; 
	$profession = "0";
}
if($profession === "--Select your profession--"){
	$profession = "null";
}
if($country === "1"){
	$country = "%";
}

/*
$sql = "SELECT fucks_to_give FROM fucks WHERE fucks_to_give > 0";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
results in: "No results found";
*/

$sql = "SELECT field_name FROM field WHERE field_id = '$field'";
$res = $conn->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		$fieldName = $row['field_name'];
	}
} else {
	$fieldName = "%";	
}

$sql = "SELECT profession_name FROM profession WHERE profession_id = '$profession'";
$res = $conn->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		$professionName = $row['profession_name'];
		//check if profession name is empty
		if($professionName === " " || $professionName === "" || $professionName === NULL || $professionName === "null" || $professionName === "invalid"){
			$professionName = "%";	
		}
	}
} else {
	if($profession === "null"){
		
	}
	$professionName = "%";	
}

$sql = "SELECT country_name FROM country WHERE country_id = '$country'";
$res = $conn->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		$countryName = $row['country_name'];
		if($countryName === " " || $countryName === "" || $countryName === NULL || $countryName === "null" || $countryName === "invalid"){
			$countryName = "%";	
		}
	}
} else {
	$countryName = "%";	
}


if($fname === "%" and $lname === "%" and $fieldName === "%" and $professionName === "%" and $countryName === "%"){
		echo "<h2 style='text-align:center;'> Here's 50 randomly selected talented people. </h2>";
	$sql =" 
	SELECT users.user_id, users.user_firstname, users.user_lastname, users.user_username, users.user_avatar_small, users.user_profession, users.user_country, users.user_city, profession.profession_id, profession.profession_field_id, profession.profession_name, field.field_id, field.field_name, country.country_id, country.country_name
	FROM users
	INNER JOIN profession 
	ON users.user_profession=profession.profession_id 
	INNER JOIN field 
	ON profession.profession_field_id=field.field_id
	INNER JOIN country
	ON users.user_country=country.country_id
	WHERE users.user_firstname LIKE '$fname' AND users.user_lastname LIKE '$lname' AND field.field_name LIKE '$fieldName' AND profession.profession_name LIKE '$professionName' AND (country.country_name LIKE '$countryName' OR users.user_country IS NULL)
	ORDER BY RAND() LIMIT $searchLimit
	";

	$res = $conn->query($sql);

	if($res->num_rows>0){
		
		while($row=$res->fetch_assoc()){ 

			$profurl = '../../application/shared/profile.php?user='.$row['user_username'];

			echo "
				<div class='btn-searchCustom col-xs-12' style='margin-bottom:1%;height: 6em;'>
				<div id='".$row['user_id']."' onclick='getPreviewProfile(this.id)' data-toggle='modal' data-target='#previewUserProfile' class='animFade'>
				<div class='col-xs-2'><img class='searchAvatar' src='".$row['user_avatar_small']."'></div>
				<div class='col-xs-5'><p>".$row['user_firstname']." ".$row['user_lastname']."<br>".$row['user_city']." ".$row['country_name']. "</p></div>
				<div class='col-xs-4'><p>".$row['profession_name']."</p></div>
				<div class='col-xs-1'>&nbsp;</div>
				</div>
				</div>

				<script>
					$('.btn-searchCustom').each(function(index){
						$(this).fadeOut(0);
					});
				</script>
			" ;

		}
	} else {
		echo "<h3>No results found</h3>";	
	}
	
} else {
	$sql =" 
	SELECT users.user_id, users.user_firstname, users.user_lastname, users.user_username, users.user_avatar_small, users.user_profession, users.user_country, users.user_city, profession.profession_id, profession.profession_field_id, profession.profession_name, field.field_id, field.field_name, country.country_id, country.country_name
	FROM users 
	INNER JOIN profession 
	ON users.user_profession=profession.profession_id 
	INNER JOIN field 
	ON profession.profession_field_id=field.field_id
	INNER JOIN country
	ON users.user_country=country.country_id
	WHERE users.user_firstname LIKE '$fname' AND users.user_lastname LIKE '$lname' AND field.field_name LIKE '$fieldName' AND profession.profession_name LIKE '$professionName' AND (country.country_name LIKE '$countryName' OR users.user_country IS NULL)
	ORDER BY users.user_lastname LIMIT $searchLimit
	";

	$res = $conn->query($sql);

	if($res->num_rows>0){

		while($row=$res->fetch_assoc()){ 

			$profurl = '../../application/shared/profile.php?user='.$row['user_username'];

			echo "
				<div class='btn-searchCustom col-xs-12' style='height:6em;background-color:white;'>
				<div id='".$row['user_id']."' onclick='getPreviewProfile(this.id)' data-toggle='modal' data-target='#previewUserProfile' class='animFade'>
				<div class='col-xs-2'><img class='searchAvatar' src='".$row['user_avatar_small']."'></div>
				<div class='col-xs-5'><p>".$row['user_firstname']." ".$row['user_lastname']."<br>".$row['user_city']." ".$row['country_name']. "</p></div>
				<div class='col-xs-4'><p>".$row['profession_name']."</p></div>
				<div class='col-xs-1'>&nbsp;</div>
				</div>
				</div>

				<script>
					$('.btn-searchCustom').each(function(index){
						$(this).fadeOut(0);
					});
				</script>
			" ;

		}
	} else {
		echo "<h3>No results found</h3>";	
	}

}

	function clean_input($data){
		//clean data to prevent sql injection
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
	
?>