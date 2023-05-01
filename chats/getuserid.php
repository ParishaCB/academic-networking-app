<?php
include '../connection/dbconnect.php';
session_start();

$sessionID = $_SESSION['userid'];

$userid = $_GET['userid'];

$insmatch = "INSERT INTO matches (userid1, userid2) VALUES ('$sessionID', '$userid') ";
$conn->exec($insmatch);

header('Location: chat.php?userid='.$userid.'');
exit;
?>