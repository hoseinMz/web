<?php
session_start();
include_once( 'config.php' );
include_once( 'header.php' );
?>
    <div class="contain">
    <h2> نام کاربری و گذرواژه خود را وارد کنید</h2>
    <form action="login-control.php" method="post" class="login">
        <img src="img/avatar.png" class="img-rounded img-size">
        <div class="form-group">
            <label for="username">نام کاربری :</label>
            <input type="text" class="form-control" id="username" placeholder="نام کاربری خود را وارد کنید"
                   name="username" required>
        </div>
        <div class="form-group">
            <label for="password">رمز ورود :</label>
            <input type="password" class="form-control" id="password" placeholder="رمز خود را وارد کنید" name="password"
                   required>
        </div>
        <div id="capimg" class="capimg">
            <img src="captcha.php"/>
        </div>
        <div class="input-group mb-2">
            <input type="text" class="form-control" placeholder="کد تولید شده را وارد کنید" name="captcha"/>
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <button type="button" id="reCaptcha" class="btn btn-primary btn-md"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">ورود</button>
        <a class="btn btn-danger" style="color: white" href="<?php base_url ?>register.php">ثبت نام</a>
    </form>
    <script>
        $('#reCaptcha').click(function () {
            $('#capimg').html('<img src="captcha.php?" />');
        });
    </script>
<?php
include_once( 'footer.php' );
?>