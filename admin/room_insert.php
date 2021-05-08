<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['insert'])){
    $id=$_REQUEST['lux_id'];
    $c_in=$_REQUEST['c_in'];
    $c_out=$_REQUEST['c_out'];
    $isoccupied=$_REQUEST['isoccupied'];
    $q="insert into one_room(c_in,c_out,isoccupied) values ('$c_in','$c_out','$isoccupied')";
    mysqli_query($conn,$q);
    $room_no=mysqli_insert_id($conn);
    $q="insert into lux_one_room(lux_id,one_id) values ('$id','$room_no')";
    mysqli_query($conn,$q);
    header("location:room.php");


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

                <form role="form" method="post" action="room_insert.php">
                    <h4>Room Insert New Record</h4>
                    <div class="form-group">
                        <label>choose room Group</label>
                        <br>
                        <?php
                        $res2=getLux();
                        while($row2=mysqli_fetch_assoc($res2)){ ?>
                            <label><?php echo $row2['cat'];?></label>
                            <input type="radio" class="form-control" name="lux_id" value="<?php echo $row2['id'];?>" required>
                            <br>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Check In Date</label>
                        <input class="form-control"  placeholder="YYYY-MM-DD"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" size="35"
                               name="c_in"   required>
                    </div>
                    <div class="form-group">
                        <label>Ckeck Out Date</label>
                        <input  class="form-control"  placeholder="YYYY-MM-DD"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" size="35"
                                name="c_out"   required>
                    </div>

                       <label>isoccupied</label>
                    <br>
                        <label>yes</label>
                        <input type="radio" class="form-control" name="isoccupied" value="1" required>
                        <br>
                        <label>no</label>
                        <input type="radio" class="form-control" name="isoccupied" value="0" required>

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
