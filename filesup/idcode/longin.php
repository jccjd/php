<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/29
 * Time: 10:25
 */

require_once 'check.php';
if(isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['$password'];
    require_once 'conn.php';
    $sql = "select password from t2 WHEN username = '{$username}' and password ='{$password}'";
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
        $dbpass = $row['password'];
        if ($dbpass == $password) {
            echo "登录成功";
        } else {
            echo "重新登录";
        }
}
