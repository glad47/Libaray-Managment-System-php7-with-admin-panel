+<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['update'])){
    $id=$_REQUEST['id'];
    $pic_old_id=$_REQUEST['pic_old_id'];
    $page_old_id=$_REQUEST['page_old_id'];
    $text=$_REQUEST['text'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $q="update comment set text='$text',name='$name',email='$email' where id='$id'";
    mysqli_query($conn,$q);
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
    }
    $page_id=$_REQUEST['page_id'];
    $q="update com_pic_page set com_id='$id',pic_id='$pic_id',page_id=$page_id where com_id=$id and pic_id='$pic_old_id' and page_id='$page_old_id' ";
    mysqli_query($conn,$q);
    header("location:comment.php");
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

                <form role="form" method="post" action="comment_edit.php">
                    <h4>Comments Updating</h4>
                    <div class="modal-body">
                        <?php
                        $id=$_GET['id'];
                        $pic_old_id=$_GET['pic_id'];
                        $page_old_id=$_GET['page_id'];
                        $res=getCom1($id);
                        $row=mysqli_fetch_assoc($res);
                        ?>

                        <div class="form-group">
                            <label>comment</label>
                            <input class="form-control" name="text" value="<?php echo $row['text'];?>" required>
                        </div>
                        <div class="form-group">
                            <label>author</label>
                            <input class="form-control" name="name" value="<?php echo $row['name'];?>"  required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input  class="form-control" name="email" value="<?php echo $row['email'];?>"  required>
                        </div>
                        <?php

                        $res1=getPic1($pic_old_id);
                        $row1=mysqli_fetch_assoc($res1);
                        ?>


                        <div class="form-group">
                            <label>pic_name</label>
                            <input type="text" class="form-control" name="pic_name" value="<?php echo $row1['name'];?>" placeholder="select an pic_name or enter new link..."
                                   onkeydown="searchq1();" required>
                        </div>
                        <div id="output">

                        </div>

                    </div>
                    <div class="form-group">
                        <label>page</label>
                        <br>
                    <?php

                    $res2=getPage();
                   while( $row2=mysqli_fetch_assoc($res2)){
                    ?>
                        <span><?php echo $row2['name'];?></span>
                        <input type="radio" class="form-control" name="page_id" value="<?php echo $row2['id'];?>"  required>
                        <br>
                        <?php } ?>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id;?>" >
                    <input type="hidden" name="pic_old_id" value="<?php echo $pic_old_id;?>" >

                    <input type="hidden" name="page_old_id" value="<?php echo $page_old_id;?>" >

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript">
    function searchq1(){
        var searchTxt=$("input[name='pic_name']").val();
        $.post("search_edit_pic.php?id=<?php echo $row1['id'];?>",{searchVal:searchTxt},function(data){
                $("#output").html(data);
            }
        );
    }
</script>


</body>

</html>
