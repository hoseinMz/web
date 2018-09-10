<?php
session_start();
include_once( 'config.php' );
if ( isset( $_POST ) & ! empty( $_POST ) ) {
	if ( $_POST['captcha'] == $_SESSION['code'] ) {
		$usr    = mysqli_real_escape_string( $conn, $_POST['username'] );
		$pas    = hash( 'sha256', mysqli_real_escape_string( $conn, $_POST['password'] ) );
		$sql    = "SELECT * FROM user WHERE name='$usr' AND password='$pas' 
        LIMIT 1";
		$result = $conn->query( $sql );
		if ( $result->num_rows == 1 ) {
			$row = $result->fetch_assoc();
			$_SESSION['name']     = $row['name'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['logged']   = true;
			echo "<script>alert('wellcome');window.location.href='admin/admin.php';</script>";
		} else {
			header( "Location: login.php" );
			exit;
		}

	} else {
		echo "<script>alert('خطا در کد امنیتی وارد شده ');window.location.href='login.php';</script>";
	}
}

