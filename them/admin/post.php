<?php
include_once('config.php');
include_once('header.php');
session_start();
if ($_SESSION["logged"] != true || $_SESSION['access'] == 'member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
$sql = "SELECT * FROM post";
$result = $conn->query($sql);
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
                            <form class="form-inline" method="post" action="control_post.php"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">نام :</label>
                                    <input type="text" placeholder="نام را وارد کنید " class="form-control"
                                           name="name"
                                           id="name">
                                </div>
                                <div class="form-group">
                                    <label for="alt"> متن alt:</label>
                                    <input type="text" placeholder="متن alt را وارد کنید " class="form-control"
                                           name="alt"
                                           id="alt">
                                </div>
                                <div class="form-group">
                                    <label for="category">category :</label>
                                    <input type="text" placeholder="category" name="category"
                                           class="form-control"
                                           id="category">
                                </div>
                                <div class="form-group">
                                    <label for="price">price :</label>
                                    <input type="text" placeholder="price" name="price"
                                           class="form-control"
                                           id="price">
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیحات :</label>
                                    <textarea placeholder="توضیحات" name="description" cols="40" rows="5"
                                              class="form-control"
                                              id="description">
												</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="img-thumb"> انتخاب عکس :</label>
                                    <input type="file" class="form-control-file" name="img" id="img-thumb">
                                </div>
                                <input type="submit" class="btn btn-primary" name="action" value="add">
                            </form>
                        </div>
                    </div>
                    <hr class="hr">
                    <p class="edit-item">ایتم های موجود</p>
                    <div class="fetch-item">
                        <?php
                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div id="<?php echo $row['id']; ?>">
                                    <span class="badge badge-primary"><?php echo $i; ?></span>
                                    <div class="form-inline">
                                        <div class="form-group" id="theForm">
                                            <img src="<?php echo '/' . $row['thumb_img']; ?>"
                                                 class="form-control"
                                                 style="height: 100px!important;width: 100px!important;">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">نام :</label>
                                            <input type="text" placeholder="sign" name="name"
                                                   class="form-control"
                                                   id="name<?php echo $row['id']; ?>"
                                                   value="<?php echo $row['postnam']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alt">alt :</label>
                                            <input type="text" placeholder="sign" name="alt"
                                                   class="form-control"
                                                   id="alt<?php echo $row['id']; ?>"
                                                   value="<?php echo $row['alt']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">category :</label>
                                            <input type="text" placeholder="category" name="category"
                                                   class="form-control"
                                                   id="category<?php echo $row['id']; ?>"
                                                   value="<?php echo $row['category']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">price :</label>
                                            <input type="text" placeholder="price" name="price"
                                                   class="form-control"
                                                   id="price<?php echo $row['id']; ?>"
                                                   value="<?php echo $row['price']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">توضیحات :</label>
                                            <textarea placeholder="توضیحات" name="description" cols="55" rows="7"
                                                      class="form-control"
                                                      id="description<?php echo $row['id']; ?>">
													 <?php echo $row['description']; ?>
												</textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="action btn btn-primary btn-sm"
                                                   onclick='send(this.value,<?php echo $row['id']; ?>)'
                                                   id="<?php echo $row['id']; ?>"
                                                   name="action" value="update"/>
                                            <input type="submit" class="action btn btn-danger btn-sm"
                                                   onclick='send(this.value,<?php echo $row['id']; ?>)'
                                                   id="<?php echo $row['id']; ?>"
                                                   name="action" value="delete"/>
                                        </div>
                                    </div>
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
<script>
    function send(val, idd) {
        let id = idd;
        let postnam = $("#name" + idd).val();
        let description = $("#description" + idd).val();
        let alt = $("#alt" + idd).val();
        let category = $("#category" + idd).val();
        let price = $("#price" + idd).val();
        let value = val;
        $.ajax({
            url: 'control_post.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'postnam': postnam,
                'description': description,
                'alt': alt,
                'category': category,
                'price': price,
                'value': value
            },
            success: function (data) {
            },
        });
        $("div#"+idd).css("display", "none");
    }

</script>
