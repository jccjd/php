<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/31
 * Time: 21:18
 */
class People {

    protected $_name = '张三';
    protected $_sex = '男';
    protected $_age = '18';

    /**
     * return Name
     */
    public function getName() {
        return $this-> _name;
    }
    /**
     * set name
     */
    public function setName($name) {
        $this->_name = (string)$name;
        return $this;
    }
}
$p1 = new People();
$p2 = $p1;
echo $p1->getName();
echo $p2->getName();
//p2改名
$p2->setName('李四');
echo $p1->getName();
echo $p2->getName();
//p1改名
$p1->setName('王五');
echo $p1->getName();
echo $p2->getName();