<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/20
 * Time: 17:29
 */

class upload
{
    //允许上传的文件类型数组
    private $allow_type = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',);
    //允许上传的文件最大尺寸 1048576 = 1M
    private $max_size = 20000;
    //上传文件保存在服务器中的目录位置
    private $upload_path = './';
    //上传文件时产生的错误
    private $error = '';

    /**
     * upload constructor.
     * @param array $params 用来修改成员属性的数组数据
     */
    public function __construct($params = array())
    {
        /*判断$params中是否有types元素，如果有则把types元素的值赋值给$allow_types ：下同理*/
        if (isset($params['types'])) $this->allow_type = $params['types'];
        if (isset($params['size'])) $this->allow_type = $params['size'];
        if (isset($params['path'])) $this->allow_type = $params['path'];
    }
    /**
     *
    */
    public function up($file, $prefix = '' ) {
        if ($file['error'] != 0) {
            $upload_errors = array(
                1 => '文件太大，超过配置中的限制',
                2 => '文件太大，超过了Form表单中的限制',
                3 => '文件没有上传完毕',
                4 => '文件没有上传',
                6 => '没有找到临时上传的目录',
                7 => '临时文件写入失败',
            );
            $this->error = isset($upload_errors[$file['error']]) ? $upload_errors[$file['error']] : '未知错误';
            return false;
        }
        //判断文件类型是否存在于$allow_type中
        if (!in_array($file['type'],$this->allow_type)) {
            $this->error = '该类型不能上传，允许的类型为：'.implode('|',$this->allow_type);
            return false;
        }
        //确定新文件名，生成唯一的文件名-同时保持原有的文件扩展名
        $new_file = uniqid($prefix).strchr($file['name'],'.');
        //确定当前的子目录
        $sub_path = date("YmdH");
        //确定文件上传的全路径
        $upload_path = $this->upload_path.$sub_path;
        //判断这个目录是否存在
        if (!is_dir($upload_path)) {
            mkdir($upload_path);
        }
        //移动文件
        if (move_uploaded_file($file['tmp_name'],$upload_path.'/'.$new_file)) {
            //成功则返回这个文件的目录地址
            return $sub_path.'/'.$new_file;
        } else {
            //失败则更新属性$error,把相关错误信息赋值给该属性，最后返回false
            $this->error = '移动失败';
            return false;
        }
    }
    public function getError() {
        //获取私有属性$error
        return $this->error;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "<p class='box'>upload对象被销毁的时间为：".date("H:i:s")."</p>";
    }


}