<?php
include_once( 'config.php' );
$title = $_POST['title'];
$link  = $_POST['link'];
@$id  = $_POST['id'];
/*main menu control*/
if ( $_POST['action'] && isset($_POST['id'])) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE topbar SET link='$link',title='$title' WHERE id='$id'";
		$conn->query( $sql );
		echo "successfully update";
	} elseif ( $_POST['action'] == 'delete' ) {
		$sql = "DELETE FROM topbar WHERE id='$id'";
		$conn->query( $sql );
		echo "successfully delete";
	}
} elseif ( $_POST['action'] && ! isset( $_POST['id'] ) ) {
	$sql = "INSERT INTO topbar(link,title) VALUES ('$link','$title')";
	$conn->query( $sql );
	echo "successfully insert";
} else {
	echo "error";
}


