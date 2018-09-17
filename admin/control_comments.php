<?php
include_once( 'config.php' );
$id     = $_GET['id'];
$action = $_GET['value'];
if ( $action == 'approv' ) {
	$sql = "UPDATE comments SET approv=1  WHERE cmid='$id'";
	$conn->query( $sql );
	echo "successfully update";
} elseif ( $action == 'delete' ) {
	$sql = "DELETE FROM comments WHERE cmid='$id'";
	$conn->query( $sql );
	echo "successfully delete";
} else {
	echo "error";
}


