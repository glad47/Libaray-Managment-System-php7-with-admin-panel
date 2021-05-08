<?php //include 'include/session_validation.php'; ?>
<?php include'include/function.php';
include 'include/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px">
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
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            About Us Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!--<div class="table-responsive">-->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="40">Sr #</th>
                                            <th>Name</th>
                                            <th>DoB</th>
                                            <th>Email</th>
                                            <th>Add</th>
                                            <th>Phone</th>
                                            <th>Zip</th>
                                            <th>text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										$i=1;
										$res=getName1();
//                                        mysqli_num_rows($query);
										while($row=mysqli_fetch_assoc($query)){?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['dob'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['zipcode'];?></td>
                                            <td><?php echo $row['text'];?></td>
                                            <td><?php echo $row['web'];?></td>

                                            <td>
                                            	<a href="about_edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-circle" title="Edit">Edit</a>
                            					<a href="about_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to proceed?')" class="btn btn-danger btn-circle" title="Delete">Delete</a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            <!--</div>-->
                            <!-- /.table-responsive -->
                            <div class="panel-body">
                                <a href="about_insert.php" type="button" class="btn btn-primary">Add New</a>

                                <!--<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#about" value="Add New">-->
                                <!-- Modal -->
                                <?php //include('include/model.php');?>
                            <!-- /.modal -->
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
