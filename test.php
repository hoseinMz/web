<?php
include_once ('config.php');
//$userAnswer = $_POST['id'];
$val=$_GET['val'];
$sql="INSERT INTO test (test) VALUE ('$val')";
$row=$conn->query($sql);
print_r($row);
