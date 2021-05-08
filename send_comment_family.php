<?php
include 'function.php';
include 'connect.php';
session_start();
if(!empty($_REQUEST['submit'])){
    $page_id=$_REQUEST['page_id'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $comment=$_REQUEST['comment'];
    $q="insert into comment(text,name,email) values('$comment','$name','$email')";
    mysqli_query($conn,$q);
    $com_id=mysqli_insert_id($conn);
    $pic_id='4';  //defualt user
    $q="insert into com_pic_page(com_id,pic_id,page_id) values ('$com_id','$pic_id','$page_id')";
    mysqli_query($conn,$q);
    header("location:".$_SERVER['HTTP_REFERER']);
}





?>