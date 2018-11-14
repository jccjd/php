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
if ($_FILES['file']['error'] > 0) {
    echo "错误：".$_FILES['file']['error'];
} else {
    echo '文件名：'.$_FILES['file']['name']."<br>";
    echo '文件类型：'.$_FILES['file']['type']."<br>";
    echo '文件大小：'.$_FILES['file']['size']."<br>";
    echo '文件存储位置：'.$_FILES['file']['tmp_name'];
}