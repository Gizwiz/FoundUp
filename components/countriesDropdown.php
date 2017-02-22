<?php require '../../components/authentication.php' ?>
<?php require '../../components/session-check.php' ?>
<?php include 'getUserInfo.php' ?>
<?php include '../../database/userdbconnect.php' ?>

<?php
	$sql = "SELECT country_id, country_name FROM country ORDER BY country_name";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			if($row['country_name']==$user_country){
				echo "<option selected value='".$row['country_id']."'>".$row['country_name']."</option>";
			} else {
				echo "<option value='".$row['country_id']."'>".$row['country_name']."</option>";	
			}
		}
	} else {
		echo "<option>Database error -- No results found</option>";		
	}

$conn->close();

?>