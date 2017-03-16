<?php require 'authentication.php' ?>
<?php require 'session-check.php' ?>
<?php include '../database/userdbconnect.php' ?>

<?php
    
    $receiver = $_POST['receiver']; 
    $sender = $_SESSION['user_username'];
    $strExploded = explode(" ", $receiver);
    @$strF = clean_input($strExploded[0]);
    @$strL = clean_input($strExploded[1]);
    $subj = clean_input($_POST['subj']);
    $msg = nl2br(htmlentities($_POST['msg'], ENT_QUOTES));
    
    $receiver_id = $sender_id = $sender_mailbox_id = $receiver_mailbox_id = "";

    //receiver user id
@$sql = "
    SELECT user_id FROM user WHERE (user_firstname = '$strF' AND user_lastname = '$strL')
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $receiver_id = $row["user_id"]; 
    }
}

//receiver inbox id
$sql = "
    SELECT mailbox.mailbox_id, mailbox.user_id, user.user_id, user.user_firstname, user.user_lastname 
    FROM mailbox
    INNER JOIN user
    ON mailbox.user_id = user.user_id
    WHERE user.user_id = '$receiver_id'
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $receiver_mailbox_id = $row["mailbox_id"]; 
    }
} else {
    echo "<br>Error: Message could not be sent: Receiver Was Not Found &nbsp;<button class='btn btn-default btn-md' style='color:green' onclick=hideErrMsg()><span class='glyphicon glyphicon-ok'</span></button>";
}

//sender id
    $uname = $_SESSION['user_username'];
$sql = "
    SELECT user_id FROM user WHERE user_username= '$uname' 
";

$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $sender_id = $row["user_id"]; 
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//sender inbox id
$sql="
    SELECT mailbox.mailbox_id, mailbox.user_id, user.user_id, user.user_firstname, user.user_lastname 
    FROM mailbox
    INNER JOIN user
    ON mailbox.user_id = user.user_id
    WHERE user.user_id = '$sender_id'
    ";
$res = $conn->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $sender_mailbox_id = $row["mailbox_id"]; 
    }
}


$sql = "
    INSERT INTO messages (sender_mailbox_id, receiver_mailbox_id, message_subject, message_text, message_send_date, message_read)
    VALUES ('$sender_mailbox_id','$receiver_mailbox_id','$subj','$msg',CURRENT_TIMESTAMP, 0)
";
if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green'>Message Sent successfully</p>";
}

$conn->close();

function clean_input($data){
    //clean data to prevent sql injection
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;	
}
?>