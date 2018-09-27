<?php
	$large_bumber = 2147483647; //32位系统整数溢出
	var_dump($large_bumber);
	$a = 1.23456789;
	$b = 1.23456780;
	$epsilon = 0.00001;
	if (abs($a-$b)<$epsilon) {
		# code...
		echo "true<br>";
	}

	$array = array(
	    1    => "a",
	    "1"  => "b",
	    1.5  => "c",
	    true => "d",
	);
var_dump($array);
	$array = array(1,2,3,4,5);
	print_r($array);
	echo "<br>";
	/**
	 * foo
	 */
	class foo
	{
		
		function do_foo()
		{
			# code...
			echo "Doing foo";
		}
	}

	$bar = new foo;

	$bar->do_foo();
	//转化为对象
	$obj = array('1','foo');


	var_dump(isset($obj->{'1'}));//outputs 'bool(false)'
	echo "<br>";
	var_dump(key($obj)); //outputs 'int(1)'

	echo getcwd(),"<br>";

	$foo = 'Bob';

	$bar = &$foo;//通过$bar 引用 $foo
	$bar = "my name is $bar"; //修改$bar
	echo $bar,"<br>";
	echo $foo;

	$a = 'hello';
	$$a = 'world';
	echo "<br>";
	echo "$a ${$a}";
	/*
	以下两句相同 输出
	*/
	echo "<br>";
	echo "$a $hello";

	// 合法常量名
	define("Foo", "something");

	$array = array('abc','def','ff');

	echo "<br>";
	print_r(implode(',', $array));
    //test 更换文件地址
echo "<br>";