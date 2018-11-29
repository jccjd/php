<!DOCTYPE html>
<html lang="en" xmlns:color="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="post">
    用户名： <input type="text" id="username" name="username"><br>
    密 码： <input type="password" id="password" name="password"><br>
    <input type="submit" id="login" name="login" value="登录">
</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/29
 * Time: 10:25
 */

//require_once 'check.php';
if(isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['$password'];

    require_once 'conn.php';

    $sql = "select password from t2 WHEN username = 'username' ";
    $res = mysql_query($sql);
    if ($row = mysql_fetch_assoc($res)) {
        $dbpass = $row['password'];
        if ($dbpass == $password) {
            echo "登录成功";

        } else {
            echo "重新登录";
        }

    }



}
