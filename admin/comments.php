<?php
include_once( 'config.php' );
$sql    = "SELECT * FROM comments left OUTER JOIN post ON comments.postid=post.id";
$result = $conn->query( $sql );
?>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="admin-content-section">
                        <div class="content">
                            <h3 class="content-edit-header">دیدگاه ها</h3>
                            <div class="edit-content">
                                <hr class="hr">
                                <div class="fetch-item">
									<?php
									if ( $result->num_rows > 0 ) {
										$i = 1;
										while ( $row = $result->fetch_assoc() ) {
											?>
                                            <div id="<?php echo $row['cmid']; ?>">
                                                <span class="badge badge-primary"><?php echo $i; ?></span>
                                                <div class="form-inline">
                                                    <div class="clist" >
                                                        <ul>
                                                            <li><?php echo $row['name']; ?></li>
                                                            <li><?php echo $row['email']; ?></li>
                                                            <li><?php echo substr( $row['comment'], 0, 50 ); ; ?></li>
                                                            <li><?php echo $row['time']; ?></li>
                                                            <li><?php echo $row['date']; ?></li>
                                                            <li><?php echo $row['postnam']; ?></li>
                                                            <li>
                                                                <input type="submit" id="<?php echo $row['cmid']; ?>" class="action btn btn-primary btn-sm" name="action"
                                                                       value="approv"/>
                                                                <input type="submit" id="<?php echo $row['cmid']; ?>" class="action btn btn-danger btn-sm" name="action"
                                                                       value="delete"/>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
											<?php
											$i ++;
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

<script>
    $(document).ready(function () {
        $(".action").click(function () {
            let id = $(this).attr('id');
            let value = $(this).attr('value');
            $.ajax({
                url: 'control_comments.php',
                Type: 'get',
                data: {'id': id,
                    'value':value},
                success: function (data) {
                    $("div#"+id).css("display", "none");
                    console.log(data);
                },
            });
        });
    });
</script>
