<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<style type="text/css">
    ul li {
        list-style: none;
        width: 500px;
        height: 40px;
        line-height: 20px;
        border-bottom: 1px dotted #FFee33;
    }
    ul li a{
        text-decoration: none;
        color: red;

    }
    li span{float: right;}
</style>
<body>
<ul>
    <?php
    mysql_connect('127.0.0.1','root','root');
    mysql_select_db('demo');
    mysql_query("set names utf8");

    $sql = "select * from newsInfo order by newsDateTime desc,id desc";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_assoc($res)) {
        # code...
        ?>
        <li>
            <span><?php echo @date("Y-m-d",strtotime($rom['newsDateTime']))?></span>
            <a href="news.php?id=<?php echo $row["id"] ?>"><?php echo $row["newsTitle"]?></a>
        </li>
    <?php }?>

</ul>
</body>

</html>