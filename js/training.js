$(function() {
    var entry_url = $("#entry_url").val();

    $("#favorite_in").click(function(){
        var menu_id = $("#menu_id").val();
        location.href = entry_url + "index.php?display=favorite&menu_id=" + menu_id;
    });
});
