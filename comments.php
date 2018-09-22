<?php
include_once('config.php');
include_once('jdf.php');
error_reporting( 0 );
ini_set( 'display_errors', 0 );
$id  = $_GET['post'];
$sql = "SELECT * FROM comments WHERE postid='$id' and approv=1";
?>

<div class="row">
    <div class="card-com">
        <div class="card-com-body">
			<?php
			$result = $conn->query( $sql );
			if ( $result->num_rows > 0 ) {
				while ( $row = $result->fetch_assoc() ) {
					$array = explode( '-', $row['date'] ); ?>
                    <div class="row cart-com-row">
                        <div class="col-md-2">
                            <img src="img/def_face.png" class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center"><?php echo $row['time'] . ' ';
								echo gregorian_to_jalali( $array[0], $array[1], $array[2], '/' ); ?></p>
                        </div>
                        <div class="col-md-10">
                            <h2><?php echo $row['name'] ?></h2>
                            <div class="clearfix"></div>
                            <p><?php echo $row['comment'] ?></p>
<!--                            <p>
                                <a class="float-right btn btn-outline-primary ml-2 btn-lg"> <i class="fa fa-reply fa-lg"></i>
                                    Reply</a>
                                <a class="float-right btn text-white btn-danger btn-lg"> <i class="fa fa-heart fa-lg"></i>
                                    Like <?php /*echo $row['like'] */?> </a>
                            </p>-->
                        </div>
                    </div>

					<?php
				}
			}
			?>
        </div>
    </div>
</div>