<?php
#Genrate Securitycode
session_start();
//header("Content-type: image/png");
echo $ranNUm = rand(1000,9999);
$_SESSION['security_code'] = $ranNUm;
//$img = imagecreate(78,25);
//$color = imagecolorallocate( $img , 200 , 200 ,200);
//$text_color =imagecolorallocate($img , 0,0,0);
//imagestring($img,10,10,5,$ranNUm ,$text_color);
//imagepng($img);
//imagedestroy($img);
?>