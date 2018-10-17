<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form method="get">
    <input style="margin-left: 600px;margin-top: 200px; width: 100px;height:50px;font-size: 25px" type="submit" value="抽奖" name="draw">
</form>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/29
 * Time: 21:34
 */

$arr = array(
    ["kk" => "001","ll" => "李四a"],
    ["kk" => "002","ll" => "李四d"],
    ["kk" => "003","ll" => "李四x"],
    ["kk" => "004","ll" => "李四x"],
    ["kk" => "005","ll" => "李四r"],
    ["kk" => "006","ll" => "李四r"],
    ["kk" => "007","ll" => "李四w"],
    ["kk" => "008","ll" => "李w四"],

);
foreach ($arr as $v) {
    echo "<p>";
    echo "学号：".$v["kk"].",姓名：".$v['ll'];
    echo "</p>";
}
if ($_GET['抽奖']="draw")
{
    $v=$arr[array_rand($arr,1)];
    echo '恭喜学号为:'.$v["kk"].'，姓名为：'.$v["ll"].'的同学中奖';
}