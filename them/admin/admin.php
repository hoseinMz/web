<?php
session_start();
if ( $_SESSION["logged"] != true || $_SESSION['access']=='member') {
	echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
	exit();
}
include_once('config.php');
include_once('header.php'); ?>
<div class="row">
    <div class="col">
        <nav id="header">
            <div class="top">
                <ul class="admin-bar">
                    <li class="sign"><a href="logout.php"><i class="fa fa-sign-out fa-lg" data-toggle="tooltip"
                                                             data-placement="bottom"
                                                             title="خروج"></i></a></li>
                    <li class="text"><?php echo $_SESSION['name']; ?> به پنل مدیریتی خوش امدید</li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <div class="admin-list-menu">
            <ul class="list-menu">
                <li class="list-item">
                    <button class="btn" id="social_media" onclick="reload(this)">شبکه های اجتماعی</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="top_bar" onclick="reload(this)">منوی اصلی</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="slider" onclick="reload(this)">اسلایدر</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="post" onclick="reload(this)">پست ها</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="about" onclick="reload(this)">درباره ما</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="footer_content" onclick="reload(this)">فوتر</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="comments" onclick="reload(this)">دیدگاه ها</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-10" id="load-section">
    </div>
	<?php
	include_once('footer.php');
	?>
