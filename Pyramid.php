<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/20
 * Time: 21:25
 */
$n = 10;
$line = 1;
for ($i = 1; $i <= $n; $i++) {
    for ($k = 1; $k <= $n - $i; $k++) {
        echo "&nbsp";
    }
    for ($j = 1; $j <= $i * 2 - 1; $j++ ) {
        echo "*";
    }
    echo "<br>";
}