/**
 * Created by haroon on 6/4/2015.
 */

$(function() {
    $(".delete_class").click(function(){
        var element = $(this);
        var delete_query_page = element.attr("name");
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        var $tr = $(this).closest('tr'); //here we hold a reference to the clicked tr which will be later used to delete the row

        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type: "POST",
                url: delete_query_page,
                data: info,
                success: function(){
                    $tr.remove();
                }
            });

        }
        return false;
    });
});