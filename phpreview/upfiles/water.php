<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/1/5
 * Time: 18:00
 * 图片加水印
 */
require 'up.php';
$watering = 'hell0';
$innfo = getimagesize($path.$newname,$innfo);
$nimage = imagecreatetruecolor($image_size[0],$image_size[1]);
$white = imagecolorallocate($nimage,255,255,255);
$black = imagecolorallocate($nimage,0,0,0);

imagefill($nimage,0,0,$white);
switch ($innfo[2]) {
    case 1:
        $simage = imagecreatefromgif($path.$newname);
    case 2:
        $simage = imagecreatefromjpg($path.$newname);
    case 3:
        $simage = imagecreatefrompng($path.$newname);
        break;
    default:
        die("不支持的文件类型");
        exit;
}
imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);
imagestring($nimage,2,3,$image_size[1]-15,$watering,$black);

switch ($innfo[2]) {
    case 1:
        imagejpeg($nimage,$path.$newname);
        break;
    case 2:
        imagegif($nimage,$path.$newname);
        break;
    case 3:
        imagepng($nimage,$path.$newname);
        break;
}
//覆盖原上传文件
imagedestroy($nimage);
imagedestroy($simage);

echo "<br>图片预览<br>";
echo "<img src\"".$path.$newname."\" whidth=".($image_size[0]*2)." height=".($image_size[1]*2).">";