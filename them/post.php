<?php
include_once('pagination.php');
?>
<script>
    $(document).ready(function () {
        $(".action-like").click(function () {
            let id = $(this).attr('id');
            $.ajax({
                url: 'like.php',
                Type: 'get',
                data: {'id': id},
                success: function (data) {
                    //$("a#"+id).css("display", "none");
                        jQuery("span#" + id).text(data);
                        console.log(data);
                },
            });
        });
    });
</script>
<div class="row">
    <h2 class="product-header" id="middle">دسته بندی محصولات</h2>
    <div id="prod">
        <div class="row prode">
			<?php
			$sql    = "SELECT * FROM post LIMIT $offset, $no_of_records_per_page";
			$result = $conn->query( $sql );
			if ( $result->num_rows > 0 ) {
				while ( $row = $result->fetch_assoc() ) { ?>
                    <div class="col">
                        <div class="card card-cascade card-ecommerce" style="width: 40rem;margin: 10px 0;">
                            <div class="card card-cascade card-ecommerce">
                                <div class="view view-cascade overlay">
                                    <img class="card-img-top" src="<?php echo $row['thumb_img']; ?>"
                                         alt="<?php echo $row['alt']; ?>">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <div class="card-body card-body-cascade text-center">
                                    <h5><?php echo $row['category']; ?></h5>
                                    <h4 class="card-title"><strong><a
                                                    href="single.php?post=<?php echo $row['id']; ?>"><?php echo $row['postnam']; ?></a></strong>
                                    </h4>

                                    <!--Description-->
                                    <p class="card-text"><?php echo substr( $row['description'], 0, 250 ); ?></p>
                                    <a href="single.php?post=<?php echo $row['id']; ?>" class="btn btn-primary">ادامه
                                        مطلب</a>
                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <span class="float-left"><?php echo $row['price']; ?>$</span>
                                        <span class="float-right" id="<?php echo $row['id']; ?>">
                                            <a class="action-like" data-toggle="tooltip" data-placement="top"
                                               id="<?php echo $row['id']; ?>" title="Add to Wishlist"
                                               style="color: red">
                                                <i class="fa fa-heart"></i>
                                            </a><?php echo $row['likecount']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
				}
			}
			?>

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

