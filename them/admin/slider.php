<?php
include_once('config.php');
session_start();
if ( $_SESSION["logged"] != true || $_SESSION['access']=='member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
$sql    = "SELECT * FROM slider";
$result = $conn->query( $sql );
?>
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="admin-content-section">
                        <div class="content">
                            <h3 class="content-edit-header">ویرایش اسلایدر</h3>
                            <div class="edit-content">
                                <p class="new-item">افزودن ایتم منو جدید</p>
                                <div>
                                    <form class="form-inline" action="control_slider.php" method="post"
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="image"> انتخاب عکس :</label>
                                            <input type="file" class="form-control-file" name="image" id="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">محتوا متن :</label>
                                            <input type="text" placeholder="محتوای خود را وارد کنید " class="form-control"
                                                   name="content"
                                                   id="content">
                                        </div>
                                        <div class="form-group">
                                            <label for="alt"> متن alt:</label>
                                            <input type="text" placeholder="متن alt را وارد کنید " class="form-control"
                                                   name="alt"
                                                   id="alt">
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
                                                <form class="form-inline" action="control_slider.php" method="post">
                                                    <div class="form-group">
                                                        <img src="<?php echo '/' . $row['imgurl']; ?>"
                                                             class="form-control"
                                                             style="height: 100px!important;width: 100px!important;">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="content">عنوان :</label>
                                                        <input type="text" placeholder="sign" name="content"
                                                               class="form-control"
                                                               id="content"
                                                               value="<?php echo $row['content']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alt">alt :</label>
                                                        <input type="text" placeholder="sign" name="alt"
                                                               class="form-control"
                                                               id="alt"
                                                               value="<?php echo $row['alt']; ?>">
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
