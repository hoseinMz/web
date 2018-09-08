<?php
include_once( 'config.php' );
include_once( 'header.php' );
$sql    = "SELECT link,title ,class FROM header";
$result = $conn->query( $sql );
?>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn").click(function() {
            var val = $("#number").val();
            $.ajax ({
                url: "admin.php",
                Type: "GET",
                data: { val : val },
                success: function( result ) {
                    $("#summary").load('social_media.php');
                }
            });
        });
    });
    $(document).ready(function(){
        $("#bt").click(function() {
            var val = $("#number").val();
            $.ajax ({
                url: "admin.php",
                Type: "GET",
                data: { val : val },
                success: function( result ) {
                    $("#summary").load('top_bar.php');
                }
            });
        });
    });

</script>
<div class="row">
    <div class="col">
        <nav id="header">
            <div class="top">
                <ul class="admin-bar">
                    <li class="sign"><a href="#"><i class="fa fa-sign-out fa-lg" data-toggle="tooltip"
                                                    data-placement="bottom"
                                                    title="خروج"></i></a></li>
                    <li class="text">به پنل مدیریتی خوش امدید</li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <div class="admin-list-menu">
            <ul class="list-menu">
                <li class="list-item"><button id="btn">شبکه های اجتماعی</button></li>
                <li class="list-item"><button id="bt">منوی اصلی</button></li>
                <li class="list-item">اسلایدر</li>
                <li class="list-item">پست ها</li>
                <li class="list-item">فوتر</li>
            </ul>
        </div>
    </div>
    <div id="summary">

    </div>
	<?php
    //include_once( 'social_media.php' );
	include_once( 'footer.php' ) ?>




