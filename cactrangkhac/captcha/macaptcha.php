<?php 
session_start();
$captcha = imagecreatefromjpeg('captcha.jpg');


$black = imagecolorallocate($captcha, 0, 0, 0);
$white = imagecolorallocate($captcha, 225, 225, 225);
$red = imagecolorallocate($captcha, 225, 0, 0);

$font = 'UVF LH Line1 Sans Thin.ttf';

//random ma
$string = md5(microtime() * mktime());
$text = substr($string,0,5);
$_SESSION['ma'] = $text;

//in ra
imagettftext($captcha, 15, 5, 15, 25, $white, $font, $text);


header('content-type: image/png');
imagepng($captcha);
?>