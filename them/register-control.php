<?php
session_start();
include_once('config.php');
if ( isset( $_POST ) & ! empty( $_POST ) ) {
	if ( secure($_POST['captcha']) == secure($_SESSION['code']) ) {
		@$username = $_POST['username'];
        secure(@$username);
		@$email = $_POST['email'];
        secure(@$email);
		@$pass1 = $_POST['password1'];
        secure(@$pass1);
        @$pass2 = $_POST['password2'];
        secure(@$pass2);
        if ( ! isset( $email ) || ! isset( $username ) || ! isset( $pass1 ) || ! isset( $pass2 ) ) {
            echo "<script>alert('لطفا همه فیلد ها را تکمیل کنید......!!!!! ');window.location.href='register.php';	</script>";
        } elseif ( $pass1 != $pass2 ) {
            echo "<script>alert('مقادیر رمز ها یکسان نمی باشند......!!!!! ');window.location.href='register.php';	</script>";
        } else if ( strlen( $pass1 ) < 8 ) {
            echo "<script>alert('کمترین مقدار برای کلمه عبور 8 کاراکتر می باشد ......!!!!! ');window.location.href='register.php';	</script>";
        } else {
            $pass1=$config['salt'].$pass1.$config['salt'];
            $password = password_hash( $pass1, PASSWORD_DEFAULT );
            $result = $conn->query( "SELECT * FROM user WHERE email='$email'" );
			$data   = mysqli_num_rows( $result );
			if ( ( $data ) == 0 ) {
				$query = $conn->query( "insert into user(name,email, password) values ('$username','$email','$password')" );
				if ( $query ) {
					echo "<script>alert('ثبت نام شما با موفقیت انجام شد ');	window.location.href='index.php';</script>";
				} else {
					echo "<script>alert('خطا......!!!!! ');window.location.href='register.php';	</script>";
				}
			} else {
				echo "<script>alert('شما قبلا با این ایمیل ثبت نام انجام داده اید ');window.location.href='register.php';</script>";
			}
		}
	} else {
		echo "<script>alert('خطا در کد امنیتی وارد شده ');window.location.href='register.php';</script>";
	}
}

