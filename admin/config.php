<?php
define('base_url', 'http://originalpal.info/');
$servername = "localhost";
$database   = "origina9_shop";
$username   = "origina9_bahman";
$password   = "bahman13701121";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>