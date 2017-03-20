<?php
#
#Ajax from myInbox.php
#
if(!file_exists('../../components/authentication.php')){
require '../components/authentication.php';
} else {
require '../../components/authentication.php';
}
if(!file_exists( '../../components/session-check.php')){
require '../components/session-check.php';
} else {
require '../../components/session-check.php';
} 
?>


<?php
include '../database/dbconnect.php';
if(isset($_POST['name']) && !empty($_POST['name'])){
    
    $strI = clean_input($_POST['name']);

    $strExplode = explode(" ", $strI);
    @$strF = "%".$strExplode[0]."%";
    @$strL = $StrExplode[1]."%";
    
} else {
    exit();
}
$sql = "
SELECT user_firstname, user_lastname, user_id
FROM users
WHERE (user_firstname LIKE '$strF'
AND user_lastname LIKE '$strL')
OR (user_lastname LIKE '$strF')
ORDER BY user_lastname
LIMIT 25
";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
    echo "<option id='".$row['user_id']."' value='".$row['user_firstname']." ".$row['user_lastname']."'></option>";
    }
} else {
    echo "0 results";
}


	function clean_input($data){
		//clean data to prevent sql injection
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
?>