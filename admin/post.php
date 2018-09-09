<?php
include_once( 'config.php' );
$sql    = "SELECT * FROM post";
$result = $conn->query( $sql );
?>
<div class="col">
    <div class="row">
        <div class="col">
            <div class="admin-content-section">
                <div class="content">
                    <h3 class="content-edit-header">ویرایش پست ها</h3>
                    <div class="edit-content">
                        <p class="new-item">افزودن پست جدید</p>
                        <div>
                            <form class="form-inline" action="control_post.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="img-thumb"> انتخاب عکس :</label>
                                    <input type="file" class="form-control-file" name="img-thumb" id="img-thumb">
                                </div>
                                <div class="form-group">
                                    <label for="name">نام :</label>
                                    <input type="text" placeholder="نام را وارد کنید " class="form-control"
                                           name="name"
                                           id="content">
                                </div>
                                <div class="form-group">
                                    <label for="alt"> متن alt:</label>
                                    <input type="text" placeholder="متن alt را وارد کنید " class="form-control"
                                           name="alt"
                                           id="alt">
                                </div>
                                <div class="form-group">
                                    <label for="img-single"> انتخاب عکس بزرگ :</label>
                                    <input type="file" class="form-control-file" name="img-single" id="img-single">
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیحات :</label>
                                    <textarea placeholder="توضیحات" name="description" cols="40" rows="5"
                                              class="form-control"
                                              id="description">
												</textarea>
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
                                        <form class="form-inline" action="control_post.php" method="post">
                                            <div class="form-group">
                                                <label for="img-thumb"> عکس :</label>
                                                <input type="text" placeholder="لینک عکس" name="img-thumb"
                                                       class="form-control " id="img-thumb"
                                                       value="<?php echo $row['imgUrl']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="img-single"> عکس بزرگ :</label>
                                                <input type="text" placeholder="لینک عکس" name="img-single"
                                                       class="form-control " id="img-single"
                                                       value="<?php echo $row['singleImg']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">نام :</label>
                                                <input type="text" placeholder="sign" name="name"
                                                       class="form-control"
                                                       id="name"
                                                       value="<?php echo $row['nam']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="alt">alt :</label>
                                                <input type="text" placeholder="sign" name="alt"
                                                       class="form-control"
                                                       id="alt"
                                                       value="<?php echo $row['alt']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">توضیحات :</label>
                                                <textarea placeholder="توضیحات" name="description" cols="55" rows="7"
                                                          class="form-control"
                                                          id="description">
													 <?php echo $row['description']; ?>
												</textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-sm" name="action"
                                                       value="update"/>
                                                <input type="submit" class="btn btn-danger btn-sm" name="action"
                                                       value="delete"/>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                                            </div>
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
