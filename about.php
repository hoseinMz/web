<div class="row">
	<div class="col">
		<div class="section-image" name="about">
			<?php
			$sql    = "SELECT text,headerImg,alt,imgurl,headerText FROM about";
			$result = $conn->query( $sql );
			if ( $result->num_rows > 0 ) {
			// output data of each row
			while ( $row = $result->fetch_assoc() ) {
			?>
			<h1 class="section-header"><?php echo $row['headerImg']; ?></h1>
			<img src="<?php echo $row['imgurl']; ?>">
		</div>
	</div>
	<div class="col">
		<div class="section">
			<h1 class="section-header"><?php echo $row['headerText']; ?></h1>
			<p><?php echo $row['text']; ?></p>
		</div>
		<?php
		}
		} ?>
	</div>
</div>