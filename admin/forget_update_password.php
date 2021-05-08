<?php
include'include/function.php';
include 'include/db.php';
if(!empty($_REQUEST['submit'])){
    $id=$_REQUEST['id'];
    $password=$_REQUEST['password'];
    $password2=$_REQUEST['password2'];
    $password=mysqli_real_escape_string($conn,$password);
    $password2=mysqli_real_escape_string($conn,$password2);
    if($password == $password2) {
$password=md5($password);

        $q = "update admin set password='$password' where id='$id'";
        mysqli_query($conn, $q);

                header("location:index.php");


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

    <title>Admin | reset password </title>

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
                    <h3 class="panel-title">Please enter the new password</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="forget_update_password.php">
                        <fieldset>
                            <?php  $id=$_REQUEST['id'];
                            ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Repeate Password" name="password2" type="password" autocomplete="off" required>
                            </div>
                                <!--    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div> -->
                                <!--  Change this to a button or input when using this as a form -->
                            <input type="hidden" name="id" value="<?php echo $id;?>" >

                            <input type="submit" value="Login" name="submit" class="btn btn-lg btn-success btn-block">
                                <!-- <input type="submit" value="Forget" name="forget" class="btn btn-lg btn-success btn-block"> -->
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
