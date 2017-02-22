<?php include 'userdbconnect.php' ?>
<?php

$genders_array = array(
	"Male",
	"Female",
	"-",
	"Agender",
	"Androgyne",
	"Androgynous",
	"Bigender",
	"Cis",
	"Cisgender",
	"Cis Female",
	"Cis Male",
	"Cis Man",
	"Cis Woman",
	"Cisgender Female",
	"Cisgender Male",
	"Cisgender Man",
	"Cisgender Woman",
	"Female to Male",
	"FTM",
	"Gender Fluid",
	"Gender Nonconforming",
	"Gender Questioning",
	"Gender Variant",
	"Genderqueer",
	"Intersex",
	"Male to Female",
	"MTF",
	"Neither",
	"Neutrois",
	"Non-binary",
	"Other",
	"Pangender",
	"Trans",
	"Trans*",
	"Trans Female",
	"Trans* Female",
	"Trans Male",
	"Trans* Male",
	"Trans Man",
	"Trans* Man",
	"Trans Person",
	"Trans* Person",
	"Trans Woman",
	"Trans* Woman",
	"Transfeminine",
	"Transgender",
	"Transgender Female",
	"Transgender Male",
	"Transgender Man",
	"Transgender Person",
	"Transgender Woman",
	"Transmasculine",
	"Transsexual",
	"Transsexual Female",
	"Transsexual Male",
	"Transsexual Man",
	"Transsexual Person",
	"Transsexual Woman",
	"Two-Spirit",
	"Apache AH-64 Attack Helicopter"

);

$sql = "DELETE * FROM gender";
if (mysqli_query($conn, $sql)) {
echo "Gender Table deleted successfully \n";
} else {
	echo "Error deleting table: " . mysqli_error($conn);
}

$sql = "INSERT INTO gender (gender_name)  VALUES ('N/A');";

foreach ($genders_array as $gen){
	$sql .= "
		INSERT INTO gender (gender_name) VALUES ('$gen');
	";
}

if ($conn->multi_query($sql) === TRUE) {
	echo "New records created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>