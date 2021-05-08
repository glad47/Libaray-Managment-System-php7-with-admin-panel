<?php
session_start();
	include('include/config.php');
	mysqli_query($con,"DELETE FROM about WHERE id = '".$_GET['id']."'");
	header("location:".$_SERVER['HTTP_REFERER']);
exit();
?>