<?php
include 'include/db.php';
session_start();
$id=$_REQUEST['id'];
$room_no=$_REQUEST['room_no'];
$q="delete from one_room where id ='$id'";
mysqli_query($conn,$q);
$q="delete from lux_one_room where lux_id ='$id' and one_id='$room_no'";
mysqli_query($conn,$q);
header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>