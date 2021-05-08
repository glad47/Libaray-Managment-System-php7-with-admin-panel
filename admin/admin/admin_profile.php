<?php
include_once 'include/session_validation.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | CAS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
.btn {
	padding:0px 8px;
}
</style>
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
                <a class="navbar-brand" href="dashboard.php">Admin Pannel</a>
            </div>
            <!-- /.navbar-header -->
			<?php include('include/header_navebar.php'); ?>
            
            <!-- /.navbar-top-links -->

            <?php include('include/menu_bar.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>

      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row-fluid sortable">
        <div class="box span12">
          <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Admin Profile</h2>
            <div class="box-icon"> <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> </div>
          </div>
          <div class="box-content">
            <?php
		if(!empty($_REQUEST['error']))
		{		
			?>
            <div class="alert alert-info"> <strong style="color:#F00;"><span class="icon-warning-sign"></span> Record Already Exist!!!</strong> </div>
            <?php
		}
		?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <tr bgcolor="#CCCCCC">
                  <th>Sr.</th>
                  <th>Email Address</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
					$i=1; 
					$result = mysqli_query($connection,"SELECT * FROM admin WHERE 1");
					while($array = mysqli_fetch_array($result))
					{?>
								<tr>
								  <td><?php echo $i++; ?></td>
								  <?php 
							print"<td>$array[admin_email]</td>
							<td>$array[admin_password]</td>
							<td>
									<a class='btn btn-info' id='edit-admin' href='admin_edit.php?id=$array[admin_id]'>
										<i class='icon-edit icon-white'></i>  
										Edit                                            
									</a>
							</td>
						</tr>";
					}
				 ?>
              </tbody>
            </table>
        </div>
      
        <!--/span--> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row"></div>
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

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>
</html>