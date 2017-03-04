<?php require '../components/authentication.php' ?>
<?php require '../components/session-check.php' ?>
<?php include '../database/userdbconnect.php' ?>

<?php

$id=$_POST['id'];
$sql = "DELETE FROM works WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    include 'getWorksWithEditOption.php';
} else {
    echo "Error deleting record: " . $conn->error;
}


?>
