<?php
header('Content-Type:text/html; charset=utf8');
require "config.php";
require "MySQLPDO.class.php";

class user
{
    public function mysqlInstance(){
        $arr=array("pass"=>"root","dbname"=>"demo");
        $mysql=MySQLPDO::getInstance($arr);
        return $mysql;
    }
    public function register(){
    $mysql=$this->mysqlInstance();
    $data=$_POST;
    $sql="select id from user where name='{$data['name']}'";
    $id=$mysql->fetchRow($sql);
    if ($id!=false){
        $request=array("errorCode"=>1);
    }else
    {
        $sql='insert into user(name,password,tel) value ('."'".$data["name"]."'".","."'".$data["password"]."'".","."'".$data["tel"]."'".")";
        $id=$mysql->exec($sql);
        $request=array("errorCode"=>0);
    }

    echo json_encode($request);
}
    public function login(){
        $mysql=$this->mysqlInstance();
        $data=$_POST;
        $sql="select id from user where name='{$data['name']}'&& password='{$data['password']}'";
        //$result=$mysql->query($sql);
        $id=$mysql->fetchRow($sql);
        if ($id==false){
            $request=array("errorCode"=>1);
        }else
        {
            $request=array("errorCode"=>0,"id"=>$id["id"]);
        }

        echo json_encode($request);
    }
}