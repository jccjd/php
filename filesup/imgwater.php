<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/26
 * Time: 21:02
 */
require "upfile.php";
//图片加水印
$iinfo = getimagesize($path.$newname,$iinfo);
$nimage = imagecreatetruecolor($image_size[0],$image_size[1]);
$white = imagecolorallocate($nimage,255,255,255);
$black=imagecolorallocate($nimage,0,0,0);

imagefill($nimage,0,0,$white);
switch ($iinfo[2]) {
    case 1:
        $simage = imagecreatefromgif($path.$newname);
    case 2:
        $simage = imagecreatefromjpeg($path.$newname);
    case 3:
        $simage = imagecreatefrompng($path.$newname);
        break;
    default:
        die("不支持的文件类型");
        exit;
}
imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);
imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);

switch ($iinfo[2])
{
    case 1:
        imagejpeg($nimage, $path.$newname);
        break;
    case 2:
        imagejpeg($nimage, $path.$newname);
        break;
    case 3:
        imagepng($nimage, $path.$newname);
        break;
    case 6:
        imagewbmp($nimage, $path.$newname);
        //imagejpeg($nimage, $destination);
        break;
}

//覆盖原上传文件
imagedestroy($nimage);
imagedestroy($simage);

echo "<br>图片预览:<br>";
echo "<img src=\"".$path.$newname."\" width=".($image_size[0]*$imagepreviewsize)." height=".($image_size[1]*$imagepreviewsize);
echo " alt=\"图片预览:\r文件名:".$path.$newname."\r上传时间:\">";