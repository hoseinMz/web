<?php
include_once( 'config.php' );
include_once( 'header.php' );
//error_reporting( 0 );
//ini_set( 'display_errors', 0 );
?>
<div class="row">
    <div dir="rtl" class="container" id="comm">

        <div id="wrap">
            <div id="main">
                <div class="row">
                    <div class="col-md-5">
                        <h3 class="heading">ارسال دیدگاه</h3>
                    </div>
                    <div class="col-md-7">
                        <div id="upper_blank"></div>
                    </div>
                </div>
            </div>
            <p>ایمیل شما منتشر نخواهد شد </p>
            <div id='form'>
                <div class="row">
                    <div class="col-md-12">
                        <form action="comments-control.php" method="POST" id="commentform">

                            <div id="comment-name" class="form-row">
                                <input type = "text" placeholder = "نام خود را وارد کنید" name ="name"  id = "name" >
                            </div>
                            <div id="comment-email" class="form-row">
                                <input type = "text" placeholder = "ایمیل خود را وارد کنید" name = "email"  id = "email-com">
                            </div>
                            <div id="comment-message" class="form-row">
                                <textarea name = "comment" placeholder = "متن دیدگاه خود را بنویسید..." id = "comment"></textarea>
                            </div>
                            <a href="#">
                                <input type="submit" name="send" id="commentSubmit" value="ارسال دیدگاه">
                                <input type="hidden" name="send" value="<?php echo $_GET['post']; ?>"></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
