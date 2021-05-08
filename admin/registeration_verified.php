 <?php
 include'include/function.php';
 include 'include/db.php';
 if(isset($_REQUEST['vkey'])){
    $vkey=$_REQUEST['vkey'];
    $q="select verified,vkey from admin where verified='0' and vkey='$vkey' LIMIT 1 ";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 1){
        $vkey2=md5($vkey);
        $q="update admin set verified='1',vkey='$vkey2' where vkey='$vkey'";
        mysqli_query($conn,$q);
       header("location:index.php");
    }else{
        header("location:already.php");

    }
 }else{
   die("something went wronge");
 }

 ?>