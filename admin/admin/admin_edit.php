<?php
include_once 'include/session_validation.php';

if(!empty($_POST['submit_admin']))
{
	$admin_email = mysqli_real_escape_string($connection,$_REQUEST['admin_email']);
	$admin_password = mysqli_real_escape_string($connection,$_REQUEST['admin_password']);
    mysqli_query($connection,"UPDATE  admin SET admin_email='$admin_email', admin_password='$admin_password' where admin_id='".$_REQUEST['admin_id']."'");
	header('location:admin_profile.php');
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

    <title>Admin | ikouriers</title>

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
			<?php include('include files/header_navebar.php'); ?>
            
            <!-- /.navbar-top-links -->

            <?php include('include files/menu_bar.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Product
                             <?php 
										$i=1;
										$query = mysqli_query($connection,"SELECT * FROM admin WHERE admin_id='".$_REQUEST['id']."'");
										$row=mysqli_fetch_array($query);
									?>
                             <form role="form" method="post" action="admin_edit.php" >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" value="<?php echo $row['admin_email'];?>" class="form-control" placeholder="Enter Name" name="admin_email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="text" value="<?php echo $row['admin_password'];?>" class="form-control" placeholder="Enter Name" name="admin_password" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="admin_id" value="<?php echo $row['admin_id'];?>">
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success" value="Save" name="submit_admin">
                                    </div>
                              </form>
                        </div>
                        </div>
                        <!-- /.panel-body -->
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
