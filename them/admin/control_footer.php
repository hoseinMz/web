<?php
include_once('config.php');
session_start();
if ( $_SESSION["logged"] != true || $_SESSION['access']=='member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
$id             = $_POST['id'];
$content1       = $_POST['content1'];
$content2       = $_POST['content2'];
$content1header = $_POST['content1header'];
$content2header = $_POST['content2header'];
/*main menu control*/
if ( $_POST['action'] ) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE footer SET content1='$content1',content2='$content2',content1header='$content1header',content2header='$content2header' WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully update";
	} else {
		echo "error";
	}
}