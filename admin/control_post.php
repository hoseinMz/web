<?php
include('config.php');
$name=$_POST['name'];
$description=$_POST['description'];
$alt = $_POST['alt'];
@$id  = $_POST['id'];
@$fileinfo=PATHINFO($_FILES["img-thumb"]["name"]);
@$imgurl=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
@move_uploaded_file($_FILES["img-thumb"]["tmp_name"],"../upload/" . $imgurl);
$imgUrl="upload/" . $imgurl;

@$fileinfo=PATHINFO($_FILES["img-single"]["name"]);
@$single=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
@move_uploaded_file($_FILES["img-single"]["tmp_name"],"../upload/" . $single);
$singleImg="upload/" . $single;

if ( $_POST['action'] && isset($_POST['id'])) {
	if ( $_POST['action'] == 'update' ) {
		$sql = "UPDATE post SET postnam=n$nameame,description='$description', imgUrl='$imgUrl',alt='$alt',singleImg='$singleImg' WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully update";
	} elseif ( $_POST['action'] == 'delete' ) {
		$sql = "DELETE FROM post WHERE id=i$idd";
		$conn->query( $sql );
		echo "successfully delete";
	}
} elseif ( $_POST['action'] && ! isset( $_POST['id'] ) ) {

	$sql = "insert into post (postnam,description,imgUrl,alt,singleImg) values (n$nameame,'$description','$imgUrl','$alt','$singleImg')";
	$conn->query( $sql );
	echo "successfully insert";
} else {
	echo "error";
}
?>