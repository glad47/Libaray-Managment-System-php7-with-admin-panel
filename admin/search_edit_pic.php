<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(isset($_REQUEST['searchVal'])){
    $output='';
    $searchq=$_REQUEST['searchVal'];
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    $q="select * from pic  where id like '%$searchq%' or name like '%$searchq%' ";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 0){
        $output="there is no search result ";

    }else{
        while($row=mysqli_fetch_assoc($res)) {
            $id=$row['id'];
            $name = $row['name'];

            $output .= "<div>" . "\\id\\ $id " . " \\name\\ $name " . "</div>";

        }
    }


}else
    echo "error";
echo $output;
?>