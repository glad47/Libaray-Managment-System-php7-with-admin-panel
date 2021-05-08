<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';
session_start();
if(!empty($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $location=$_REQUEST['location'];
    $manager_id=$_REQUEST['search'];
    $q="update facilities set name='$name',location='$location',manager_id='$manager_id' where id='$id'";
    mysqli_query($conn,$q);
    header("location:facilities.php");


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

                <form role="form" method="post" action="facilities_edit.php">
                    <h4>Facilities Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $res=getFac1($id);
                        $row=mysqli_fetch_assoc($res);
                        ?>
                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control" name="name" value="<?php echo $row['name'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>location</label>
                            <input class="form-control" name="location" value="<?php echo $row['location'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>manger_id</label>
                            <input class="form-control" name="manger_id" value="<?php echo $row['manager_id'];?>"  readonly>
                        </div>

                        <div class="form-group">
                            <label>new manager</label>

                                <input type="text" class="form-control" name="search" placeholder="select an id..."   onkeydown="searchq1();" required>
                        </div>
                        <div id="output">

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>

<script type="text/javascript">
    function searchq1(){
        var searchTxt=$("input[name='search']").val();
        $.post("search_edit_facilities.php?id=<?php echo $row['id'];?>",{searchVal:searchTxt},function(data){
                $("#output").html(data);
            }
        );
    }
</script>
    </body>
    </html>

