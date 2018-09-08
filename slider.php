<div class="row">
    <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
	            <?php
	            $sql    = "SELECT imgurl, content,alt FROM slider";
	            $result = $conn->query( $sql );

	            if ( $result->num_rows > 0 ) {
		            // output data of each row
                    $var="active";
		            while ( $row = $result->fetch_assoc() ) {
			            ?>
                        <div class="carousel-item <?php echo $var;?>">
                            <img class="d-block w-100" src="<?php echo $row['imgurl']; ?>" alt="<?php echo $row['alt']; ?>">
                            <h2 class="centered "><?php echo $row['content']; ?></h2>
                        </div>
			            <?php
                        $var=" ";
		            }
	            } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
