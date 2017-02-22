<?php include '../../getUserInfo.php' ?>
<?php include '../../database/userdbconnect.php' ?>

<?php
	$sql = "SELECT gender_id, gender_name FROM gender";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			if($row['gender_name']==$user_gender){
				echo "<option selected value='".$row['gender_id']."'>".$row['gender_name']."</option>";	
			} else {
				echo "<option value='".$row['gender_id']."'>".$row['gender_name']."</option>";	
			}
		}
	} else {
		echo "<option>Database error -- No results found</option>";	
	}

$conn->close();

?>