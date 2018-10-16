<?php
include_once('config.php');
include_once('header.php');
include_once('header-menu.php');
$search = $_POST['search'];
secure($search);
$sql    = "SELECT * FROM post WHERE postnam LIKE '%$search%'";
$result = $conn->query( $sql );
?>
<div class="row">
	<?php
	if ( $result->num_rows > 0 ) { ?>
    <h2 class="result">نتایج جستجو برای : <?php echo $search; ?></h2>
    <div id="prod">
        <div class="row prode">
			<?php
			while ( $row = $result->fetch_assoc() ) {
				?>
                <div class="col">
                    <div class="card card-cascade card-ecommerce" style="width: 40rem;margin: 10px 0;">
                        <div class="card card-cascade card-ecommerce">
                            <!--Card image-->
                            <div class="view view-cascade overlay">
                                <img class="card-img-top" src="<?php echo $row['imgUrl']; ?>"
                                     alt="<?php echo $row['alt']; ?>">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--/.Card image-->
                            <!--Card content-->
                            <div class="card-body card-body-cascade text-center">
                                <!--Category & Title-->
                                <h5><?php echo $row['category']; ?></h5>
                                <h4 class="card-title"><strong><a
                                                href="single.php?post=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></strong>
                                </h4>

                                <!--Description-->
                                <p class="card-text"><?php echo substr( $row['description'], 0, 250 ); ?></p>
                                <a href="single.php?post=<?php echo $row['id']; ?>" class="btn btn-primary">ادامه
                                    مطلب</a>
                                <!--Card footer-->
                                <div class="card-footer">
                                    <span class="float-left"><?php echo $row['price']; ?>$</span>
                                    <span class="float-right"><a class="" data-toggle="tooltip" data-placement="top"
                                                                 title="Add to Wishlist"><i
                                                    class="fa fa-heart"></i></a><?php echo $row['like']; ?></span>
                                </div>

                            </div>
                            <!--/.Card content-->

                        </div>
                    </div>
                </div>
				<?php
			} ?>
        </div>
    </div>
</div>
<?php
} else {
	?>
    <h2 class="result">متاسفانه نتیجه ای یافت نشد </h2>
	<?php
} ?>
</div>
</div>
<?php
include_once('footer-content.php'); ?>
<!--/.Card-->