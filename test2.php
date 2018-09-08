<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Easy and Simple Image Upload</title>
</head>
<body>
<div>
    Uploaded Images:
    <?php
		include('config.php');
		$query=mysqli_query($conn,"select * from slider");
		while($row=mysqli_fetch_array($query)){
			?>
    <img src="<?php echo $row['imgurl']; ?>">
    <?php
		}
	?>
</div>
<div>
    <form method="POST" action="test.php" enctype="multipart/form-data">
        <label>Image:</label><input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>