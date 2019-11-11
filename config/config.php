<?php
// +----------------------------------------------------------------------
// | AntPHP 
// +----------------------------------------------------------------------
// | Copyright (c) 2019 http://antphp.duopinku.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ghfhaifeng <ghfhaifeng@163.com>
// +----------------------------------------------------------------------
//配置文件

return [
    //数据库配置
    'db' => [
        'host'      => 'localhost',
        'username'  => 'root',
        'password'  => 'root',
        'dbname'    => 'myschool',
        'dbport'    => '3306',
    ],

    //默认控制器名称
    'defaultController' => 'index',

    //默认操作方法名称
    'defaultAction' => 'index',
];