<?php
include_once('config.php');
include_once('header.php');
?>
    <div class="contain">
        <h2>فرم ثبت نام</h2>
        <form class="login" method="get" action="register.php">
            <img src="img/avatar.png" class="img-rounded img-size">
            <div class="form-group">
                <label for="username">نام کاربری :</label>
                <input type="text" class="form-control" id="username" placeholder="نام کاربری"
                       name="username" required>
            </div>
            <div class="form-group">
                <label for="email">ایمیل :</label>
                <input type="email" class="form-control" id="email" placeholder="ایمیل"
                       name="email" required>
            </div>
            <div class="form-group">
                <label for="password1">رمز ورود :</label>
                <input type="password" class="form-control" id="password1" placeholder="رمز ورود " name="password1"
                       required>
            </div>
            <div class="form-group">
                <label for="password2">تکرار رمز ورود :</label>
                <input type="password" class="form-control" id="password2" placeholder="تکرار رمز ورود "
                       name="password2" required>
            </div>
            <button type="submit" class="btn btn-primary"> ورود</button>
        </form>

<?php
include_once('footer.php');
?>