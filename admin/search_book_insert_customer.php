<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(isset($_REQUEST['searchVal'])){
    $output='';
    $searchq=$_REQUEST['searchVal'];
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    $q="select * from customer  where id like '%$searchq%' or name like '%$searchq%' or email like '%$searchq%' or phone_no like '%$searchq%' or acc_no like
'%$searchq%' or username like '%$searchq%' or password like '%$searchq%'  ";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 0){
        $output="there is no search result ";

    }else{
        while($row=mysqli_fetch_assoc($res)) {
            $id=$row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $phone_no = $row['phone_no'];
            $acc_no = $row['acc_no'];
            $username = $row['username'];
            $password = $row['password'];

            $output .= "<div>" . "\\id\\ $id " . " \\name\\ $name " . "\\phone_no\\  $phone_no "
                . "\\email\\   $email   " . "\\acc_no\\   $acc_no   " .  "\\username\\   $username   " . "\\password\\   $password   " ."</div>";

        }
    }


}else
    echo "error";
echo $output;
?>