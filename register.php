<?php
include_once( 'config.php' );
@$email = $_GET['email'];
@$pass1 = $_GET['password1'];
@$pass2 = $_GET['password2'];
$password = sha1( $pass1 );
if ( ! isset( $email ) || ! isset( $username ) || ! isset( $pass1 ) || ! isset( $pass2 ) ) {
	echo "<script>alert('لطفا همه فیلد ها را تکمیل کنید......!!!!! ');window.location.href='signup.php';	</script>";
} elseif ( $pass1 != $pass2 ) {
	echo "<script>alert('مقادیر رمز ها یکسان نمی باشند......!!!!! ');window.location.href='signup.php';	</script>";
} else if ( strlen($pass1) < 8 ) {
	echo "<script>alert('کمترین مقدار برای کلمه عبور 8 کاراکتر می باشد ......!!!!! ');window.location.href='signup.php';	</script>";
} else {
	$result = $conn->query( "SELECT * FROM user WHERE email='$email'" );
	$data   = mysqli_num_rows( $result );
	if ( ( $data ) == 0 ) {
		$query = $conn->query( "insert into user(name,email, password) values ('$username','$email','$password')" );
		if ( $query ) {
			echo "<script>alert('ثبت نام شما با موفقیت انجام شد ');	window.location.href='index.php';</script>";
		} else {
			echo "<script>alert('خطا......!!!!! ');window.location.href='signup.php';	</script>";
		}
	} else {
		echo "<script>alert('شما قبلا با این ایمیل ثبت نام انجام داده اید ');window.location.href='signup.php';</script>";
	}
}
