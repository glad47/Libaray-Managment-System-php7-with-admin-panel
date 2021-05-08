<?php
include 'include/session_validation.php';
include'include/function.php';
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
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <!-- start -->
                    <div class="panel-heading">
                        Comments Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!--<div class="table-responsive">-->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th width="40">Sr #</th>
                                <th>author</th>
                                <th>comment</th>
                                <th>pic_name</th>
                                <th>page_name</th>


                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $res=getComment(); ?>
                            <?php
                            $i=1;
                            while($row=mysqli_fetch_assoc($res)){
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['text']; ?></td>
                                <td><?php echo $row['pic_name']; ?></td>
                                <td><?php echo $row['page_name']; ?></td>

                                <td>
                                    <a href="comment_edit.php?id=<?php echo $row['id']; ?>&amp;pic_id=<?php echo $row['pic_id']; ?>&amp;page_id=<?php echo $row['page_id']; ?>"
                                       class="btn btn-warning btn-circle" title="Edit">Edit</a>
                                    <a href="comment_del.php?id=<?php echo $row['id']; ?>&amp;pic_id=<?php echo $row['pic_id']; ?>&amp;page_id=<?php echo $row['page_id']; ?>" onclick="return confirm('Are you sure to proceed?')" class="btn btn-danger btn-circle" title="Delete">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        <!--</div>-->
                        <!-- /.table-responsive -->
                        <div class="panel-body">
                            <a href="comment_insert.php" type="button" class="btn btn-primary">Add New</a>

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
