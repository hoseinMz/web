<?php
define('base_url', 'http://shop.local/');
$servername = "localhost";
$database   = "shop";
$username   = "root";
$password   = "";
global $config;
$config['salt']="AzaZ.09wq@'mxzq[rtQSCVVFR%£erv";
// Create connection
$conn =mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
function secure($value) {
    $value = @trim($value);
    if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
    }
    return mysqli_real_escape_string($value);
}

?>