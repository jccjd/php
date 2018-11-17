<?php
require "MySQLPDO.class.php";
$arr=array("pass"=>"root","dbname"=>"demo");
$mysql=MySQLPDO::getInstance($arr);