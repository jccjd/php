<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/31
 * Time: 21:18
 */
class People {

    public $name = '张三';
    public $mate;
    /**
     * 构造函数中加载同学对象
     */
    public function __construct()
    {
        $this->mate = new Classmate();
    }
//    //重写clone函数
//    public function __clone() {
//        $this->mate = clone $this->mate;
//    }

}
/**
 * 同学类
 */
class Classmate {
    public $name ="王五";
}
$p1 = new People();
$p2 = json_encode($p1);
$p2 = json_decode($p2);


echo $p1->mate->name;



