<?php

/*$str=md5(rand());
$str=substr($str,0,6);
session_start();
$_SESSION['capp']=$str;

$img=imagecreate(100,50);
imagecolorallocate($img,330,220,100);
$txtcol=imagecolorallocate($img,0,0,0);
imagestring($img,20,5,5,$str,$txtcol);*/

$word="";
        $image = imagecreatetruecolor(250, 80);
		$background_color = imagecolorallocate($image, 255, 255, 255);  
		imagefilledrectangle($image,0,0,250, 150,$background_color);
		$line_color = imagecolorallocate($image, 64,64,64); 
		for($i=0;$i<5;$i++) {
			imageline($image,0,rand()%80,250,rand()%80,$line_color);
		}
		$pixel_color = imagecolorallocate($image, 0,0,255);
		for($i=0;$i<1000;$i++) {
    		imagesetpixel($image,rand()%250,rand()%80,$pixel_color);
		}  
		$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
		$len = strlen($letters);
		$letter = $letters[rand(0, $len-1)];
		
		$text_color = imagecolorallocate($image, 0,0,0);
		for ($i = 0; $i< 6;$i++) {
			$letter = $letters[rand(0, $len-1)];
			imagestring($image, 5,  5+($i*30), 20, $letter, $text_color);
			$word.=$letter;
		}
		session_start();
		$_SESSION['captcha_code'] = $word;
imagejpeg($image);
?>


