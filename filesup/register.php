<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <span>用户名：</span><input type="text" name="userName"><br>
    <span>密 码：</span><input type="password" name="userPwd"><br><br>
    上传文件：<input name="upfile" type="file">
    <input type="submit" value="注册">
</form>
<?php
 require_once 'my_imageup.php';
    if (isset($_POST['userName'])) {
        $data = $_POST;
        require_once 'conn.php';
        $sql = "select * from userInfo where userName='{$data['userName']}'";
        $res = mysql_query($sql);
        if (mysql_fetch_assoc($res)) {
            die("用户名已存在，请重新输入");
        } else {
            // $data["userPwd"]=md5($data["userPwd"]);
            $salt = rand(1000, 9999);
            $data["salt"] = $salt;
            $data["userPwd"] = md5(md5($data['userPwd']) . $salt);
            $sql = "insert into userinfo set ";

            foreach ($data as $k => $v) {
                $sql .= "$k='$v',";
            }
            $sql =$sql."image='"."$newname'";
            $sql = rtrim($sql, ',');
            echo $sql;
            $res = mysql_query($sql);
            if ($res) {
                echo "<script>alert('注册成功')</script>";
            }
        }

}?>
</body>
</html>