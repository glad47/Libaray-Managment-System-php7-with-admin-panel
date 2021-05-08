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
    $address=$_REQUEST['address'];
    $salary=$_REQUEST['salary'];
    $join_date=$_REQUEST['join_date'];
    $qualification=$_REQUEST['qualification'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $facilities_id=$_REQUEST['facilities_new_id'];

    $q="update employee set name='$name',age='$age',gender='$gender',email='$email',
phone_no='$phone_no',acc_no='$acc_no',address='$address',salary='$salary',
join_date='$join_date',qualification='$qualification',username='$username',
 password='$password',facilities_id='$facilities_id' where id='$id'";
    mysqli_query($conn,$q);
    header("location:employee.php");


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

                <form role="form" method="post" action="employee_edit.php">
                    <h4>Employee Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $res=getEmp1($id);
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
                            <input class="form-control" name="phone_no" value="<?php echo $row['phone_no'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>acc_no</label>
                            <input class="form-control" name="acc_no" value="<?php echo $row['acc_no'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>address</label>
                            <input  class="form-control" name="address" value="<?php echo $row['address'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>salary</label>
                            <input class="form-control" name="salary" value="<?php echo $row['salary'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>join_date</label>
                            <input type="date" class="form-control" name="join_date" value="<?php echo $row['join_date'];?>" required>
                        </div>

                        <div class="form-group">
                            <label>qualification</label>
                            <input  class="form-control" name="institute" value="<?php echo $row['qualification'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>username</label>
                            <input class="form-control" name="username" value="<?php echo $row['username'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control" name="password" value="<?php echo $row['password'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>facilities_id</label>
                            <input class="form-control" name="facilities_id" value="<?php echo $row['facilities_id'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>facilities</label>
                            <input class="form-control" name="facilities_id" value="<?php  mysqli_fetch_assoc(getFac1($row['facilities_id']))['name'] ?>" readonly>
                        </div>


                        <div class="form-group">
                            <label>facilities</label>
                       <?php $res2=getFac();
                      while( $row2=mysqli_fetch_assoc($res2)){
                       ?>
                          <span><?php echo $row2['name'];?></span>
                            <input type="radio" class="form-control" name="facilities_new_id" value="<?php echo $row2['id'];?>"  required>
                          <br>
                          <?php  } ?>
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
