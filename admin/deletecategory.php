<?php
include '../connection/dbconnect.php';
session_start();

$msg = '';

$admindeletecat=$conn->prepare("DELETE FROM categories where category_id=" . $_GET['category_id']);
$admindeletecat->execute();    

if($admindeletecat) {

    echo '<script type="text/javascript">alert("Category Deleted Successfully");window.location.assign("manageforum.php");</script>';

}else {
    echo $msg ("Database Not Available");
}
?>