<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $year=$_REQUEST['year'];
    $intro=$_REQUEST['intro'];
    $text=$_REQUEST['text'];
    $q="update history set year='$year',intro='$intro',text='$text' where id='$id'";
    mysqli_query($conn,$q);
    header("location:history.php");


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
        0            <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

                <form role="form" method="post" action="history_edit.php">
                    <h4>History Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $res=getHistory1($id);
                        $row=mysqli_fetch_assoc($res);
                        ?>

                        <div class="form-group">
                            <label>year</label>
                            <input class="form-control" name="year" value="<?php echo $row['year'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>intro</label>
                            <input class="form-control" name="intro" value="<?php echo $row['intro'];?>"  required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="text" value="<?php echo $row['text'];?>"  required>
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
