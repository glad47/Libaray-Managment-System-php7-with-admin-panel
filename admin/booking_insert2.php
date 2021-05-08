<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';
include'auto_cancel.php';

if(!empty($_REQUEST['insert'])){

    $c_in=$_REQUEST['c_in'];
    $c_out=$_REQUEST['c_out'];
    $lux_id=$_REQUEST['lux_id'];
    $adults=$_REQUEST['adults'];
    $children=$_REQUEST['children'];
    $date= date("Y-m-d");
    if($date > $c_in and $date > $c_out or $c_in > $c_out){
        header("location:date_range.php");
        exit();
    }

    $res=checkAva($lux_id,$c_in,$c_out);
    $count=mysqli_num_rows($res);
    if($count == 0){
        echo "no room is avaliable rightnow";
       header("location:nobooking.php");



    }else{
        $row=mysqli_fetch_assoc($res);
        $room_no=$row['room_no'];
        $cus_id=$_REQUEST['cus_id'];
        $q="update one_room set c_in='$c_in',c_out='$c_out',isoccupied='1' where id='$room_no'";
        mysqli_query($conn,$q);
        $q="insert into booking(room_id,adults,children,c_in,c_out) values ('$room_no','$adults','$children','$c_in','$c_out')";
        mysqli_query($conn,$q);
        $book_id=mysqli_insert_id($conn);
        $q="insert into cus_book(cus_id,book_id) values ('$cus_id','$book_id')";
        mysqli_query($conn,$q);
        header("location:booking.php");

    }


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


            <form role="form" method="post" action="booking_insert2.php">
                <h4>Find customer Insert </h4>
                <div class="modal-body">
                    <div class="form-group">
                        <label>customer</label>

                        <input type="text" class="form-control" name="cus_id" placeholder="select an id..."   onkeydown="searchq();" required>
                    </div>
                    <div id="output">

                    </div>


                </div>

                <h4>Booking Insert New Record</h4>
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
                <div class="form-group">
                    <label>Adults</label>
                    <input type="radio" name="adults"  value="0" size="35" requried>---</input>
                    <input type="radio" name="adults"  value="1" size="35" requried>ONE</input>
                    <input type="radio" name="adults"  value="2" size="35" requried>TWO</input>
                    <input type="radio" name="adults"  value="3" size="35" requried>THREE</input>
                    <input type="radio" name="adutls"  value="4" size="35" requried>FOUR</input>
                    <input type="radio" name="adults"  value="5" size="35" requried>FIVE</input>
                    <br>
                </div>
                <div class="form-group">
                    <label>Children</label>
                    <input type="radio" name="children"  value="0" size="35" requried>---</input>
                    <input type="radio" name="children"  value="1" size="35" requried>ONE</input>
                    <input type="radio" name="children"  value="2" size="35" requried>TWO</input>
                    <input type="radio" name="children"  value="3" size="35" requried>THREE</input>
                    <input type="radio" name="children"  value="4" size="35" requried>FOUR</input>
                    <input type="radio" name="children"  value="5" size="35" requried>FIVE</input>
                    <br>
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
        var searchTxt=$("input[name='cus_id']").val();
        $.post("search_book_insert_customer.php",{searchVal:searchTxt},function(data){
                $("#output").html(data);
            }
        );
    }
</script>

</body>

</html>


?>