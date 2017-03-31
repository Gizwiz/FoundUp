<?php

if(!file_exists ('../components/authentication.php')){
	 require 'authentication.php';
}else {
	require '../components/authentication.php';
}
if(!file_exists ('../components/session-check.php')){
	require 'session-check.php';
} else {
	require '../components/session-check.php';
}
if(!file_exists ('../../database/userdbconnect.php')){
	require '../database/userdbconnect.php';
} else {
	require '../../database/userdbconnect.php';
}
   ?>

<?php

$user_username = $_SESSION['user_username'];
$user_id = "";

#get user id
$sql = "
    SELECT user_id, user_username FROM users WHERE user_username = '$user_username'
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $user_id = $row['user_id'];
    }
}

#get messages where sender_mailbox_id = mailbo_user_id = user_id
$sql = "
    SELECT users.user_id, users.user_username, mailbox.mailbox_id, mailbox.user_id
    FROM users
    INNER JOIN mailbox
    ON users.user_id = mailbox.user_id
	INNER JOIN messages
    WHERE users.user_id = '$user_id'
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $sender_mailbox_id = $row['mailbox_id'];
    }
}

$stmt = $conn->prepare("SELECT user.
?>