<script type="text/javascript">
    $(function() {
$(".delete_class").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
var $tr = $(this).closest('tr'); //here we hold a reference to the clicked tr which will be later used to delete the row

if(confirm("Are you sure you want to delete this?"))
{
$.ajax({
type: "POST",
url: "about_delete.php",
data: info,
success: function(){
//$tr.find('td').fadeOut(3000);
$tr.remove();
}
});

}
return false;
});
});
    </script>