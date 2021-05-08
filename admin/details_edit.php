<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';

if(!empty($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $cat=$_REQUEST['cat'];
    $bed=$_REQUEST['bed'];
    $occupancy=$_REQUEST['occupancy'];
    $size=$_REQUEST['size'];
    $view=$_REQUEST['view'];
    $ensuite=$_REQUEST['ensuite bathroom'];
    $free=$_REQUEST['free wifi'];
    $breakfast=$_REQUEST['breakfast included'];
    $gym=$_REQUEST['gym access'];
    $airport=$_REQUEST['free airport pickup'];
    $room=$_REQUEST['room service'];
    $q="update details set cat='$cat',bed='$bed',occupancy='$occupancy',size='$size',
  view='$view',ensuite_bathroom='$ensuite',free_wifi='$free',breakfast_included='$breakfast', gym_access='$gym',
  free_airport_pickup='$airport',room_service='$room'where id='$id'";
    mysqli_query($conn,$q);
    header("location:details.php");


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

                <form role="form" method="post" action="details_edit.php">
                    <h4>Details Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $res=getDet1($id);
                        $row=mysqli_fetch_assoc($res);
                        ?>

                        <div class="form-group">
                            <label>Group</label>
                            <input class="form-control" name="cat" value="<?php echo $row['cat'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>bed</label>
                            <input class="form-control" name="bed" value="<?php echo $row['bed'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>occupancy</label>
                            <input  class="form-control" name="occupancy" value="<?php echo $row['occupancy'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>size</label>
                            <input class="form-control" name="size" value="<?php echo $row['size'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>view</label>
                            <input class="form-control" name="view" value="<?php echo $row['view'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>ensuite bathroom</label>
                            <input class="form-control" name="ensuite bathroom" value="<?php echo $row['ensuite_bathroom'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>free wifi</label>
                            <input  class="form-control" name="free wifi" value="<?php echo $row['free_wifi'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>breakfast included</label>
                            <input class="form-control" name="breakfast included" value="<?php echo $row['breakfast_included'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>gym access</label>
                            <input class="form-control" name="gym access" value="<?php echo $row['gym_access'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>free airport pickup</label>
                            <input class="form-control" name="free airport pickucp" value="<?php echo $row['free_airport_pickup'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>room service</label>
                            <input  class="form-control" name="room service" value="<?php echo $row['room_service'];?>"  required>
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
