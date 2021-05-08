<?php
include 'include/db.php';
include 'include/session_validation.php';

session_start();
$id=$_REQUEST['id'];
$pic_id=$_REQUEST['pic_id'];
$page_id=$_REQUEST['page_id'];

$q="delete from com_pic_page where com_id ='$id' and pic_id='$pic_id'and page_id='$page_id' ";
mysqli_query($conn,$q);
$q="delete from comment where id ='$id'";
mysqli_query($conn,$q);
header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>