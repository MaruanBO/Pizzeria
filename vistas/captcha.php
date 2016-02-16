<?php

header("Content-type: image/png");
$im = imagecreatefrompng("img/captcha.png");

$textColor = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);

$font = './fonts/captcha.ttf';

$px = (imagesx($im) - 22 * strlen($_COOKIE['key'])) / 3;

imagettftext($im, rand(19, 20), rand(-2, 14), $px, rand(40, 50), $black, $font, $_COOKIE['key']);
imagepng($im);
imagedestroy($im);
