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
include '../database/userdbconnect.php';

$id=clean_input($_POST['id']);

//sender info
$sql = "
    SELECT messages.message_id, messages.sender_mailbox_id, messages.message_subject, messages.message_text, messages.message_send_date, messages.message_read, mailbox.mailbox_id, mailbox.user_id, users.user_id, users.user_firstname, users.user_lastname, users.user_avatar
    FROM messages
    INNER JOIN mailbox
    ON messages.sender_mailbox_id = mailbox.mailbox_id
    INNER JOIN users
    ON mailbox.user_id = users.user_id
    WHERE messages.message_id = '$id'
";

$res=$conn->query($sql);

if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $avatar = $row['user_avatar'];
        $subject = $row['message_subject'];
        $message = $row['message_text'];
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $user_id = $row['user_id'];
        $message_id = $row['message_id'];
        $message_read = $row['message_read'];
    }
} else {
    
    exit;
}


echo "
    <div class='modal-header'>
        <div class='row'>
            <div class='col-xs-12'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
            </div>
        </div>
        
        <div class='row' style='text-align:center'>
            <div class='col-lg-2'>
                <img style='width:8em; height:8em;' src='".$avatar."'>
            </div>
            <div class='col-lg-6'>
                <h1>From: ".$firstname." ".$lastname."<h1> 
                <h2>Subject: ".$subject."</h2>
            </div>
            <div class='col-lg-2'>
                <form action='../shared/profile.php' method='post'>
                    <input type='hidden' name='user_id' value='".$user_id."'/>
                    <input type='submit' class='btn btn-default btn-lg' name='viewUserProfile' style='margin-top:13%;' value='View Profile'/>
                </form>
            </div>
                
       </div>
    </div>
    <div class='modal-body'>
        <div class='row'>
            <div class='col-xs-12 col-xs-offset-1'>
                <p>".$message."</p>
            </div
        </div>
    </div>
    
    <div class='modal-footer'>
            <button type='button' class='btn btn-default btn-lg' name='closeMessageModal' data-dismiss='modal'>Close</button
    </div>
";

//if message status is unread, update it to be read. Bool 0/1 where 0=unread, 1=read.
if($message_read == 0){
    $sql = "UPDATE messages SET message_read = 1 WHERE message_id = '$message_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Message marked as read";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}


?>