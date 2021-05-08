<?php
if(!empty($_REQUEST['login'])){
    header("location:dologin.php");
}
if(!empty($_REQUEST['signup.php'])){
    header("location:signup.php");
}
header("location:login.php");


?>