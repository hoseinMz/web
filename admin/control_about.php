<?php
include_once('config.php');
session_start();
if ( $_SESSION["logged"] != true || $_SESSION['access']=='member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
$text=$_POST['text'];
$headerImg=$_POST['img-header'];
$headerText=$_POST['massage-header'];
$alt = $_POST['alt'];
@$id  = $_POST['id'];
@$fileinfo=PATHINFO($_FILES["image"]["name"]);
@$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
@move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $newFilename);
$imgurl="upload/" . $newFilename;
if ( $_POST['action'] ) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE about SET text='$text',headerImg='$headerImg',headerText='$headerText',alt='$alt' WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully update";
	} else {
		echo "error";
	}
}