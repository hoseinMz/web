<?php
include_once('config.php');
session_start();
if ( $_SESSION["logged"] != true || $_SESSION['access']=='member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
$sql    = "SELECT * FROM footer";
$result = $conn->query( $sql );
?>
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col">
					<div class="admin-content-section">
						<div class="content">
							<h3 class="content-edit-header">ویرایش پانویس</h3>
							<div class="edit-content">
								<h5 class="edit-item">پانویس های موجود</h5>
								<div class="fetch-item">
									<?php
									if ( $result->num_rows > 0 ) {
										$row = $result->fetch_assoc() ;
											?>
											<div>
												<form class="form-inline" action="control_footer.php" method="post">
													<div class="form-group">
														<label for="content1"> محتوای اول :</label>
														<textarea placeholder="محتوای اول" name="content1" cols="45" rows="7"
														       class="form-control" id="content1">
														<?php echo $row['content1']; ?>
														</textarea>
													</div>
													<div class="form-group">
														<label for="content2">محتوای دوم :</label>
														<textarea  placeholder=" محتوای دوم" name="content2" cols="45" rows="7"
														       class="form-control"
														       id="content2">
															<?php echo $row['content2']; ?>
														</textarea>
													</div>
													<div class="form-group">
														<label for="content1header"> هدر اول :</label>
														<input type="text" placeholder="هدر اول" name="content1header"
														       class="form-control" id="content1header"
														       value="<?php echo $row['content1header']; ?>">
													</div>
													<div class="form-group">
														<label for="content2header">هدر دوم :</label>
														<input type="text" placeholder=" هدر دوم" name="content2header"
														       class="form-control"
														       id="content2header"
														       value="<?php echo $row['content2header']; ?>">
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
include_once('footer.php') ?>