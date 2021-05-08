<?php
include 'connect.php';
error_reporting(0);
session_start();

if(($_SESSION['username'])=="" || ($_SESSION['password'])=="")
{
    header("location:login.php?code=1");
}
/* session will be expire in 30 minuts */
if(!empty($_SESSION['username']) and !empty($_SESSION['password'])) {
    session_cache_expire(30);
    $inactive = 1800;
    if (isset($_SESSION['start'])) {
        $session_life = time() - $_SESSION['start'];
        if ($session_life > $inactive) {
            header("Location:logout.php");
        }
    }
}
/* on reloading the page, current time will be saved in the session */
$_SESSION['start'] = time();
