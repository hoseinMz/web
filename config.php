<?php
define('base_url', 'http://originalpal.info/');
$servername = "localhost";
$database   = "origina9_shop";
$username   = "origina9_bahman";
$password   = "bahman13701121";

// Create connection
$conn = mysqli_connect( $servername, $username, $password, $database );
mysqli_set_charset( $conn, "utf8" );
// Check connection
if ( $conn->connect_error ) {
	die( "Connection failed: " . $conn->connect_error );
}

if ( isset( $_GET['pageno'] ) ) {
	$pageno = $_GET['pageno'];
} else {
	$pageno = 1;
}
$no_of_records_per_page = 12;
$offset                 = ( $pageno - 1 ) * $no_of_records_per_page;
$total_pages_sql        = "SELECT COUNT(*) FROM post";
$result                 = $conn->query( $total_pages_sql);
$total_rows             = mysqli_fetch_array( $result )[0];
$total_pages            = ceil( $total_rows / $no_of_records_per_page );
?>