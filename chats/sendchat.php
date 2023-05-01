<?php

include '../connection/dbconnect.php';
session_start();

$sessionID = $_SESSION['userid'];

if(isset($sessionID)) {
    $senderuser_id = $sessionID;
    $receiveruser_id = $_POST['receiveruser_id'];
    $message = $_POST['message'];

    $insertmess = $conn->prepare("INSERT INTO messages (senderuser_id, receiveruser_id, message)VALUES
                                ('$senderuser_id', '$receiveruser_id', '$message')");
    $insertmess->execute();
}else{
    header("Location: ../index.php");
}

?>