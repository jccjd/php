<html>
<meta charset="utf8">
<style type="text/css">
    ul li {
        list-style: none;
        width: 500px;
        height: 20px;
        line-height: 20px;
        border-bottom: 1px dotted #654321;
    }
    ul li a{
        text-decoration: none;
        color: #123456;

    }
    li span{float: right;}
</style>
</html>
<?php
/**
 * Created by PhpStorm.
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
    echo "<ul><li>";
    echo "<span>".@date("Y-m-d",strtotime($rom['newsDateTime']))."</span>";
    echo "<a href ='array.php?id={$row['id']}'>".$row["newsTitle"]."</a>";
    echo "</li></ul>";
}