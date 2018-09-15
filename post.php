<?php
include_once( 'pagination.php' );
?>
<div class="row">
    <h2 class="product-header" id="middle">دسته بندی محصولات</h2>
    <div class="all-product" id="prod">
        <div class="row row-content">
            <div class="col post-wrapper">
                <div class="product">
					<?php
					$sql    = "SELECT * FROM post LIMIT $offset, $no_of_records_per_page";
					$result = $conn->query( $sql );
					if ( $result->num_rows > 0 ) {
						while ( $row = $result->fetch_assoc() ) { ?>
                            <div class="post">
                                <a href="single.php?post=<?php echo $row['id']; ?>">
                                    <div class="post-img">
                                        <img src="<?php echo $row['imgUrl']; ?>" alt="<?php echo $row['alt']; ?>">
                                        <div class="title">
                                            <h6><?php echo $row['nam']; ?></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<?php
						}
					}
					?>
                </div>
                <div>
                    <ul class="pag">
                        <li><a href="?pageno=<?php echo $total_pages; ?>">اخرین</a></li>
                        <li class="<?php if ( $pageno >= $total_pages ) {
							echo 'disabled';
						} ?>">
                            <a href="<?php if ( $pageno >= $total_pages ) {
								echo '#';
							} else {
								echo "?pageno=" . ( $pageno + 1 );
							} ?>">بعدی</a>
                        </li>
                        <li class="<?php if ( $pageno <= 1 ) {
							echo 'disabled';
						} ?>">
                            <a href="<?php if ( $pageno <= 1 ) {
								echo '#';
							} else {
								echo "?pageno=" . ( $pageno - 1 );
							} ?>">قبلی</a>
                        </li>
                        <li><a href="?pageno=1">اول</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

