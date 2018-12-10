<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/28
 * Time: 22:04
 */

//要用到的字符
$code = array_merge(range('A','Z'),range('a','z'),range(1,9));
$keyCode = array_rand($code, 4);
shuffle($keyCode);
$verifyCode = "";
foreach ($keyCode as $key) {
    /*得到真的验证码值*/
    $verifyCode .= $code[$key];
}
session_start();
$_SESSION['verifycode'] = $verifyCode;
//生成画布
$img = imagecreatetruecolor(100,40);
$bg_color = imagecolorallocate($img, 100,100,100);
imagefill($img,0,0,$bg_color);
//设置干扰点
for ($i = 0; $i <= 20; $i++) {
    //点的随机颜色
    $color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    /*加点*/
    imagesetpixel($img, mt_rand(0, 100), mt_rand(0, 40), $color);
}

/*为验证码加边框*/
$border_color = imagecolorallocate($img, 0, 200,0 );
imagerectangle($img, 0, 0, 100 - 1, 40 - 1,$border_color);

/*字符串颜色*/
$textcolor = imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
//写入验证码
imagestring($img,5,30, 13,$verifyCode,$textcolor);

/*输入验证码图片格式*/
header('Content-type: image/png');
imagepng($img);







