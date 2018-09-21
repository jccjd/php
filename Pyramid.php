<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/20
 * Time: 21:25
 */
//实心正三角
$n = 10;
for ($i = 1; $i <= $n; $i++) {
    for ($k = 1; $k <= $n - $i; $k++) {
        echo "&nbsp";
    }
    for ($j = 1; $j <= $i * 2 - 1; $j++ ) {
        echo "*";
    }
    echo "<br>";
}
//空心三角
$n = 10;
for ($i = 1; $i <= $n; $i++) {
    for ($k = 1; $k <= $n - $i; $k++) {
        echo "&nbsp";
    }
    for ($j = 1; $j <= $i * 2 - 1; $j++) {
        if ($i == 1 || $i == $n) {
            echo "*";
        } else {
            if ($j == )
        }


    }
}

//倒三角
echo "<br>";
$n = 10;
for ($i = $n; $i>=1; $i--) {
    for ($k = 1; $k <= $n - $i; $k++) {
        echo "&nbsp";
    }
    for ($j = 1; $j <= $i * 2 - 1; $j++ ) {
        echo "*";

    }
    echo "<br>";
}