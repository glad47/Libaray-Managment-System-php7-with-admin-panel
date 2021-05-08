<?php include'connect.php';?>
<?php
function getHeader(){
    global $conn;
    return $res=mysqli_query($conn,'select * from header');
}


?>



<?php
function getService(){
    global $conn;
    return $res=mysqli_query($conn,'select * from service');
}
?>

<?php
function getWelpara(){
    global $conn;
    return $res=mysqli_query($conn,'select * from welpara');
}
?>
<?php
function getWelpic(){
    global $conn;
    return $res=mysqli_query($conn,'select * from welpic');
}
?>

<?php
function getHistory(){
    global $conn;
    return $res=mysqli_query($conn,'select * from history');
}
?>

<?php
function getAwards(){
    global $conn;
    return $res=mysqli_query($conn,'select * from awards');
}
?>

<?php
function getFaq(){
    global $conn;
    return $res=mysqli_query($conn,'select * from faq');
}
?>

<?php
function getPolicy(){
    global $conn;
    return $res=mysqli_query($conn,'select * from policy');
}
?>

<?php
function getPolicy_A(){
    global $conn;
    return $res=mysqli_query($conn,'select * from policy_analytics');
}
?>

<?php
function getSocial(){
    global $conn;
    return $res=mysqli_query($conn,'select * from social_media');
}
?>

<?php
function getInfo(){
    global $conn;
    return $res=mysqli_query($conn,'select * from info');
}
?>

<?php
function getQuick(){
    global $conn;
    return $res=mysqli_query($conn,'select * from quick_acc');
}
?>
<?php
function getPageName($name){
    global $conn;
    return $res=mysqli_query($conn,"select * from commented_page where name='$name' ");
}
?>
<?php
function getComment($page_id){
global $conn;
return $res=mysqli_query($conn,"select comment.id as id,comment.text as text ,comment.name as name,pic.name as pic_name
from comment join com_pic_page on id=com_id join pic on pic_id=pic.id join
commented_page on page_id=commented_page.id where commented_page.id='$page_id' ");
}
?>
<?php
function getLuxPic(){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room join lux_pic on id=lux_id join pic on pic_id=pic.id ");
}
?>
<?php
function getLuxDet(){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room join lux_det on id=lux_id join details on det_id=details.id ");
}
?>
<?php
function getLuxSer(){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room join lux_service on id=lux_id join room_service on service_id=room_service.id ");
}
?>
<?php
function getLuxPic1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room join lux_pic on lux_room.id=lux_id join pic on pic_id=pic.id where lux_room.id='$id' ");
}
?>
<?php
function getLuxDet1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room join lux_det on lux_room.id=lux_id join details on det_id=details.id where lux_room.id='$id' ");
}
?>
<?php
function getLuxSer1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room join lux_service on lux_room.id=lux_id join room_service on service_id=room_service.id where lux_room.id='$id' ");
}
?>
<?php
function getLux(){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room ");
}
?>

<?php
function getLux1($title){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room where title='$title' ");
}
?>

<?php
function getDet(){
    global $conn;
    return $res=mysqli_query($conn,"select * from details  ");
}
?>
<?php
function getDet1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from details where id='$id'  ");
}
?>
<?php
function getRoomSer(){
    global $conn;
    return $res=mysqli_query($conn,"select * from room_service  ");
}
?>
<?php
function getRoomSer1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from room_service where id='$id'  ");
}
?>


<?php
function getRoom(){
    global $conn;
    return $res=mysqli_query($conn,'select lux_room.id as id,lux_room.title as title, one_room.id as room_no ,c_in,c_out,isoccupied 
from lux_room left outer join lux_one_room on id=lux_id left outer join one_room on one_id=one_room.id ');
}
?>
<?php
function getRoom1($id){
    global $conn;
    return $res=mysqli_query($conn,"select lux_room.id as id,lux_room.title as title, one_room.id as room_no ,c_in,c_out,isoccupied 
from lux_room left outer join lux_one_room on id=lux_id left outer join one_room on one_id=one_room.id where one_room.id='$id' ");
}
?>
<?php
function checkAva($id,$c_in,$c_out){
    global $conn;
    return $res=mysqli_query($conn,"select lux_room.id as id,lux_room.title as title, one_room.id as room_no ,c_in,c_out,isoccupied from 
lux_room left outer join lux_one_room on id=lux_id left outer join one_room on one_id=one_room.id where lux_room.id='$id' 
and ((c_in not between '$c_in' and '$c_out' and c_out not between '$c_in' and '$c_out' and isoccupied != '1') or 
(c_in between '$c_in' and '$c_out' and c_out between '$c_in' and '$c_out' and isoccupied != '1'))");
}
?>
<?php
function getBook(){
    global $conn;
    return $res=mysqli_query($conn,'select customer.id as id,customer.name as name,booking.id as book_id,booking.room_id as room_no,
adults,children,c_in,c_out from customer join cus_book on id=cus_id join booking on book_id=booking.id ');
}
?>
<?php
function autoCancel($date){
    global $conn;
    return $res=mysqli_query($conn,"select * from one_room where c_in <'$date' and c_out < '$date' and isoccupied='1'");
}
?>
<?php
function getBooking($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from booking where id='$id'");
}
?>


