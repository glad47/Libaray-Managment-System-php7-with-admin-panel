<?php
include 'include/session_validation.php';
include'include/function.php';
include 'include/db.php';


if(isset($_REQUEST['searchVal'])){
    $output='';
    $searchq=$_REQUEST['searchVal'];
    $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
    $q="select * from employee where id like '%$searchq%' or name like '%$searchq%' or email like '%$searchq%' or phone_no like '%$searchq%' or acc_no like
'%$searchq%' or username like '%$searchq%' or address like '%$searchq%' or salary like '%$searchq%'  or qualification like '%$searchq%' or
 join_date like '%$searchq%'";
    $res=mysqli_query($conn,$q);
    $count=mysqli_num_rows($res);
    if($count == 0){
        $output="there is no search result ";

    }else{
        while($row=mysqli_fetch_assoc($res)) {
  $id = $row['id'];
            $q1 = "select * from facilities where manager_id = '$id'";
            $res2 = mysqli_query($conn, $q1);
            $count1 = mysqli_num_rows($res2);
                if($count1 == 0) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone_no = $row['phone_no'];
                    $acc_no = $row['acc_no'];
                    $address = $row['address'];
                    $salary = $row['salary'];
                    $join_date = $row['join_date'];
                    $qualification = $row['qualification'];
                    $username = $row['username'];
                    $facilities_id = $row['facilities_id'];
                    $output .= "<div>" . "\\id\\ $id " . " \\name\\ $name " . "\\phone_no\\  $phone_no "
                        . "\\salary\\   $salary   " . "\\join_date\\   $join_date   " .
                        "\\qualification\\   $qualification    " . "\\facilities_id\\  $facilities_id   " . "</div>";
              }
            }
    }


}else
    echo "error";
echo $output;
?>