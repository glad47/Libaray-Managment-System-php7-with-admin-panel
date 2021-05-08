<?php include'connect.php';?>
<?php
function getHeader(){
    global $conn;
    return $res=mysqli_query($conn,'select * from header');
}


?>
<?php
function getHeader1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from header where id='$id'");
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
function getWelpara1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from welpara where id='$id'");
}
?>
<?php
function getWelpic(){
    global $conn;
    return $res=mysqli_query($conn,'select * from welpic');
}
?>
<?php
function getWelpic1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from welpic where id='$id' ");
}
?>

<?php
function getHistory(){
    global $conn;
    return $res=mysqli_query($conn,'select * from history');
}
?>

<?php
function getHistory1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from history where id='$id'");
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
function getFaq1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from faq where id='$id' ");
}
?>
<?php
function getPolicy(){
    global $conn;
    return $res=mysqli_query($conn,'select * from policy');
}
?>
<?php
function getPolicy1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from policy where id='$id' ");
}
?>


<?php
function getPolicy_A(){
    global $conn;
    return $res=mysqli_query($conn,'select * from policy_analytics');
}
?>

<?php
function getPolicy_A1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from policy_analytics where id='$id' ");
}
?>

<?php
function getSocial(){
    global $conn;
    return $res=mysqli_query($conn,'select * from social_media');
}
?>
<?php
function getSocial1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from social_media where id='$id' ");
}
?>

<?php
function getInfo(){
    global $conn;
    return $res=mysqli_query($conn,'select * from info');
}
?>
<?php
function getInfo1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from info where id='$id' ");
}
?>
<?php
function getQuick(){
    global $conn;
    return $res=mysqli_query($conn,'select * from quick_acc');
}
?>
<?php
function getQuick1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from quick_acc where id='$id' ");
}
?>

<?php
function getLoginEmp(){
    global $conn;
    return $res=mysqli_query($conn,'select  id , name, username ,password from employee  ');
}
?>
<?php
function getLoginEmp1($id){
    global $conn;
    return $res=mysqli_query($conn,"select  id , name, username ,password from employee where id='$id'  ");
}
?>
<?php
function getEmp(){
    global $conn;
    return $res=mysqli_query($conn,'select * from employee');
}
?>
<?php
function getEmp1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from employee where id='$id'  ");
}
?>
<?php
function getFac(){
    global $conn;
    return $res=mysqli_query($conn,'select * from facilities');
}
?>
<?php
function getFac1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from facilities where id='$id'  ");
}
?>

<?php
function getCus(){
    global $conn;
    return $res=mysqli_query($conn,'select * from customer');
}
?>
<?php
function getCus1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from customer where id='$id'");
}
?>
<?php
function getCusFeed(){
    global $conn;
    return $res=mysqli_query($conn,"select customer.id as id ,customer.name as name,feedback.id as feedback_id,date,info from customer left outer join cus_feed on
id=cus_id left outer join feedback on feed_id=feedback_id ");
}
?>
<?php
function getFeed(){
    global $conn;
    return $res=mysqli_query($conn,'select * from feedback');
}
?>
<?php
function getFeed1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from feedback where id='$id' ");
}
?>
<?php
function getCusPay(){
    global $conn;
    return $res=mysqli_query($conn,"select customer.id as id ,customer.name as name,payment.id as payment_id,date,amount,
discount,pay_method from customer left outer join cus_pay on
id=cus_id left outer join payment on pay_id=payment_id ");
}
?>
<?php
function getPay1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from payment where id='$id' ");
}
?>
<?php
function getPageName($name){
    global $conn;
    return $res=mysqli_query($conn,"select * from commented_page where name='$name' ");
}
?>
<?php
function getComment(){
    global $conn;
    return $res=mysqli_query($conn,"select comment.id as id,comment.name as name,comment.text as
 text ,pic.id as pic_id,pic.name as pic_name,
commented_page.id as page_id,commented_page.name as page_name
from comment left join com_pic_page on id=com_id left join pic on pic_id=pic.id left join
commented_page on page_id=commented_page.id  ");
}
?>
<?php
function getCom1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from comment where id='$id' ");
}
?>
<?php
function getPic1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from pic where id='$id' ");
}
?>
<?php
function getPage1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from commented_page where id='$id' ");
}
?>
<?php
function getPage(){
    global $conn;
    return $res=mysqli_query($conn,"select * from commented_page  ");
}
?>
<?php
function getPic(){
    global $conn;
    return $res=mysqli_query($conn,"select * from pic  ");
}
?>
<?php
function getLuxDet(){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room left outer join lux_det on lux_room.id=
    lux_id left outer join detalis on det_id=details.id left outer join lux_service on lux_room.id=lux_service.lux_id left outer join
     room_service join on room_service.id=service_id left outer join lux_pic on lux_room.id=lux_pic.lux_id left outer join pic on pic.id=pic_id");
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
function getLux(){
    global $conn;
    return $res=mysqli_query($conn,'select * from lux_room');
}
?>
<?php
function getLux1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from lux_room where id='$id'");
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
function getBookCus1($id){
    global $conn;
    return $res=mysqli_query($conn,"select customer.id as id,customer.name as name,booking.id as book_id,booking.room_id as room_no,
adults,children,c_in,c_out from customer join cus_book on id=cus_id join booking on book_id=booking.id where customer_id='$id' ");
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
<?php
function getAdmin(){
    global $conn;
    return $res=mysqli_query($conn,"select * from admin");
}
?>
<?php
function getAdmin1($id){
    global $conn;
    return $res=mysqli_query($conn,"select * from admin where id='$id'");
}
?>







