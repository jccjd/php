<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/20
 * Time: 18:11
 */

class MySQLDB {
    //数据库连接信息
    private  $dbCOnfig = array(
        'host' => 'localhost', //主机
        'port' => '3306',//端口
        'user' => '',//用户
        'pwd' => '',//密码
        'charset' => 'utf8',//字符集
        'dbname' => '',//默认数据库
    );

    //数据库连接资源
    private $link;
    //单例对象
    private static $instance;
    /**/
    public static function getInstance($params = array()) {

    }
}