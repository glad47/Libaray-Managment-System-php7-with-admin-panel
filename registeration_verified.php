<?php
include'function.php';
include 'connect.php';

if(isset($_REQUEST['vkey'])){
    $vkey=$_REQUEST['vkey'];
    $q="select verified,vkey from customer where verified='0' and vkey='$vkey' LIMIT 1 ";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 1){
        $vkey2=md5($vkey);
        $q="update customer set verified='1',vkey='$vkey2' where vkey='$vkey'";
        mysqli_query($conn,$q);
       header("location:login.php");
    }else{
        header("location:already.php");

    }
}

?>