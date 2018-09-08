<?php
include_once( 'config.php' );
include_once( 'header.php' );
include_once( 'config.php' );
$sql    = "SELECT * FROM topbar";
$result = $conn->query( $sql );
?>
    <div class="row">
        <div class="col">
            <nav id="header">
                <div class="top">
                    <ul class="admin-bar">
                        <li class="sign"><a href="#"><i class="fa fa-sign-out fa-lg" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        title="خروج"></i></a></li>
                        <li class="text">به پنل مدیریتی خوش امدید</li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="admin-list-menu">
                <ul class="list-menu">
                    <li class="list-item">شبکه های اجتماعی</li>
                    <li class="list-item">منو هدر</li>
                    <li class="list-item">اسلایدر</li>
                    <li class="list-item">پست ها</li>
                    <li class="list-item">فوتر</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="admin-content-section">
                        <div class="content">
                            <h3 class="content-edit-header">ویرایش منوی اصلی</h3>
                            <div class="edit-content">
                                <p class="new-item">افزودن ایتم منو جدید</p>
                                <div>
                                    <form class="form-inline" action="control-menu.php" method="post">
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
										while ( $row = $result->fetch_assoc() ) {
											?>
                                            <div>
                                                <form class="form-inline" action="control-menu.php" method="post">
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