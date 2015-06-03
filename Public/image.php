<?php
	header("content-type:image/jpeg");
	session_start();
	//验证码图片
	
	//创建一张空白图片
	$img = imagecreatetruecolor(75,25);
	
	//画矩形当背景色
	$color = imagecolorallocate($img,rand(100,255),rand(100,255),rand(100,255));
	imagefilledrectangle($img,0,0,75,25,$color);
	
	//产生4位随机数，当做验证码
	$showCode = "";//显示的验证码，有空格
	$myCode = "";//存入session的验证码，没空格
	for($i=0;$i<4;$i++)
	{
		$r = rand(0,9);
		$showCode .= $r." ";
		$myCode .= $r;
	}
	$_SESSION["trueCode"] = $myCode;
	
	//画字符串
	$color = imagecolorallocate($img,rand(0,150),rand(0,150),rand(0,150));
	imagestring($img,5,5,5,$showCode,$color);
	
	//画线段
	for($i=0;$i<2;$i++)
	{
		$color = imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
		imageline($img,rand(0,75),rand(0,25),rand(0,75),rand(0,25),$color);
	}
	
	//画点(更改某一点上的象素上)
	for($i=0;$i<100;$i++)
	{
		$color = imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
		imagesetpixel($img,rand(0,75),rand(0,25),$color);
	}
	
	//将图片发送到客户端浏览器
	imagejpeg($img);
	//释放图片占用的内存
	imagedestroy($img);
?>