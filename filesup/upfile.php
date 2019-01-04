<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/14
 * Time: 19:29
 * 上传图片将其保存到本地的upload/里
 * 并生成的新名字交由imgwater.php使用
 */

/*保存路径*/
$path = "upload/";
/*水印字符*/
$waterstring = 'hello';
/*图片预览比例*/
$imagepreviewsize = 2;
//允许上传的图片的后缀
$allowedExts = array('gif','jpeg','jpg','png');


$file = $_FILES['file'];
$filename = $file['tmp_name'];
$image_size = getimagesize($filename);

//获取文件后缀
$temp = explode('.',$file['name']);
$extension = end($temp);

/*判断文件大小和类型是否匹配*/
if ( ($file['size'] < 204800) && in_array($extension,$allowedExts)) {

    if ($file['error'] > 0) {

        echo "错误：".$file['error'];

    } else {

        echo '文件名：'.$file['name']."<br>";
        echo '文件类型：'.$file['type']."<br>";
        echo '文件大小：'.$file['size']."<br>";
        echo '文件存储位置：'.$file['tmp_name']."<br>";

        /*判断当前目录下的upload 目录是否存在该文件
          如果没有该目录，创建之
        */
        if (file_exists("upload/".$file['name'])) {
            echo $file['name']."该文件存在";
        } else {
            //如果upload 目录下没有就可以上传到这里了
//            move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_FILES['file']['name']);
//            echo '文件地址：'.'upload/'.$_FILES['file']['name'];
            $newname = date("YmdHis").rand(1000,9000).".jpg";
            $newfilename = 'upload/'.$newname;
            move_uploaded_file($_FILES['file']['tmp_name'],$newfilename);
        }
    }
} else {
    echo "非法格式";
}

