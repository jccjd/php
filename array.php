<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/27
 * Time: 22:57
 */
$red_num = range(1,33);
$keys = array_rand($red_num,6);
shuffle($keys);
foreach ($keys as $v) {
    $red[] = $red_num[$v] < 10 ? ('0'.$red_num[$v]) : $red_num[$v];
}
$blue_num = rand(1,16);
$blue = $blue_num < 10 ? ('0'.$blue_num) : $blue_num;
foreach ($red as $v) {
    echo $v.' ';
}
echo $blue;