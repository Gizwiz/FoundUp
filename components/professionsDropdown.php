<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>

<?php 
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$field_id = $_POST['fields'];

	$sql = "
		SELECT profession_id, profession_name FROM profession WHERE profession_field_id = '$field_id';
	";
	$result = $conn->query($sql);
	

	if ($result->num_rows > 0) {
		$Pselect = '<select name="professions" onchange="this.form.submit()">';
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$Pselect.='<option value="'.$row['profession_id'].'">'.$row['profession_name'].'</option>';
			
		}
	} else {
		echo "0 results";
	}
	$Pselect.='</select>';
	echo $Pselect;
}
	
?>