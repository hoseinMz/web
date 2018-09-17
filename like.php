<?php
//session_destroy();
session_start();
include_once( 'config.php' );
$id  = $_GET['id'];
$sql = "UPDATE post SET likecount=likecount+1 WHERE id=i$idd";
$conn->query( $sql );
$sql="SELECT likecount from post where id=i$idd";
$result = $conn->query( $sql);
if ( $result->num_rows > 0 ) {
	$row = $result->fetch_assoc();
	echo $row['likecount'];
}
