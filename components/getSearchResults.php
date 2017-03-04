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

if($field === "--Select professional field--"){
	$field = "%"; 
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
result -> "No results found";
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

//echo 'fname: '.$fname.', lname: '.$lname.', field: '.$fieldName.', profession: '.$profession.', professionNem: '.$professionName.', country: '.$countryName;


$sql =" 
SELECT user.user_id, user.user_firstname, user.user_lastname, user.user_username, user.user_avatar, user.user_profession, user.user_country, user.user_city, profession.profession_id, profession.profession_field_id, profession.profession_name, field.field_id, field.field_name, country.country_id, country.country_name
FROM user 
INNER JOIN profession 
ON user.user_profession=profession.profession_id 
INNER JOIN field 
ON profession.profession_field_id=field.field_id
INNER JOIN country
ON user.user_country=country.country_id
WHERE user.user_firstname LIKE '$fname' AND user.user_lastname LIKE '$lname' AND field.field_name LIKE '$fieldName' AND profession.profession_name LIKE '$professionName' AND (country.country_name LIKE '$countryName' OR user.user_country IS NULL)
ORDER BY user.user_lastname
";

$res = $conn->query($sql);

if($res->num_rows>0){
	while($row=$res->fetch_assoc()){ 
		
		$profurl = '../../application/shared/profile.php?user='.$row['user_username'];

		echo "<button value='".$row['user_id']."' onclick='getPreviewProfile(this.value)' class='btn btn-default btn-searchCustom btn-lg' data-toggle='modal' data-target='#previewUserProfile'>
		<div class='col-xs-2'><img class='searchAvatar' src='".$row['user_avatar']."'></div>
		<div class='col-xs-4'><p>".$row['user_firstname']." ".$row['user_lastname']."<br>".$row['user_city']." ".$row['country_name']. "</p></div>
		<div class='col-xs-4'><p>".$row['profession_name']."</p></div>
		<div class='col-xs-2'></div>
		</button>";
		

	}
} else {
	echo "<h3>No results found</h3>";	
}



	function clean_input($data){
		//clean data to prevent sql injection
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
	
?>