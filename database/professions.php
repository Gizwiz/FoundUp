<?php include 'dbConnect.php' ?>
<?php include 'fieldIds.php' ?>
<?php
	


	$mathematics_professions = array(
		
	"Statistician",
	"Theoretical Mathematician"
		
	);

	$IT_professions = array(
	
	"Application Developer",
	"Application Support Analyst",
	"Applications Engineer",
	"Associate Developer",
	"Chief Technology Officer (CTO)",
	"Chief Information Officer (CIO)" ,
	"Computer and Information Systems Manager",
	"Computer Systems Manager",
	"Customer Support Administrator",
	"Customer Support Specialist",
	"Data Center Support Specialist",
	"Data Quality Manager",
	"Database Administrator",
	"Desktop Support Manager",
	"Desktop Support Specialist",
	"Developer",
	"Director of Technology",
	"Front End Developer",
	"Help Desk Specialist",
	"Help Desk Technician",
	"Information Technology Coordinator",
	"Information Technology Director",
	"Information Technology Manager",
	"IT Support Manager",
	"IT Support Specialist",
	"IT Systems Administrator",
	"Java Developer",
	"Junior Software Engineer",
	"Management Information Systems Director",
	".NET Developer",
	"Network Architect",
	"Network Engineer",
	"Network Systems Administrator",
	"Programmer",
	"Programmer Analyst",
	"Security Specialist",
	"Senior Applications Engineer",
	"Senior Database Administrator",
	"Senior Network Architect",
	"Senior Network Engineer",
	"Senior Network System Administrator",
	"Senior Programmer",
	"Senior Programmer Analyst",
	"Senior Security Specialist",
	"Senior Software Engineer",
	"Senior Support Specialist",
	"Senior System Administrator",
	"Senior System Analyst",
	"Senior System Architect",
	"Senior System Designer",
	"Senior Systems Analyst",
	"Senior Systems Software Engineer",
	"Senior Web Administrator",
	"Senior Web Developer",
	"Software Architect",
	"Software Developer",
	"Software Engineer",
	"Software Quality Assurance Analyst",
	"Support Specialist",
	"Systems Administrator",
	"Systems Analyst",
	"System Architect",
	"Systems Designer",
	"Systems Software Engineer",
	"Technical Operations Officer",
	"Technical Support Engineer",
	"Technical Support Specialist",
	"Technical Specialist",
	"Telecommunications Specialist",
	"Web Administrator",
	"Web Developer",
	"Webmaster"
		
	);

	$engineering_professions = array(
		
	"Acoustic Engineer",
	"Aerospace Engineer",
	"Agricultural Engineer",
	"Applied Engineer",
	"Architectural Engineer",
	"Audio Engineer",
	"Automotive Engineer",
	"Biomedical Engineer",
	"Chemical Engineer",
	"Civil Engineer",
	"Computer Engineer",
	"Electrical Engineer",
	"Environmental Engineer",
	"Industrial Engineer",
	"Marine Engineer",
	"Materials Science Engineer",
	"Mechanical Engineer",
	"Mechatronic Engineer",
	"Mining and Geological Engineer",
	"Molecular Engineer",
	"Nanoengineer",
	"Nuclear Engineer",
	"Petroleum Engineer",
	"Software Engineer",
	"Structural Engineer",
	"Telecommunications Engineer",
	"Thermal Engineer",
	"Transport Engineer",
	"Vehicle Engineer",
	);

	$medical_professions = array(
		
	);
	
	//truncate(reset everything) table
	$sql = "TRUNCATE profession";
	if (mysqli_query($conn, $sql)) {
    echo "Professions Table deleted successfully \n";
	} else {
		echo "Error deleting table: " . mysqli_error($conn);
	}

	/* INFORMATION TECHNOLOGY */
	$sql = "
		INSERT INTO profession (profession_field_id, profession_name)
		VALUES ($IT_field_id, ' ');
	";

	//loop through professions array and push into database
	foreach ($IT_professions as $prof){
			$sql .= "
		INSERT INTO profession (profession_field_id, profession_name)
		VALUES ($IT_field_id, '$prof');
	";
		
	}

	/* ENGINEERING AND TECHNOLOGY */
	$sql .= "
		INSERT INTO profession (profession_field_id, profession_name)
		VALUES ($engineering_field_id, ' ');
	";

	foreach ($engineering_professions as $prof){
			$sql .= "
		INSERT INTO profession (profession_field_id, profession_name)
		VALUES ($engineering_field_id, '$prof');
	";
		
	}

	if ($conn->multi_query($sql) === TRUE) {
		echo "New records created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>