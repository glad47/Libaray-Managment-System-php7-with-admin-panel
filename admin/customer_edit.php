<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $age=$_REQUEST['age'];
    $gender=$_REQUEST['gender'];
    $email=$_REQUEST['email'];
    $phone_no=$_REQUEST['phone_no'];
    $acc_no=$_REQUEST['acc_no'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $more=$_REQUEST['more'];
    $username=mysqli_real_escape_string($conn,$username);
    $password=mysqli_real_escape_string($conn,$password);
    $name=mysqli_real_escape_string($conn,$name);
    $age=mysqli_real_escape_string($conn,$age);
    $gender=mysqli_real_escape_string($conn,$gender);
    $email=mysqli_real_escape_string($conn,$email);
    $phone_no=mysqli_real_escape_string($conn,$phone_no);
    $acc_no=mysqli_real_escape_string($conn,$acc_no);
    $more=mysqli_real_escape_string($conn,$more);
    $q="select * from customer where username='$username' or email='$email'";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 1){
        header("location:taken.php");

    }else{
        $vkey=md5(time().$username);
        $password=md5($password);
        $q="update customer set name='$name',age='$age',gender='$gender',email='$email',phone_no='$phone_no',acc_no='$acc_no'
,username='$username',password='$password',more='$more',vkey='$vkey',verified='1' where id='$id'";
        mysqli_query($conn,$q);
        header("location:customer.php");

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

                <form role="form" method="post" action="customer_edit.php">
                    <h4>Customer Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $res=getCus1($id);
                        $row=mysqli_fetch_assoc($res);
                        ?>

                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control" name="name" value="<?php echo $row['name'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>age</label>
                            <input class="form-control" name="age" value="<?php echo $row['age'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>gender</label>
                            <input  class="form-control" name="gender" value="<?php echo $row['gender'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>phone_no</label>
                            <input class="form-control" name="phone_no" value="<?php echo $row['phone_no'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>acc_no</label>
                            <input  class="form-control" name="acc_no" value="<?php echo $row['acc_no'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>username</label>
                            <input class="form-control" name="username" value="<?php echo $row['username'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input  class="form-control" name="acc_no" value="<?php echo $row['password'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>more</label>
                            <input class="form-control" name="more" value="<?php echo $row['more'];?>"  >
                        </div>

                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Update" name="update">
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
