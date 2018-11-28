<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/28
 * Time: 22:04
 */

//要用到的字符
$code = array_merge(range('A','Z'),range('a','z'),range(1,9));
$keyCode = array_rand($code, 4);
print_r($keyCode);
shuffle($keyCode);

$verifyCode = "";
foreach ($keyCode as $key) {
    print "key->".$key;echo '<br>';
    $verifyCode .= $code[$key];
//    print $code[$key];echo '<br>';
}
print_r($verifyCode);