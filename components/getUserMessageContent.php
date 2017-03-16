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
    SELECT messages.message_id, messages.sender_mailbox_id, messages.message_subject, messages.message_text, messages.message_send_date, messages.message_read, mailbox.mailbox_id, mailbox.user_id, user.user_id, user.user_firstname, user.user_lastname, user.user_avatar
    FROM messages
    INNER JOIN mailbox
    ON messages.sender_mailbox_id = mailbox.mailbox_id
    INNER JOIN user
    ON mailbox.user_id = user.user_id
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
    }
}

echo "
    <div class='modal-header'>

        <div class='col-xs-12'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <img style='float:left;width:6em; height:6em;display:inline-block;margin-top 20%;margin-right: 3%;' src='".$avatar."'>
            <h1 style='display:inline-block'>From: ".$firstname." ".$lastname."<h1>
            <h2 style='display:inline-block'>Subject: ".$subject."</h2>
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
            <form action='../shared/profile.php' method='post' style='display:inline-block width:55%;'>
                <input type='hidden' name='user_id' value='".$user_id."'/>
                <input type='submit' class='btn btn-default btn-lg' name='viewUserProfile' style='margin-top:2%;' value='View Profile'/>
                <input type='' class='btn btn-default btn-lg' name='closeMessageModal' value='Close' data-dismiss='modal'/>
            </form>
    </div>
";

function clean_input($data){
	//clean data to prevent sql injection
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;	
}


?>