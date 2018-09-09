<?php
include_once( 'config.php' );
include_once( 'header.php' );
include_once( 'header-menu.php' );
include_once( 'slider.php' );
$id     = $_GET['post'];
$sql    = "SELECT nam,description,singleImg,alt FROM post WHERE id=$id";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
	$row = $result->fetch_assoc();
} ;

?>
<!--content section-->
<div class="row">
    <div class="single">
        <div class="col">
            <div class="single-img">
                <img src="<?php echo base_url.$row['singleImg']; ?>" alt="<?php echo $row['alt']; ?>">
            </div>
        </div>
        <div class="col">
            <div class="single-content">
                <h1 class="section-header"><?php echo $row['nam']; ?></h1>
                <p>
					<?php echo $row['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
include_once( 'footer-content.php' );
include_once( 'footer.php' );
?>
