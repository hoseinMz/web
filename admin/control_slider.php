<?php
include('config.php');
$alt = $_POST['alt'];
$content  = $_POST['content'];
@$id  = $_POST['id'];
@$fileinfo=PATHINFO($_FILES["image"]["name"]);
@$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
@move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $newFilename);
$imgurl="upload/" . $newFilename;
/*main menu control*/
if ( $_POST['action'] && isset($_POST['id'])) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE slider SET imgurl='$imgurl',content='$content',alt='$alt' WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully update";
	} elseif ( $_POST['action'] == 'delete' ) {
		$sql = "DELETE FROM slider WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully delete";
	}
} elseif ( $_POST['action'] && ! isset( $_POST['id'] ) ) {
	$sql = "insert into slider (imgurl,content,alt) values ('$imgurl','$content','$alt')";
	$conn->query( $sql );
	echo "successfully insert";
} else {
	echo "error";
}
?>