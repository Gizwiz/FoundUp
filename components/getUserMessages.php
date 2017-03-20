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

$sql = "
    SELECT users.user_id, users.user_username, mailbox.user_id, mailbox.mailbox_id, messages.sender_mailbox_id, messages.receiver_mailbox_id, messages.message_id, messages.message_subject, messages.message_text, messages.message_send_date, messages.message_read
    FROM users
    INNER JOIN mailbox
    ON users.user_id = mailbox.user_id
    INNER JOIN messages
    ON mailbox.mailbox_id = messages.receiver_mailbox_id
    WHERE users.user_username = '$user_username'
    ORDER BY message_send_date DESC LIMIT 50
";

$res = $conn->query($sql);

if($res->num_rows>0){
    while ($row=$res->fetch_assoc()){
        $sender = $row['sender_mailbox_id']."<br>";
        $subject = $row['message_subject'];
        $time = $row['message_send_date'];
        $messageId = $row['message_id'];
        $message_read = $row['message_read'];
        
        $sql = "SELECT messages.sender_mailbox_id, mailbox.mailbox_id, mailbox.user_id, users.user_id, users.user_firstname, users.user_lastname, users.user_avatar_small
            FROM messages
            INNER JOIN mailbox
            ON messages.sender_mailbox_id=mailbox.mailbox_id
            INNER JOIN users
            ON mailbox.user_id=users.user_id
            WHERE messages.sender_mailbox_id = '$sender'
        ";
        $resB = $conn->query($sql);
        if($resB->num_rows>0){
            while ($row=$resB->fetch_assoc()){
                $senderFirstname = $row['user_firstname'];
                $senderLastname = $row['user_lastname'];
                $sender_avatar = $row['user_avatar_small'];
            }
        } else {
            echo "Error";
        }
        
        if($message_read == 1){
        echo"
        <div class='row messageRowRead' id='".$messageId."' onclick='getMessageContent(this.id)'>
            <div class='col-xs-1'><input type='checkbox' value='".$messageId."'></div>
            <div class='col-xs-3' data-toggle='modal' data-target='#messageContentModal'><img src='".$sender_avatar."' alt=''><p>".$senderFirstname.' '.$senderLastname."</p></div>
            <div class='col-xs-4' data-toggle='modal' data-target='#messageContentModal'><p>".$subject."</p></div>
            <div class='col-xs-4' data-toggle='modal' data-target='#messageContentModal'><p>".$time."</p></div> 
        </div>
            ";
        } else {
        echo"
            <div class='row messageRowUnread' id='".$messageId."' onclick='getMessageContent(this.id)'>
            <div class='col-xs-1'><input type='checkbox' value='".$messageId."'></div>
            <div class='col-xs-3' data-toggle='modal' data-target='#messageContentModal'><img src='".$sender_avatar."' alt=''><p>".$senderFirstname.' '.$senderLastname."</p></div>
            <div class='col-xs-4' data-toggle='modal' data-target='#messageContentModal'><p>".$subject."</p></div>
            <div class='col-xs-4' data-toggle='modal' data-target='#messageContentModal'><p>".$time."</p></div> 
        </div>
        ";
        }
        
    }
} else {
    echo "No Messages";
}




?>