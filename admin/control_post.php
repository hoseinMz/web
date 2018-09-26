<?php
include_once('config.php');
header("Content-Type: application/json", true);
session_start();
if ($_SESSION["logged"] != true || $_SESSION['access'] == 'member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
@$post =array(json_encode($_POST));
@$data=json_decode($post[0]);
@$id =$data->id;
@$name =$data->postnam;
@$description =$data->description;
@$alt =$data->alt;
@$category =$data->category;
@$price =$data->price;
@$value=$data->value;
if ($value =="update") {
    $sql = "UPDATE post SET postnam='$name',description='$description',alt='$alt' ,price='$price',category='$category' WHERE id='$id'";
    if($conn->query($sql)){
        echo "successfully update";}
    else{
        echo 'error';
    }
} elseif ($value == 'delete') {
    $sql = "DELETE FROM post WHERE id='$id'";
    $conn->query($sql);
    echo "successfully delete";
} elseif (isset($_POST['action'])){
    $name=$_POST['name'];
    $alt=$_POST['alt'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $fileinfo = PATHINFO($_FILES["img"]["name"]);
    $original_img = $fileinfo['filename'] . "_" . time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["img"]["tmp_name"], "../upload/" . $original_img);
    $singleImg = "upload/" . $original_img;
    $upper = strtoupper($original_img);
    @$ext = end(explode('.', $upper));
    if ($ext == "JPG" OR $ext == "JPEG") {
        $img = imagecreatefromjpeg('../upload/' . $original_img);
        $width = imagesx($img);
        $height = imagesy($img);
        $new_width = 250;//پهنا
        $new_height = 250;//ارتفاع
        $tmp_img = imagecreatetruecolor($new_width, $new_height);
        imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($tmp_img, "../upload/thumb_" . $original_img);
        $thumb = "upload/thumb_" . $original_img;
    }
    if ($ext == "PNG") {
        $img = imagecreatefrompng("../upload/" . $original_img);
        $width = imagesx($img);
        $height = imagesy($img);
        $new_width = 250;//پهنا
        $new_height = 250;//ارتفاع
        $tmp_img = imagecreatetruecolor($new_width, $new_height);
        imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagepng($tmp_img, "../upload/thumbs_" . $fileinfo);
        $thumb = "upload/thumb_" . $original_img;
    }
    $sql = "insert into post (postnam,description,thumb_img,alt,original_img,price,category) values ('$name','$description','$thumb','$alt','$singleImg','$price','$category')";
    $conn->query($sql);
    exit();
} else {
    echo "error";
}
