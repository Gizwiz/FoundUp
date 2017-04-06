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
$user_mailbox_id = "";
$receiver_mailbox_id = "";


//get user_id
$sql = "SELECT user_id FROM users WHERE user_username = '$user_username'";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $user_id=$row['user_id'];
    }
} else {
    echo "0 Results";
}

//get user mailbox id
$sql = "SELECT mailbox_id FROM mailbox where user_id = '$user_id'";
$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $user_mailbox_id=$row['mailbox_id'];
    }
} else {
    echo "0 Results";
}

//get all messages where sender_mailbox_id = user_mailbox_id;
$sql = "SELECT message_id, message_subject, message_text, message_send_date, receiver_mailbox_id FROM messages WHERE sender_mailbox_id = $user_mailbox_id ORDER BY message_send_date DESC";
$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){      
        $subject = $row['message_subject'];
        $time = $row['message_send_date'];
        $message_id = $row['message_id'];
        $receiver_mailbox_id=$row['receiver_mailbox_id'];
        
        //get receiver information
        $sql = "SELECT users.user_id, users.user_firstname, users.user_lastname, users.user_avatar_small, mailbox.mailbox_id
            FROM users
            INNER JOIN mailbox
            ON mailbox.user_id = users.user_id
            INNER JOIN messages
            ON messages.receiver_mailbox_id = mailbox.mailbox_id
            WHERE messages.receiver_mailbox_id = '$receiver_mailbox_id'
        ";
        $resB = $conn->query($sql);
        if($resB->num_rows>0){
            while($row=$resB->fetch_assoc()){
                $receiver_firstname = $row['user_firstname'];
                $receiver_lastname = $row['user_lastname'];
                $receiver_avatar = $row['user_avatar_small'];
            }
        }else {
            echo "Error getting receiver's information";
        }
        
        echo"
        <div class='row messageRowRead' id='".$message_id."' onclick='getMessageContent(this.id)'>
            <div class='col-xs-1'><input type='checkbox' value='".$message_id."'></div>
            <div class='col-xs-3' data-toggle='modal' data-target='messageContentModal'><img src='".$receiver_avatar."' alt=''><p>".$receiver_firstname.' '.$receiver_lastname."</p></div>
            <div class='col-xs-4' data-toggle='modal' data-target='messageContentModal'><p>".$subject."</p></div>
            <div class='col-xs-4' data-toggle='modal' data-target='messageContentModal'><p>".$time."</p></div>
        </div>
        ";  


    }
} else {
    echo "0 Results";
}

?>