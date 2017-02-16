<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdatabase";




// Create connection
echo "Connecting to MySQL...";
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";


echo "Checking if user database exists...<br>";
//create DB
$sql = "CREATE DATABASE IF NOT EXISTS userdatabase";
if ($conn->query($sql) === TRUE) {
    echo "User database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
echo "Closing connection...<br>";
echo "Connecting to userdatabase...<br>";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

echo "Creating User table if not already existing...<br>";

$sql = "CREATE TABLE IF NOT EXISTS User (

	 user_id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	 user_email varchar(255),
	 user_password varchar(255),
	 user_firstname varchar(64),
	 user_lastname varchar(64),
	 user_phonenumber text,
	 user_username varchar (255),
	 user_avatar varchar(255),
	 user_bio text,
	 user_dob date,
	 user_profession text,
	 user_gender varchar(32),
	 user_maritalstatus varchar(32),
	 user_address text,
	 user_joindate date,
	 user_country varchar(255)

)";


if ($conn->query($sql) === TRUE) {
    echo "Table 'User' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

echo "Inputting preset data<br>";
$sql = "INSERT INTO user (
user_email, 
user_firstname, 
user_lastname
)

VALUES 
(
'Kana@Kana.fi', 
'Kana',
'Kanamaa'
)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo "Connection closed, ready to go!";
?> 