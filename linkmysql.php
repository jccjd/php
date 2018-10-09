<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/10/2
 * Time: 11:12
 *
 */
function show() {
    echo "show....";
}
//测试输入法
echo "bbbb";
show();

$arr = array(1,2,3);
echo "<pre>";
print_r($arr);
echo "</pre>";
class a {
    protected $c;
    public function a() {
        $this->c = 10;
    }
}
class b extends a{
    public function print_data() {
        return $this->c;
    }
}
$b = new b();
echo $b->print_data();