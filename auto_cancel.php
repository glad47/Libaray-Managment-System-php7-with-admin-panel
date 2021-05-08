<?php
include 'connect.php';
$date= date("Y-m-d");
$res=autoCancel($date);
while($row=mysqli_fetch_assoc($res)){
    $room_no=$row['id'];
    $isoccupied='0';
    $q="update one_room set isoccupied='$isoccupied' where id='$room_no'";
    mysqli_query($conn,$q);
    $q="select * from booking where room_id='$room_no'";
    $res=mysqli_query($conn,$q);
    $row=mysqli_fetch_assoc($res);
    $book_id=$row['id'];
    $q="delete from cus_book where book_id='$book_id'";
    mysqli_query($conn,$q);
    $q="delete from booking where id='$book_id'";
    mysqli_query($conn,$book_id);

}

?>