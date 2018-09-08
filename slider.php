<?php
include_once ('config.php');
function make_query($conn)
{
	$query = "SELECT * FROM slider ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
	return $result;
}
function make_slide_indicators($conn)
{
	$output = '';
	$count = 0;
	$result = make_query($conn);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
		}
		else
		{
			$output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
		}
		$count = $count + 1;
	}
	return $output;
}
function make_slides($conn)
{
	$output = '';
	$count = 0;
	$result = make_query($conn);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '<div class="item active">';
		}
		else
		{
			$output .= '<div class="item">';
		}
		$output .= '
   <img src="'.$row["imgurl"].'" alt="'.$row["alt"].'" />
   <div class="centered">
    <h3>'.$row["content"].'</h3>
   </div>
  </div>
  ';
		$count = $count + 1;
	}
	return $output;
}
?>
<div class="row">
    <div class="col">
        <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
			    <?php echo make_slide_indicators($conn); ?>
            </ol>

            <div class="carousel-inner">
			    <?php echo make_slides($conn); ?>
            </div>
            <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</div>
