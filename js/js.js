$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});


// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("header");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

$("#about","product").click(function() {
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
});​


function captcha() {
    $.ajax({
        url:'captcha.php',
        success:function (msg) {
            $('.capimg').attr('src', 'img/'+msg + '.png');
        },
        error:function () {
            alert('پاسخی دریافت نشد . مجددا تلاش نمایید');
        }
    });
}
captcha();

$('.capimg').click(function () {
    captcha();
});