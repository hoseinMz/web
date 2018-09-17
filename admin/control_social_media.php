<?php
include_once( 'config.php' );
$title = $_POST['title'];
$class = $_POST['class'];
$link  = $_POST['link'];
@$id  = $_POST['id'];
/*social media control*/
if ( $_POST['action'] && isset($_POST['id'])) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE header SET link='$link',title='$title',class='$class' WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully update";
	} elseif ( $_POST['action'] == 'delete' ) {
		$sql = "DELETE FROM header WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully delete";
	}
} elseif ( $_POST['action'] && ! isset( $_POST['id'] ) ) {
	$sql = "INSERT INTO header(link,title,class) VALUES ('$link','$title','$class')";
	$conn->query( $sql );
	echo "successfully insert";
} else {
	echo "error";
}

