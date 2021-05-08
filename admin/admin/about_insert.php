<?php //include 'include/session_validation.php';
include'include/config.php';

if(!empty($_REQUEST['insert']))
{
//     $text = mysqli_real_escape_string($connection, $_REQUEST['text']);
    $name = $_REQUEST['name'];
    $dob = $_REQUEST['dob'];
    $add = $_REQUEST['add'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $zip = $_REQUEST['zip'];
    $text = $_REQUEST['text'];

    $query = "insert into about(name,dob,address,phone,email,zipcode,text)VALUES('$name','$dob','$add','$phone','$email','$zip','$text')";
    mysqli_query($con,$query);
    header('location:about.php');
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
                <a class="navbar-brand" href="index.html">Admin Pannel</a>
            </div>
            <!-- /.navbar-header -->
            <?php include('include/header_navebar.php'); ?>

            <!-- /.navbar-top-links -->

            <?php include('include/menu_bar.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" method="post" action="about_insert.php">
                        <h4>Insert New Record</h4>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label>DoB:</label>
                                <input class="form-control" name="dob" placeholder="Date of birth" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input class="form-control" name="add" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <input class="form-control" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <label>ZipCode:</label>
                                <input class="form-control" name="zip" placeholder="ZipCode" required>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <input class="form-control" name="text" placeholder="Description" required>
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
<?php
/**
 * Created by PhpStorm.
 * User: Mulawih
 * Date: 12/4/2019
 * Time: 8:38 PM
 */ 