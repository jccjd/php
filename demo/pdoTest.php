<?php

require "MySQLPDO.class.php";
$arr=array("pass"=>"root","dbname"=>"demo");
$mysql=MySQLPDO::getInstance($arr);
if($_GET["n"]==0){
    $sql="insert into user(name,password,tel) value ('aaa','121','13212')";
    $mysql->exec($sql);
}elseif ($_GET["n"]==1){
    $sql="update user set password='123'where name='aaa'";
    $mysql->exec($sql);
}elseif ($_GET["n"]==2){
    $sql="select * from user where name ='aaa'";
    $result=$mysql->query($sql);
}elseif ($_GET["n"]==3){
    $sql="DELETE FROm user WHERE name='aaa'";
    $mysql->exec($sql);

}








?>