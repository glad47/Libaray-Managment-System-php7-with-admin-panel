<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['insert'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];
    $email = $_REQUEST['email'];
    if (strlen($username) < 5) {
        $error = "<p>Your username must be at least 5 characters</p>";
    } else if ($password != $password2) {
        $error .= "<p>Your passwords do not match</p>";
    } else {
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $email = mysqli_real_escape_string($conn, $email);
        $vkey = md5(time() . $username);
        $password = md5($password);
            $to = $email;
            $subject = "Email Verification";
            $message = "<a href='http://localhost/hotel/admin/registeration_verified.php?vkey=$vkey'>Register account</a>";
            $headers = "From:zizoo4949@yahoo.com" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
            if (mail($to, $subject, $message, $headers)) {
                $q = "insert into admin(username,email,password,vkey,verified) values ('$username','$email','$password','$vkey','0')";
                $res = mysqli_query($conn, $q);
                header("location:thankyou.php");
            } else {
                header("location:tryagain.php");
            }

        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="text" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            session_start();
            $username=$_SESSION['username'];

            ?>
            <a class="navbar-brand" href="index.html">Admin Pannel<?php echo $username ?>
            </a>
        </div>
        <!-- /.navbar-header -->
        <?php include('include/header_navebar.php'); ?>

        <!-- /.navbar-top-links -->

        <?php include('include/menu_bar.php'); ?>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        0            <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

                <form role="form" method="post" action="admin_profile_insert.php">
                    <h4>Admin New account</h4>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>username</label>
                            <input class="form-control" name="username" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" class="form-control" name="email" placeholder="email"  required>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="password" class="form-control" name="password" placeholder="password"  required>
                        </div>
                        <div class="form-group">
                            <label>repeate password</label>
                            <input  type="password" class="form-control" name="password2" placeholder="repeate password"  required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Insert" name="insert">
                    </div>
                </form>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>

</body>

</html>
