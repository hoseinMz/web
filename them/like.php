<?php
$id =$_GET['id'];
include_once('config.php');
if(isset($_COOKIE['like'.$id])) {
    echo "شما قبلا برای این پست نظر داده اید";
    exit;
}else {
    $sql = "UPDATE post SET likecount=likecount+1 WHERE id=$id";
    $conn->query($sql);
    $sql = "SELECT likecount from post where id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['likecount'];
        setcookie('like'.$id,true, time() + (86400 * 30), "/");
    }
}
