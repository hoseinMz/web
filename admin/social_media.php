<?php
include_once( 'config.php' );
$sql    = "SELECT * FROM header";
$result = $conn->query( $sql );
?>
<div class="col">
    <div class="row">
        <div class="col">
            <div class="admin-content-section">
                <div class="content">
                    <h3 class="content-edit-header">ویرایش شبکه های اجتماعی</h3>
                    <div class="edit-content">
                        <p class="new-item">افزودن ایتم جدید</p>
                        <div>
                            <form class="form-inline" action="control-social-media.php" method="post">
                                <div class="form-group">
                                    <label for="link"> لینک :</label>
                                    <input type="text" placeholder="link" class="form-control" name="link" id="link">
                                </div>
                                <div class="form-group" >
                                    <label for="class"> کلاس :</label>
                                    <input type="text" placeholder="class name" class="form-control" name="class" id="class">
                                </div>
                                <div class="form-group">
                                    <label for="title">اسم :</label>
                                    <input type="text" placeholder="title for tooltip" class="form-control" name="title"
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
								while ( $row = $result->fetch_assoc() ) {
									?>
                                    <div>
                                        <form class="form-inline" action="control-social-media.php" method="post">
                                            <div class="form-group">
                                                <a href="<?php echo $row['link']; ?>">
                                                    <i class="<?php echo $row['class']; ?>"
                                                       data-toggle="tooltip" data-placement="bottom"
                                                       title="<?php echo $row['title']; ?>"></i></a>
                                            </div>
                                            <div class="form-group">
                                                <label for="link"> لینک :</label>
                                                <input type="text" placeholder="#"  name="link"  class="form-control" id="link"
                                                       value="<?php echo $row['link']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="class"> کلاس :</label>
                                                <input type="text" placeholder="fa fa-sign-in fa-lg" name="class"
                                                       class="form-control"
                                                       id="class"
                                                       value="<?php echo $row['class']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="title">اسم :</label>
                                                <input type="text" placeholder="sign" name="title" class="form-control"
                                                       id="title"
                                                       value="<?php echo $row['title']; ?>">
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-sm" name="action" value="update"/>
                                            <input type="submit" class="btn btn-danger btn-sm" name="action" value="delete"/>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                                        </form>
                                        <hr>
                                    </div>
									<?php
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





