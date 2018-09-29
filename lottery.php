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
    echo "学号：".$v["kk"].",姓名：".$v['xm'];
    echo "</p>";
    if ($_GET['抽奖']='draw') {
        $v = $arr[array_rand($arr,1)];
        echo "<h2 style='margin-left: 400px;margin-top: -40% '>";
        echo '恭喜学号为：'.$v["xh"].'，姓名为：'.$v["xm"].'的同学中奖';
        echo "</h2>";
    }
}