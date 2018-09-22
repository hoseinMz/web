<?php
require_once ('config.php');
if ( isset( $_GET['pageno'] ) ) {
	$pageno = $_GET['pageno'];
	secure($pageno);
} else {
	$pageno = 1;
}
$no_of_records_per_page = 3;
$offset= ( $pageno - 1 ) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM post";
$result = $conn->query( $total_pages_sql );
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>