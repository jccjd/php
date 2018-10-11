<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/11
 * Time: 19:44
*/

mysql_connect('127.0.0.1','root','root');
mysql_select_db('demo');
mysql_query("set names utf8");

$sql = "select * from newsInfo order by newsDateTime desc,id desc";
$res = mysql_query($sql);
while ($row = mysql_fetch_assoc($res)) {
    # code...
        echo @date("Y-m-d",strtotime($rom['newsDateTime']));
        echo $row["newsTitle"];
}