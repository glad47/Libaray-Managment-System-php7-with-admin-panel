<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['update'])){
    $old_id=$_REQUEST['old_id'];
    $old_room_no=$_REQUEST['old_room_no'];
    $id=$_REQUEST['lux_id'];
    $room_no=$_REQUEST['room_no'];
    $c_in=$_REQUEST['c_in'];
    $c_out=$_REQUEST['c_out'];
    $isoccupied=$_REQUEST['isoccupied'];
    $q="update one_room set id='$room_no',c_in='$c_in',c_out='$c_out',isoccupied='$isoccupied' where id='$old_room_no'";
    mysqli_query($conn,$q);
    $q="update lux_one_room set lux_id='$id',one_id='$room_no' where lux_id='$old_id' and one_id='$old_room_no'";
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

                <form role="form" method="post" action="room_edit.php">
                    <h4>Room Updating</h4>
                    <div class="modal-body">
                        <?php
                        $old_id=$_REQUEST['id'];
                        $old_room_no=$_REQUEST['room_no'];
                        $res=getRoom1($old_room_no);
                        $row=mysqli_fetch_assoc($res);
                        ?>

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
                            <label>Change the room no:</label>
                            <input class="form-control" name="room_no" value="<?php echo $row['room_no'];?>"  required>
                        </div>

                        <div class="form-group">
                            <label>Check In Date</label>
                            <input class="form-control"  placeholder="YYYY-MM-DD"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" size="35"
                                   name="c_in" value="<?php echo $row['c_in'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>Ckeck Out Date</label>
                            <input  class="form-control"  placeholder="YYYY-MM-DD"  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" size="35"
                                    name="c_out" value="<?php echo $row['c_out'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>isoccupied</label>
                            <?php if($row['isoccupied'])
                                $status='yes';
                            else
                                $status='no';
                            ?>
                            <input class="form-control" value="<?php echo $status; ?>"  readonly>
                            <br>
                            <label>yes</label>
                            <input type="radio" class="form-control" name="isoccupied" value="1" required>
                            <br>
                            <label>no</label>
                            <input type="radio" class="form-control" name="isoccupied" value="0" required>


                        </div>

                    </div>
                    <input type="hidden" name="old_id" value="<?php echo $old_id; ?>" >
                    <input type="hidden" name="old_room_no" value="<?php echo $old_room_no; ?>" >
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
