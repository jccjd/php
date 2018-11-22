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
    上传头像： <input type="file" name="file">
    <input type="submit" value="注册">
</form>
<?php
$img=$_FILES['file'];
// 文件的存放目录
$tmp_dir=$img['tmp_name'];
//用户上传的文件名（带后缀）
$fileName=$img['name'];
//用户上传的文件类型
$fileType=$img['type'];
//文件错误
$error=$img['error'];
//文件大小
$fileSize=$img['size'];

//允许的最大尺寸
$maxSize=1024*1000;
//文件允许的格式
$allow_type='image/jpg';

if($error!=0){
    echo '文件上传错误！';
    return;
}else if(!$allow_type){//限制文件的格式
    echo '上传的文件类型错误！';
    return;
}else if($fileSize>$maxSize){
    echo "文件超过".$maxSize;
    return;
}else{
//创建目录
    $fileDir='./upload/';
    if(!is_dir($fileDir)){
        mkdir($fileDir);
    }
//文件名
    $newFileName=date('YmdHis',time()).rand(1000,9999);
//文件后缀
    $FileExt=substr($fileName,strrpos($fileName,'.'));
    move_uploaded_file($tmp_dir,'./upload/'.$newFileName.$FileExt);
    $newname =  $newFileName.$FileExt;
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
    }
}?>
</body>
</html>