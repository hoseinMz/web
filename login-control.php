<?php
session_start();
include_once( 'config.php' );
if ( isset( $_POST ) & ! empty( $_POST ) ) {
	if ( $_POST['captcha'] == $_SESSION['code'] ) {
		$usr    = mysqli_real_escape_string( $conn, $_POST['username'] );
		$pass1  = $_POST['password'];
		$sql    = "SELECT * FROM user WHERE name='$usr'";
		$result = $conn->query( $sql );
		if ( $result->num_rows >= 1 ) {
			while ( $row = $result->fetch_assoc() ) {
				if ( password_verify( $pass1, $row['password'] ) ) {
					$_SESSION['name']     = $row['name'];
					$_SESSION['password'] = $row['password'];
					if($row['access']=='1'){
						$_SESSION['access'] = 'owner';
					}else{
						$_SESSION['access'] ='member';
					}
					$_SESSION['logged']   = true;
					echo "<script>alert('wellcome');window.location.href='admin/admin.php';</script>";
				}//end if password_verify
			}//end while
		} else {
			echo "<script>alert('شما تا کنون ثبت نام نکرده اید');window.location.href='register.php';</script>";
		}
	} else {
		echo "<script>alert('خطا در کد امنیتی وارد شده ');window.location.href='login.php';</script>";
	}
}
echo "<script>alert('خطا در ارسال اطلاعات ');window.location.href='login.php';</script>";


