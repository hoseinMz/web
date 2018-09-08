<?php
					$sql    = "SELECT content1,content1header,content2,content2header FROM footer";
					$result = $conn->query( $sql );
					if ( $result->num_rows > 0 ) {
					    $row = $result->fetch_assoc();
					    } ;
 ;?>
<div class="row">
    <div id="bottom" class="footer">
        <div class="row">
            <div class="col">
                <div class="footer-one">
                    <h5 class="footer-header">
	                    <?php echo $row['content1header']; ?>
                    </h5>
                    <p class="footer-content">
	                    <?php echo $row['content1']; ?>
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="footer-two">
                    <h5 class="footer-header">
	                    <?php echo $row['content2header']; ?>
                    </h5>
                    <p class="footer-content">
	                    <?php echo $row['content2']; ?>
                    </p>
                </div>
            </div>
            <div class="col-6">
                <div class="footer-three">
                    <h5 class="footer-header">
                        ارتباط با ما
                    </h5>
                    <form action="#" method="post">
                        <table>
                            <tr>
                                <td>
                                    <label for="Name">نام :</label>
                                </td>
                                <td>
                                    <input name="Name" type="text" maxlength="60" style="width:250px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="PhoneNumber">شماره همراه :</label>
                                </td>
                                <td>
                                    <input name="PhoneNumber" type="text" maxlength="43" style="width:250px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="FromEmailAddress">آدرس الکترونیکی :</label>
                                </td>
                                <td>
                                    <input name="FromEmailAddress" type="text" maxlength="90" style="width:250px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Comments">توضیحات : </label>
                                </td>
                                <td>
                                    <textarea name="Comments" rows="7" cols="40" style="width:350px;"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="submit" name="skip_Submit" type="submit" value="ارسال"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

