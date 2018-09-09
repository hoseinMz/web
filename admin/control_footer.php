<?php
include_once( 'config.php' );
$id             = $_POST['id'];
$content1       = $_POST['content1'];
$content2       = $_POST['content2'];
$content1header = $_POST['content1header'];
$content2header = $_POST['content2header'];
/*main menu control*/
if ( $_POST['action'] ) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE footer SET content1='$content1',content2='$content2',content1header='$content1header',content2header='$content2header' WHERE id='$id'";
		$conn->query( $sql );
		echo "successfully update";
	} else {
		echo "error";
	}
}