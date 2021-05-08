<?php
include("include/config.php");
if($_REQUEST['submit']!="")
{
    $email = mysqli_real_escape_string($connection,strtolower(trim($_REQUEST['email'])));
    $password = mysqli_real_escape_string($connection,strtolower(trim($_REQUEST['password'])));

    $query = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
    $response = mysqli_query($connection,$query);

    if(mysqli_num_rows($response) > 0)
    {
        session_start();
        $row = mysqli_fetch_array($response);
        $_SESSION['username'] = $row['admin_email'];
        $_SESSION['password'] = $row['admin_password'];
        header("location:dashboard.php");
    }
    else
    {
        header("location:index.php?error=1");
    }
    mysqli_close($connection);
}
?>