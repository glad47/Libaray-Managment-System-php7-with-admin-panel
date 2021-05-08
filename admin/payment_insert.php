<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(!empty($_REQUEST['insert'])){
    $id=$_REQUEST['search'];
    $date=$_REQUEST['date'];
    $amount=$_REQUEST['amount'];
    $discount=$_REQUEST['discount'];
    $pay_method=$_REQUEST['pay_method'];
    $q="insert into payment(date,,amount,discount,pay_method) values ('$date','$amount','$discount','$pay_method')";
    mysqli_query($conn,$q);
    $payment_id=mysqli_insert_id($conn);
    $q="insert into cus_pay(cus_id,pay_id) values ('$id','$payment_id')";
    mysqli_query($conn,$q);

    header("location:payment.php");


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

                <form role="form" method="post" action="payment_insert.php">
                    <h4>Payment Insert New Record</h4>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>date</label>
                            <input class="form-control" name="date" placeholder="date" required>
                        </div>
                        <div class="form-group">
                            <label>amount</label>
                            <input class="form-control" name="amount" placeholder="amount"  required>
                        </div>
                        <div class="form-group">
                            <label>discount</label>
                            <input class="form-control" name="discount" placeholder="discount" required>
                        </div>
                        <div class="form-group">
                            <label>pay_method</label>
                            <input class="form-control" name="pay_method" placeholder="pay_method"  required>
                        </div>
                        <div class="form-group">
                            <label>customer_id</label>

                            <input type="text" class="form-control" name="search" placeholder="search for the customer id...."
                                   onkeydown="searchq();" required>

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
        var searchTxt=$("input[name='search']").val();
        $.post("search_payment_insert.php",{searchVal:searchTxt},function(data){
                $("#output").html(data);
            }
        );
    }

</script>


</body>

</html>
