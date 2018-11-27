<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/27
 * Time: 19:39
 * 登录 验证码 1，
 */
$img_w = 70;
$img_h = 25;
$code_len = 5;
$code_font = 5;
/*需要用到的数字或字母*/
$code = array_merge(range('A', 'Z'), range('a', 'z'), range(1, 9));
/*验证码对应的$code的键值*/
$keyCode = array_rand($code, $code_len);
if ($code_len == 1) {
    $keyCode = array($keyCode);
}
//洗牌打乱
shuffle($keyCode);
$verifyCode = "";
foreach ($keyCode as $key) {
    //真正的验证码
    $verifyCode .= $code[$key];
}
session_start();
$_SESSION['verifycode'] = $verifyCode;
//生成画布
$img = imagecreatetruecolor($img_w, $img_h);
//画布颜色
$bg_color = imagecolorallocate($img, 110, 110, 124);
imagefill($img, 0, 0, $bg_color);

//设置干扰点
for ($i = 0; $i <= 300; $i++) {
    //点的随机颜色
    $color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    /*加点*/
    imagesetpixel($img, mt_rand(0, $img_w), mt_rand(0, $img_h), $color);
}

/*为验证码加边框*/

$border_color = imagecolorallocate($img, 0, 200,0 );
imagerectangle($img, 0, 0, $img_w - 1, $img_h - 1,$border_color);

/*字符串颜色*/
$string_color = imagecolorallocate($img, mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
$font_w = imagefontwidth($code_font);
$font_h = imagefontheight($code_font);

//验证码总长度
$code_sum_w = $font_w * $code_len;
//写入验证码
imagestring($img, $code_font, ($img_w - $code_sum_w) / 2,($img_h - $font_h) / 2,$verifyCode,$string_color);
/*输入验证码图片格式*/
header('Content-type:image/png');
imagepng($img);
imagedestroy($img);

