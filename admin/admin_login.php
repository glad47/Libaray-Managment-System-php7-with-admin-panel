<?php
include'include/function.php';
include 'include/db.php';
if(!empty($_REQUEST['submit']))
{
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    $password=md5($password);

    $q = "SELECT * FROM admin WHERE username='$username' and  password='$password' and verified='1' LIMIT 1";
    $response = mysqli_query($conn,$q);

    if(mysqli_num_rows($response))
    {
        session_start();
        $row = mysqli_fetch_array($response);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['start']=time();
        header("location:dashboard.php");
    }
    else
    {
        header("location:index.php?error=1");
    }
    mysqli_close($conn);
}else{
    header("location:forget.php");
}
?>