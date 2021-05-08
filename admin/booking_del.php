
<?php
include 'include/session_validation.php';

include 'include/db.php';
session_start();

$book_id=$_REQUEST['book_id'];
$q="select * from booking where id='$book_id'";
$res=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($res);
$room_no=$row['room_id'];

$isoccupied='0';
$q="update one_room set isoccupied='$isoccupied' where id='$room_no'";
mysqli_query($conn,$q);

$q="delete from cus_book where book_id='$book_id'";
mysqli_query($conn,$q);

$q="delete from booking where id='$book_id'";
mysqli_query($conn,$q);
header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>