<?php
include_once( 'config.php' );
$sql    = "SELECT * FROM topbar";
$result = $conn->query( $sql );
?>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="admin-content-section">
                        <div class="content">
                            <h3 class="content-edit-header">ویرایش منوی اصلی</h3>
                            <div class="edit-content">
                                <p class="new-item">افزودن ایتم منو جدید</p>
                                <div>
                                    <form class="form-inline" action="control_top_bar.php" method="post">
                                        <div class="form-group">
                                            <label for="link"> لینک :</label>
                                            <input type="text" placeholder="link" class="form-control" name="link"
                                                   id="link">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">اسم :</label>
                                            <input type="text" placeholder="title for link" class="form-control"
                                                   name="title"
                                                   id="new-title">
                                        </div>
                                        <input type="submit" class="btn btn-default" name="action" value="add">
                                    </form>
                                </div>
                                <hr class="hr">
                                <p class="edit-item">ایتم های موجود</p>
                                <div class="fetch-item">
									<?php
									if ( $result->num_rows > 0 ) {
										$i=1;
										while ( $row = $result->fetch_assoc() ) {
											?>
                                            <div>
                                                <span class="badge badge-primary"><?php echo $i; ?></span>
                                                <form class="form-inline" action="control_top_bar.php" method="post">
                                                    <div class="form-group">
                                                        <label for="link"> لینک :</label>
                                                        <input type="text" placeholder="#" name="link"
                                                               class="form-control" id="link"
                                                               value="<?php echo $row['link']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">اسم :</label>
                                                        <input type="text" placeholder="sign" name="title"
                                                               class="form-control"
                                                               id="title"
                                                               value="<?php echo $row['title']; ?>">
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm" name="action"
                                                           value="update"/>
                                                    <input type="submit" class="btn btn-danger btn-sm" name="action"
                                                           value="delete"/>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                                                </form>
                                                <hr>
                                            </div>
											<?php
                                            $i++;
										};
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