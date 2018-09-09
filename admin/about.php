<?php
include_once( 'config.php' );
$sql    = "SELECT * FROM about";
$result = $conn->query( $sql );
?>
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<div class="admin-content-section">
						<div class="content">
							<h3 class="content-edit-header">ویرایش درباره ما</h3>
							<div class="edit-content">
								<h5 class="edit-item">درباره ما </h5>
								<div class="fetch-item">
									<?php
									if ( $result->num_rows > 0 ) {
										$row = $result->fetch_assoc() ;
										?>
										<div>
											<form class="form-inline" action="control_about.php" method="post">
												<div class="form-group">
													<label for="text"> متن :</label>
													<textarea placeholder="محتوای اول" name="text" cols="45" rows="7"
													          class="form-control" id="text">
														<?php echo $row['text']; ?>
														</textarea>
												</div>
												<div class="form-group">
													<label for="massage-header"> هدر متن :</label>
													<input type="text" placeholder="هدر متن" name="massage-header"
													       class="form-control" id="massage-header"
													       value="<?php echo $row['headerText']; ?>">
												</div>
												<div class="form-group">
													<label for="image"> انتخاب عکس :</label>
													<input type="file" class="form-control-file" name="image" id="image">
												</div>
												<div class="form-group">
													<label for="img-header"> هدر عکس :</label>
													<input type="text" placeholder="هدر عکس" name="img-header"
													       class="form-control" id="img-header"
													       value="<?php echo $row['headerImg']; ?>">
												</div>
												<div class="form-group">
													<label for="alt">alt عکس :</label>
													<input type="text" placeholder="alt عکس" name="alt"
													       class="form-control"
													       id="alt"
													       value="<?php echo $row['alt']; ?>">
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-primary btn-sm blo" name="action"
													       value="update"/>
													<input type="submit" class="btn btn-danger btn-sm" name="action"
													       value="delete"/>
													<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
												</div>

											</form>
											<hr>
										</div>
										<?php
									}; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
include_once( 'footer.php' ) ?>