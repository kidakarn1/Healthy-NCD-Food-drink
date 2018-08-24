<?php
@SESSION_START();
$allnumchar=$_SESSION['numcaptcha'];

$font ='font/THSarabunNew Bold.ttf';  

header('Content-type: image/png');

$im = imagecreatetruecolor(50,15);
$bg_color = imagecolorallocate($im, 255,255,255);  
$font_color = imagecolorallocate($im, 0, 0, 0 );  

imagefilledrectangle($im, 0, 0, 399, 80, $bg_color);
imagettftext($im, 20, 0, 3, 15, $font_color, $font, $allnumchar);  
imagepng($im);
imagedestroy($im);
?>
