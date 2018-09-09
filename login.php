<?php
include_once( 'config.php' );
include_once( 'header.php' );
?>
    <div class="contain">
        <h2> نام کاربری و گذرواژه خود را وارد کنید</h2>
        <form action="form-control.php" method="post" class="login" >
            <img src="img/avatar.png" class="img-rounded img-size">
            <div class="form-group">
                <label for="username">نام کاربری :</label>
                <input type="text" class="form-control" id="username" placeholder="نام کاربری خود را وارد کنید"
                       name="username" required>
            </div>
            <div class="form-group">
                <label for="password">رمز ورود :</label>
                <input type="password" class="form-control" id="password" placeholder="رمز خود را وارد کنید" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">ورود</button>
            <a  class="btn btn-danger" style="color: white" href="http://localhost:63342/PhpstormProjects/signup.php">ثبت نام</a>
        </form>
<?php
include_once( 'footer.php' );
?>