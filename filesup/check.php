<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/27
 * Time: 23:02
 */
header("Content-Type:text/html;charset=utf8");
if (empty($_POST)) {
    die("没有提交表单");

} else {
    $code = isset($_POST['code'])?trim($_POST['code']):'';

}
session_start();
if (empty($_SESSION['verifycode'])) {
    die('验证码过期');
}
//不区分大小写验证
if (strtolower($_SESSION['verifycode']) == strtolower($code)) {
    echo "验证码正确";

} else {
    echo "验证码错误";
}
unset($_SESSION['verifycode']);
header('refresh:3;url=idcode.php');