<?php
include 'include/session_validation.php';

include 'include/db.php';
session_start();
$id=$_REQUEST['id'];
$q="delete from lux_det where lux_id='$id'";
mysqli_query($conn,$q);
$q="delete from lux_pic where lux_id='$id'";
mysqli_query($conn,$q);
$q="delete from lux_service where lux_id='$id'";
mysqli_query($conn,$q);
$q="delete from lux_room where id ='$id'";
mysqli_query($conn,$q);
header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>