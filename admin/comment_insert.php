<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['insert'])){
    $text=$_REQUEST['text'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $q="insert into comment(text,name,email) values('$text','$name','$email')";
    mysqli_query($conn,$q);
    $id=mysqli_insert_id($conn);
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
    $q="insert into com_pic_page(com_id,pic_id,page_id) values('$id','$pic_id','$page_id') ";
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

                <form role="form" method="post" action="comment_insert.php">
                    <h4>Comment Insert New Record</h4>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Author</label>
                            <input class="form-control" name="name" placeholder="Auother" required>
                        </div>
                        <div class="form-group">
                            <label>comment</label>
                            <input class="form-control" name="text" placeholder="comment"  required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input  class="form-control" name="email" placeholder="email"  required>
                        </div>
                        <div class="form-group">
                            <label>pic_name</label>
                            <input type="text" class="form-control" name="pic_name" placeholder="select an pic_name or enter new link..." onkeydown="searchq1();" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript">
    function searchq1(){
        var searchTxt=$("input[name='pic_name']").val();
        $.post("search_edit_pic.php",{searchVal:searchTxt},function(data){
                $("#output").html(data);
            }
        );
    }
</script>



</body>

</html>
