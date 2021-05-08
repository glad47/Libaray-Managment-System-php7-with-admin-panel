<?php
include 'include/session_validation.php';
include'include/function.php';

include 'include/db.php';
session_start();
$id=$_REQUEST['id'];

$q="delete from cus_feed where cus_id='$id'";
mysqli_query($conn,$q);

$q="delete from cus_pay where cus_id='$id'";
mysqli_query($conn,$q);

$res=getBookCus1($id);
while($row=mysqli_fetch_assoc($res)){
$room_no=$row['room_no'];
$book_id=$row['book_id'];
    $isoccupied='0';
    $q="update one_room set isoccupied='$isoccupied' where id='$room_no'";
    mysqli_query($conn,$q);

    $q="delete from cus_book where book_id='$book_id'";
    mysqli_query($conn,$q);

    $q="delete from booking where id='$book_id'";
    mysqli_query($conn,$q);
}


$q="delete from customer where id ='$id'";
mysqli_query($conn,$q);

header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>