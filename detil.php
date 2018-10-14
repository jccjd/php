<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻详情</title>
    <style type="text/css">
        .title{
            margin: 40px auto;
            width: 800px;

        }
        .little{
            margin-left: 10px;
            margin-right: 20px;

        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/11
 * Time: 22:20
 */
$id = $_GET['id'];
//链接数据库
mysql_connect('127.0.0.10','root','root');
mysql_select_db('demo');
mysql_query('set names utf8');

//更改数据
$sql="update newsInfo set newsCnt=newsCnt+1 where id=$id";
$res=mysql_query($sql);
//、、查询数据
$sql="select * from newsInfo where id=$id";
$res=mysql_query($sql);
$row=mysql_fetch_assoc($res);

echo "<h1>".$row['newsTitle']."</h1>";
echo "<p><span>".$row['newsAuthor']."</span>"."<span class='little'>时间".@date("Y-m-d",strtotime($row['newsDateTime']))."</span>".
    "<span class='little'>浏览量：".$row['newsCnt']."</span><br>";
echo $row['newsContent'];
