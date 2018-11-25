<?php
    //允许上传的类型
    $uptypes = array(
        'image/jpg',
        'image/png',
        'image/gif',
    );
    $max_file_size = 100000;
    $path = 'upload/';
    $waterstring = 'hello';
    $imagepreviewsize = 1/2;
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/22
 * Time: 19:35
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //判断图片是否存在
    if (!is_uploaded_file($_FILES['upfile']['tmp_name'])) {
        echo '该图片不存在';
        exit;
    }

    $file = $_FILES['upfile'];
    $filename = $file['tmp_name'];
    $image_size = getimagesize($filename);
    $pinfo = pathinfo($file['name']);

    //检查图片大小
    if ($max_file_size < $file['size']) {
        echo '文件太大';
        exit;
    }
    //检查文件类型
    if (!in_array($file['type'],$uptypes)) {
        echo '文件类型不符'.$file['type'];
        exit;
    }
    //创建图片文件夹
    if (!file_exists($path)) {
        mkdir($path);
    }
    //复制文件
    //文件后缀
    $fileExt = substr($file['name'],strripos($file['name'],'.'));
    $newname = date('YmdHis',time()).rand(1000,9999).$fileExt;
    if(!move_uploaded_file($filename,$path.$newname)) {
        echo "复制文件出错";
        exit;
    }
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
}