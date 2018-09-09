<?php
session_start();
header('Content-type: image/png');
$captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
$captcha_num = substr(str_shuffle($captcha_num),0 , 6);
$_SESSION["code"] = $captcha_num;
$font = dirname(__FILE__) . '/fonts/captcha.ttf';
$font_size = 30;
$img_width = 200;
$img_height = 100;
$image = imagecreate($img_width, $img_height); // create background image with dimensions
imagecolorallocate($image, 255, 255, 255); // set background color
$text_color = imagecolorallocate($image,125,125,125 ); // set captcha text color
imagettftext($image, $font_size ,10,25,70, $text_color, $font, $captcha_num);
imagejpeg($image);