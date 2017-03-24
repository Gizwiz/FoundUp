<?php
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
$receiver = $_POST['receivers'];
$subj = clean_input($_POST['subj']);
$msg = clean_input($_POST['msg']);
$user_username = $_SESSION['user_username'];
$user_id = "";
$receiver_mailbox_id = $sender_mailbox_id = "";
$msg = nl2br($msg);
$message_read = 0;
$sql = "
    SELECT user_id, user_username FROM users WHERE user_username = '$user_username'
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $user_id = $row['user_id'];
    }
}

//get sender's mailbox id

$sql = "
    SELECT users.user_id, users.user_username, mailbox.mailbox_id, mailbox.user_id
    FROM users
    INNER JOIN mailbox
    ON users.user_id = mailbox.user_id
    WHERE users.user_id = '$user_id'
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $sender_mailbox_id = $row['mailbox_id'];
    }
}

$stmt = $conn->prepare("INSERT INTO messages ( sender_mailbox_id, receiver_mailbox_id, message_subject, message_text)
	VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssss", $sender_mailbox_id, $receiver_mailbox_id, $subj, $msg);

//for each receiver create message
foreach($receiver as $rec){
    
    #get receiver's inbox id
    $sql = "
        SELECT users.user_id, mailbox.mailbox_id, mailbox.user_id
        FROM users
        INNER JOIN mailbox
        ON users.user_id = mailbox.user_id
        WHERE users.user_id = $rec
    ";
    
    $res = $conn->query($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
            $receiver_mailbox_id = $row['mailbox_id'];
        }
    }
    
	
	$stmt->execute();
	
}
$stmt->close();
$conn->close();
   
function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}


?>