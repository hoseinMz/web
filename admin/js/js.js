function reload(e) {
    $("#load-section").empty();
    var id = $(e).attr('id');
    $.ajax({
        url: "admin.php",
        Type: "GET",
        success: function (data) {
            $("#load-section").load(id+'.php');
        }
    });
}