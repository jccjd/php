<html>
<head>
    <meta charset="UTF-8">
    <title>Til</title>
    <style>
        h1{
            text-align: center;
        }
        p{
            text-align: center;
        }
    </style>
</head>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/28
 * Time: 20:19
 */
/**
 * 连接数据库，显示数据库中的内容
 */
require 'conn.php';
$id = $_GET['id'];
$id = 2;

$sql = "update newsInfo set newsCount=newsCount+1 where id=$id";
$res = mysql_query($sql);

$sql = "select * from newsInfo WHERE id = $id";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);

echo "<h1>";
echo $row['newsTitle'];
echo "</h1>";

echo "<p>";
echo "作者：".$row['newsAuthor'];
echo "发布时间：".date("Y-m-d",strtotime($row['newsDateTime']));
echo "浏览次数：".$row['newsCnt'];
echo "</p>";

echo "<p>";
echo $row['newsContent'];
echo "</p>";
