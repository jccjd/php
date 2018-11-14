<html>
<meta charset="UTF-8">
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/14
 * Time: 19:29
 */

/*
 * 上传限制
 * */
//允许上传的图片有后缀
$allowedExts = array('gif','jpeg','jpg','png');
$temp = explode('.',$_FILES['file']['name']);
//获取文件后缀
$extension = end($temp);
if (
    (
        ( $_FILES['file']['type'] == 'image/gif') ||
        ( $_FILES['file']['type'] == 'image/jpg') ||
        ( $_FILES['file']['type'] == 'image/png')
    )
    && ($_FILES['file']['size'] < 204800)
    && in_array($extension,$allowedExts)) {

    if ($_FILES['file']['error'] > 0) {
        echo "错误：".$_FILES['file']['error'];
    } else {
        echo '文件名：'.$_FILES['file']['name']."<br>";
        echo '文件类型：'.$_FILES['file']['type']."<br>";
        echo '文件大小：'.$_FILES['file']['size']."<br>";
        echo '文件存储位置：'.$_FILES['file']['tmp_name']."<br>";

        /*判断当前目录下的upload 目录是否存在该文件
          如果没有该目录，创建之
        */
        if (file_exists("upload/".$_FILES['file']['name'])) {
            echo $_FILES['file']['name']."该文件存在";
        } else {
            //如果upload 目录下没有就可以上传到这里了
            move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_FILES['file']['name']);
            echo '文件地址：'.'upload/'.$_FILES['file']['name'];
        }
    }
} else {
    echo "非法格式";
}

