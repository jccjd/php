<html xmlns:color="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>验证码</title>
</head>
<body>
<form action="check.php" method="post">
    用户名： <input type="text" id="username" name="username"><br>
    密 码： <input type="password" id="password" name="password"><br>
    验证码： <input type="text" id="code" name="code"><img src="idcode.php">
    <div id="error_message style=" color:red"></div>
    <input type="submit" id="login" name="login" value="登录">


</form>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/27
 * Time: 19:39
 * 验证码
 */
