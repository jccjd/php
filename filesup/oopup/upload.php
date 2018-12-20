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


}