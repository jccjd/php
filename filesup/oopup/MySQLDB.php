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
    private $link1;
    private static $instance2;
    public static function getInstance1($params = array()) {
        if (!self::$instance2 instanceof self) {
            self::$instance2 = new self($params);
        }
        return self::$instance2;
    }

    /**
     * 构造方法
     * @param array  @params 关联数组
     */
    public function __construct($params =array())
    {
        //    //初始化数据库连接信息
        //$this->inintAttr($params);
        //    //连接数据库
        //$this->connectServer();
        //    //设置字符集
        //$this->setCharset();
        //    //选择默认数据库
        //$this->selectDefaultDb();
        $this->initArrt($params);
        $this->connectServer();
        $this->setCharset();
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
//        $this->dbConfig = array_merge($this->dbConfig,$params);
        $this->dbConfig =array_merge($this->dbConfig,$params);
        $this->dbConfig = array_merge($this->dbConfig,$params);
    }

    /**
     * 连接目标服务器
     * */
    private function connectServer() {
        $host = $this->dbConfig['host'];
        $port = $this->dbConfig['port'];
        $user = $this->dbConfig['user'];
        $pwd = $this->dbConfig['pwd'];
        //连接数据库服务器
        if ($link = mysql_connect("$host:$port",$user, $pwd)) {
            $this->link = $link;
        } else {
            die("数据库连接服务器失败，请确认信息".mysql_error());
        }
    }
    /*设置连接字符集
     * */
    private function setCharset() {
        $sql = "set names {$this->dbConfig['charset']}";
        $this->query($sql);
    }
    /*选择默认数据库*/
    private function selectDefaultDb() {
        /*判断 $this->dbconfig['dbname']是否为空， 为空表示不需要选择数据库*/
        if ($this->dbConfig['dbname'] == '') {
            return;
        }
        $sql = "use '{$this->dbConfig['dbname']}'";
        $this->query($sql);
    }
    /*
     * 执行sql的方法
     *@param string $sql
     * @return mixed 查询语句返回结果集，非查询语句返回true
     * */
    public function query($sql) {
        if ($result = mysql_query($sql,$this->link)) {
            return $result;
        } else {
            echo 'sql执行失败<br>';
            echo '错误的sql为,'.$sql.'<br>';
            echo '错误的信息为：'.mysql_errno($this->link).'<br>';
            echo '错误的代码|为：'.mysql_error($this->link).'<br>';
            die;
        }
    }
    /*查询所有记录
      *@param string $sql 待执行的查询类的SQL
     * @return array 二维数组
     * */
    public function fetchAll($sql) {
        if ($result = $this->query($sql)) {
            $rows = array();
            while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
                $rows[] = $row;
            }
            mysql_free_result($result);
            return $rows;
        } else {
            return false;
        }
    }
    /*
     * 查询单条记录
     * @param string $sql 待执行的查询类的SQL
     * @return array 一维数组
     * */
    public function fetchRow($sql) {
        if ($result = $this->query($sql)) {
            $row = mysql_fetch_array($result,MYSQL_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
    /*
     * 查询单个数据
     * @param string $sql 待执行的查询类的SQL
     * @return string 查询到的数据
     * */
    public function fetchColumn($sql) {
        if ($result = $this->query($sql)) {
            if ($row = mysql_fetch_array($result,MYSQL_NUM)) {
                return $row[0];
            } else {
                return false;
            }
        }
    }
    /*
     * mysql 转义字符串
     *
     * */
    public function escapeString($data) {
        return mysql_real_escape_string($data,$this->link);
    }
    /*
     * 获得当前最新的自动增长ID
     * */
    public function lastInsertId() {
        return mysql_insert_id($this->link);
    }
}