<?php
session_start();
error_reporting(0);
include('config.php');
if(($_SESSION['username'])=="" || ($_SESSION['password'])=="")
{
    header("location:index.php?code=1");
}
/* session will be expire in 60 minuts */
session_cache_expire(60);
$inactive = 3600;
if(isset($_SESSION['start'])) {
    $session_life = time() - $_SESSION['start'];
    if($session_life > $inactive){
        header("Location: admin_logout.php");
    }
}
/* on reloading the page, current time will be saved in the session */
$_SESSION['start'] = time();
