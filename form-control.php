<?php
include_once( 'config.php' );
	$usr = mysqli_real_escape_string($conn,$_POST['username']);
	$pas = hash('sha256', mysqli_real_escape_string($conn,$_POST['password']));
	$sql = mysqli_query($conn,"SELECT * FROM user WHERE name='$usr' AND password='$pas' 
        LIMIT 1");
	if(mysqli_num_rows($sql) == 1){
		$row = mysqli_fetch_array($sql);
		session_start();
		$_SESSION['name'] = $row['name'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['logged'] = TRUE;
		echo $_SESSION['name'];
		echo $_SESSION['password'];
		header("Location: admin/admin.php");
		exit;
	}else{
		header("Location: index.php");
		exit;
	}
