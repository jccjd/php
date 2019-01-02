<html>
<head>
    <meta charset="UTF-8">
    <title>主页</title>
</head>
<style>
    li {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    a:link {
        color: antiquewhite;
    }

    li span {
        float: right;
    }

    .a {
        float: right;
        padding-right: 10px;
    }
</style>
<body>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/1/2
 * Time: 12:32
 */
require 'conn.php';
$sql = 'select * from newsInfo';
$res = mysql_query($sql);
while ($eow = mysql_fetch_assoc($res)) {
    echo '<ul><li>';
    echo "<a href='news.php?id={$row['id']}'>".$row['newsTitle']."</a>";
    echo "<span>".date('y-m-d',strtotime($row['newsDateTime']))."</span>";
    echo "<a href='test1.php?id{$row['id']}' class='a'>".删除."</a>";
    echo "<a href='test1.php?id{$row['id']}' class='a'>".修改."</a>";
    echo '</li></ul>';
}
