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
//入口文件 index.php

//检测PHP版本
if(version_compare(PHP_VERSION,'5.6.0','<')) die('需要PHP版本 > 5.6.0 !');

//应用目录
define('APP_PATH', __DIR__ . '/../');

//核心文件目录
define('CORE_PATH',APP_PATH.'antphp');

//是否开启调试模式
define('APP_DEBUG', true);

//加载框架文件
require(APP_PATH.'antphp/Antphp.php');

//加载配置文件
//$config = require(APP_PATH.'config/config.php');

//启动程序
(new Antphp($config))->run();