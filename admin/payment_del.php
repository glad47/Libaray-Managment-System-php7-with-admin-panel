<?php
include 'include/session_validation.php';

include 'include/db.php';
session_start();
$id=$_REQUEST['id'];
$q="delete from payment where pay_id='$id'";
$q="delete from payment where id ='$id'";
mysqli_query($conn,$q);
header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>