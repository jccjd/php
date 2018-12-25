<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/20
 * Time: 18:11
 */

class MySQLDB {
    //数据库连接信息
    private  $dbConfig = array(
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
    /**
     * 获得单例对象的公共接口方法
     * @param array $params 数据库连接信息
     * @return object 单例对象
     * */
    public static function getInstance($params = array()) {
        //判断有没有被实例化
        if (!self::$instance instanceof self) {
            //实例化并保存
            self::$instance = new self($params);
        }
        return self::$instance;
    }

    /**
     * 构造方法
     * @param array  @params 关联数组
     */

    public function __construct($params = array())
    {
        //初始化数据库连接信息
        $this->inintAttr($params);
        //连接数据库
        $this->connectServer();
        //设置字符集
        $this->setCharset();
        //选择默认数据库
        $this->selectDefaultDb();
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
    /**
     * 私有化克隆
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    private function initArrt($params) {
        //初始化属性， 使用array_marge() 函数合并两个数组
        $this->dbConfig = array_merge($this->dbConfig,$params);
    }
    /**
     * 连接目标服务器
     * */
    private function connectServer() {
        $host = $this->dbConfig['host'];
        $_port = $this->dbConfig['port'];
        $user = $this->dbConfig['user'];
        $pwd = $this->dbConfig['pwd'];

    }
}