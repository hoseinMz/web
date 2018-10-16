<?php
include_once('config.php');
include_once('header.php');
include_once('header-menu.php');
include_once('slider.php');
include_once('jdf.php');
error_reporting( 0 );
ini_set( 'display_errors', 0 );
$id= $_GET['post'];
secure($id);
$sql    = "SELECT postnam,description,original_img,alt FROM post WHERE id='$id'";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
    $row = $result->fetch_assoc();
};
?>
<div class="row">
    <div class="single">
        <div class="col">
            <div class="single-img">
                <img src="<?php echo base_url . $row['original_img']; ?>" alt="<?php echo $row['alt']; ?>">
            </div>
        </div>
        <div class="col">
            <div class="single-content">
                <h1 class="section-header"><?php echo $row['postnam']; ?></h1>
                <p>
                    <?php echo $row['description']; ?>
                </p>
            </div>
        </div>
    </div>
</div>


<?php
include_once('input-comment.php');
include_once('comments.php');
include_once('footer-content.php');
include_once('footer.php');
?>
