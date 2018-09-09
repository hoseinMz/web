<?php
session_start();
	print_r($_POST);
	if(isset($_POST) & !empty($_POST)){
		if($_POST['captcha'] == $_SESSION['code']){
			echo "correct captcha";
		}else{
			echo "Invalid captcha";
		}
	}
include_once( 'config.php' );
$usr = mysqli_real_escape_string( $conn, $_POST['username'] );
$pas = hash( 'sha256', mysqli_real_escape_string($conn, $_POST['password'] ) );
$sql = "SELECT * FROM user WHERE name='$usr' AND password='$pas' 
        LIMIT 1";
$result = $conn->query( $sql );
if ( $result->num_rows == 1 ) {
	$row = $result->fetch_assoc();
	session_start();
	$_SESSION['name']     = $row['name'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['logged']   = true;
	header( "Location: admin/admin.php" );
	exit;
} else {
	echo 'خطا';
	header( "Location: index.php" );
	exit;
}
