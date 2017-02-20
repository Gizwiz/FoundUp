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

include 'userdatabase.sql';

if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo "Connection closed, ready to go!";
?> 