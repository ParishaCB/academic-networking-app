<?php

include '../connection/dbconnect.php';
session_start();

$sessionID = $_SESSION['userid'];

$senderuser_id = $sessionID;
$receiveruser_id = $_POST['receiveruser_id'];
$output = "";

$messagesquery = ("SELECT * FROM messages LEFT JOIN useraccounts ON useraccounts.userid = messages.senderuser_id
                             WHERE (senderuser_id = {$senderuser_id} AND receiveruser_id = {$receiveruser_id})
                            OR (senderuser_id = {$receiveruser_id} AND receiveruser_id = {$senderuser_id}) ORDER BY messageid");
$getmessages = $conn->query($messagesquery);
$messages = $getmessages->fetchAll(PDO::FETCH_ASSOC);

if($messages > 0) {
    foreach ($messages as $message) {
        if($message['senderuser_id'] === $senderuser_id) {
            $output .= '<div class="chatoutgoing">
                            <div class="details">
                                <p>'.$message['message'].'</p>
                            </div>
                        </div>';
        }else {
            $output .= '<div class="chatincoming">
                            <img src="/Educatic/'.$message['user_profile'].'" alt="" class="message-profile">
                            <div class="details">
                                <p>'.$message['message'].'</p>
                            </div>
                        </div>';
        }
    }
}else {
    $output .= '<div class="text">No Previous Messages Found. Start A New Conversation</div>';
}
echo $output;


?>