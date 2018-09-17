<?php
include_once ('config.php');
date_default_timezone_set('Asia/Tehran');
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$date=date("Y-m-d H:i:s");
$array = explode(' ', $date);
list($year, $month, $day) = explode('-', $array[0]);
list($hour, $minute, $second) = explode(':', $array[1]);
$time=$hour.$minute.$second;
$date=$year.$month.$day;
$postid= $_POST['send'];
$sql="insert into comments (name,email,comment,time,date,postid) values ($name,'$email','$comment','$time','$date','$postid')";
if($conn->query($sql)){
    echo 'ok';
}else{
    echo 'error';
};
?>


