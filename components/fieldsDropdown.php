<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/dbconnect.php' ?>

<?php
	$field=$_POST['field'];
	$sql = "SELECT profession_id, profession_name FROM profession WHERE profession_field_id = '$field' ORDER BY profession_name";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			echo "<option value='".$row['profession_id']."'>".$row['profession_name']."</option>";	
		}
	} else { 
		echo "<option value=0>--Select your profession--</option>";
	}
?>
