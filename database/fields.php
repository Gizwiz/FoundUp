<?php include 'dbConnect.php' ?>
<?php include 'fieldIds.php' ?>

<?php

	$sql = "TRUNCATE field";
	if (mysqli_query($conn, $sql)) {
    echo "Fields Table deleted successfully \n";
	} else {
		echo "Error deleting table: " . mysqli_error($conn);
	}

	$sql = "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($mathematics_field_id, 'Mathematics');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($IT_field_id, 'Information Technology (IT)');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($engineering_field_id, 'Engineering and Technology');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($medical_field_id, 'Medical and Health Sciences');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($agricultural_field_id, 'Agricultural Sciences');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($social_field_id, 'Social Sciences');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($humanities_field_id, 'Humanities');
	";
	$sql .= "
		INSERT INTO field_name (field_id, field_name)
		VALUES ($designer_field_id, 'Designer');
	";

	if ($conn->multi_query($sql) === TRUE) {
		echo "New records created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>