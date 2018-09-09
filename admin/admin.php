<?php
include_once( 'config.php' );
include_once( 'header.php' ); ?>
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
                <li class="list-item">
                    <button class="btn" id="social">شبکه های اجتماعی</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="main-menu">منوی اصلی</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="slider">اسلایدر</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="post">پست ها</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="about">درباره ما</button>
                </li>
                <li class="list-item">
                    <button class="btn" id="footer">فوتر</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-10" id="summary">

    </div>
	<?php
	//include_once( 'social_media.php' );
	include_once( 'footer.php' ) ?>




