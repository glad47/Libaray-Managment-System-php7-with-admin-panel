<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $title=$_REQUEST['title'];
    $price=$_REQUEST['price'];
    $link=$_REQUEST['link'];
    $text=$_REQUEST['text'];
    $adv=$_REQUEST['adv'];
    $q="update lux_room set title='$title',price='$price',link='$link',text='$text',adv='$adv' where id='$id'";
    mysqli_query($conn, $q);
    $det_id=$_REQUEST['det_id'];

    $q="update lux_det set det_id='$det_id' where lux_id='$id'";
    mysqli_query($conn, $q);
    $q="delete from lux_service where lux_id='$id'";
    mysqli_query($conn, $q);
    $ser=$_REQUEST['ser'];

    for($i=0;$i<sizeof($ser);$i++){
        $service_id = $ser[$i];
        $q = "INSERT INTO lux_service (lux_id, service_id) VALUES ('$id', '$service_id');";
        mysqli_query($conn, $q);
    }
    $pic_name=$_REQUEST['pic_name'];
    $q="select * from pic where name='$pic_name'";
    $res=mysqli_query($conn,$q);

    $count=mysqli_num_rows($res);
    if($count==1){
        $row=mysqli_fetch_assoc($res);
        $pic_id=$row['id'];

    }else{
        $q="insert into pic(name)values('$pic_name')";
        mysqli_query($conn,$q);
        $pic_id=mysqli_insert_id($conn);
        $q="insert into lux_pic(lux_id,pic_id) values('$id','$pic_id')";
        mysqli_query($conn, $q);

    }

    header("location:lux_room.php");
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

                <form role="form" method="post" action="lux_room_edit.php">
                    <h4>LUX ROOM Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $res=getLux1($id);
                        $row=mysqli_fetch_assoc($res);
                        ?>

                        <div class="form-group">
                            <label>tilte</label>
                            <input class="form-control" name="title" value="<?php echo $row['title'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input class="form-control" name="price" value="<?php echo $row['price'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>link</label>
                            <input  class="form-control" name="link" value="<?php echo $row['link'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="text" value="<?php echo $row['text'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>Advertisement</label>
                            <input class="form-control" name="adv" value="<?php echo $row['adv'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>Details:</label>
                        <?php $res2=getDet();
                        while($row2=mysqli_fetch_assoc($res2)){ ?>
                            <label><?php echo $row2['cat'];?></label>
                            <input type="radio" class="form-control" name="det_id" value="<?php echo $row2['id'];?>"  required>
                            <br>
                     <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Details:</label>
                        <?php $res3=getRoomSer();
                        while($row3=mysqli_fetch_assoc($res3)){ ?>
                            <label><?php echo $row3['name'];?></label>
                            <input type="checkbox" class="form-control" name="ser[]" value="<?php echo $row3['id'];?>"  >
                            <br>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>pic_name</label>
                        <input type="text" class="form-control" name="pic_name"  placeholder="select an pic_name or enter new link..." onkeydown="searchq();" required>

                    <div id="output">

                    </div>

                    </div>

<br>
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
    function searchq(){
        var searchTxt=$("input[name='pic_name']").val();
        $.post("search_edit_pic.php",{searchVal:searchTxt},function(data){
                $("#output").html(data);
            }
        );
    }
</script>

</body>

</html>
