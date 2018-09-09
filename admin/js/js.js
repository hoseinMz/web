$(document).ready(function () {
    $("#social").click(function () {
        let val = $("#number").val();
        $.ajax({
            url: "admin.php",
            Type: "GET",
            data: {val: val},
            success: function () {
                $("#summary").load('social_media.php');
            }
        });
    });
});
$(document).ready(function () {
    $("#main-menu").click(function () {
        let val = $("#number").val();
        $.ajax({
            url: "admin.php",
            Type: "GET",
            data: {val: val},
            success: function () {
                $("#summary").load('top_bar.php');
            }
        });
    });
});
$(document).ready(function () {
    $("#slider").click(function () {
        let val = $("#number").val();
        $.ajax({
            url: "admin.php",
            Type: "GET",
            data: {val: val},
            success: function () {
                $("#summary").load('slider.php');
            }
        });
    });
});
$(document).ready(function () {
    $("#post").click(function () {
        let val = $("#number").val();
        $.ajax({
            url: "admin.php",
            Type: "GET",
            data: {val: val},
            success: function () {
                $("#summary").load('post.php');
            }
        });
    });
});
$(document).ready(function () {
    $("#footer").click(function () {
        let val = $("#number").val();
        $.ajax({
            url: "admin.php",
            Type: "GET",
            data: {val: val},
            success: function () {
                $("#summary").load('footer_content.php');
            }
        });
    });
});
$(document).ready(function () {
    $("#about").click(function () {
        let val = $("#number").val();
        $.ajax({
            url: "admin.php",
            Type: "GET",
            data: {val: val},
            success: function () {
                $("#summary").load('about.php');
            }
        });
    });
});