<?php
include'include/function.php';
include 'include/db.php';

if(!empty($_REQUEST['submit'])){
    $to=$_REQUEST['email'];
    $to=mysqli_real_escape_string($conn,$to);

    $q="select * from admin where email='$to' LIMIT 1";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 1) {
        $row=mysqli_fetch_assoc($res);
        $id=$row['id'];
        $q="update admin set verified='0' where id='$id'";
        mysqli_query($conn,$q);
        $subject = "Email Verification";
        $message = "<a href='http://localhost/hotel/admin/forget_update_password.php?id=$id'>reset password</a>";
        $headers = "From:zizoo4949@yahoo.com" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            header("location:thankyou.php");
        } else {
            header("location:tryagain1.php");
        }
    }else{
        header("location:tryagain1.php");

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | forget password</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">enter the following</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="forget.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="enter your email" name="email" type="email" autocomplete="off" required autofocus>
                            </div>


                            <!--  Change this to a button or input when using this as a form -->
                            <input type="submit" value="send verivcation" name="submit" class="btn btn-lg btn-success btn-block">

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

</body>

</html>
