<?php
    //允许上传的类型
    $uptypes = array(
        'image/jpg',
        'image/png',
        'image/gif',
    );
    $max_file_size = 10000;
    $path = 'uploadimg/';
    $waterstring = 'hello';
    $imagepreviewsize = 2;
?>
<html>
<meta charset="UTF-8">
<head>
    <title>图片上传</title>
</head>
<body>
<form name="upform" method="post" enctype="multipart/form-data">
    上传文件：<input name="upfile" type="file">
    <input type="submit" value="上传">
    只允许<?=implode(', ',$uptypes)?>类型图片
</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/22
 * Time: 19:35
 */
