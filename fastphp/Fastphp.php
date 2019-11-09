<?php

class Fastphp{
    protected $config = [];

    public function __construct($config){
        $this->config = $config;
    }

    /***
     * 运行程序
     */
    public function run(){
        //自动加载
        spl_autoload_register(array($this,'loadClass'));

        //错误处理报告
        $this->setReporting();

        //
        //$this->removeMagicQuotes();

        //配置数据库信息
        $this->setDbConfig();

        //路由解析
        $this->route();
    }

    /***
     * 路由解析
     */
    public function route(){
        //判断是否有index.php
        $request_url = strpos($_SERVER['REQUEST_URI'],'index.php');
        if($request_url !== false){
            $path_url = $_SERVER['PATH_INFO'];
        }else{
            $path_url = $_SERVER['REDIRECT_URL'];
        }

        if(isset($path_url)){
            $arr = explode('/',ltrim($path_url,'/'));

            $controllerName = array_shift($arr); //删除第一个，并返回
            $actionName = array_shift($arr); //删除第一个，并返回
        }

        $controllerName = empty($controllerName) ? $this->config['defaultController'] : $controllerName;
        $actionName = empty($actionName) ? $this->config['defaultAction'] : $actionName;

        //判断控制器和操作是否存在
        $controller = 'app\\controller\\' . ucfirst($controllerName).'Controller';
        if(!class_exists($controller)){
            exit($controller.'控制器不存在');
        }
        if(!method_exists($controller,$actionName)){
            exit($actionName.'方法不存在');
        }

        //如果控制器和方法存在，实例化控制器
        $dispath = new $controller($controllerName,$actionName);

        //调用方法
        call_user_func_array(array($dispath,$actionName),$_REQUEST); //$dispath->$actionName($_REQUEST);
    }

    /***
     * 配置数据库信息
     */
    public function setDbConfig(){
        if($this->config['db']){
            define('DB_HOST',$this->config['db']['host']);
            define('DB_NAME',$this->config['db']['dbname']);
            define('DB_USER',$this->config['db']['username']);
            define('DB_PASS',$this->config['db']['password']);
        }
    }

    /***
     * 自动加载类
     */
    public function loadClass($className){
        //内核文件命名空间映射关系
        $classMap = $this->classMap();

        if(isset($classMap[$className])){
            //包含内核文件
            $flie = $classMap[$className];
            $file = APP_PATH. $className.'.php';
        }elseif(strpos($className,'\\') !== false){
            //包含应用文件（application）
            $file = APP_PATH . str_replace('\\','/',$className).'.php';
            if(!is_file($file)){
                return ;
            }
        }else{
            return ;
        }

        include $file;
    }

    /***
     * 内核文件命名空间映射关系
     */
    public function classMap(){
        return [
            "fastphp\base\Controller"   => 'fastphp/base/Controller.php',
            "fastphp\base\Model"        => 'fastphp/base/Model.php',
            "fastphp\base\View"         => 'fastphp/base/View.php',
            "fastphp\db\Db"             => 'fastphp/db/Db.php',
            "fastphp\db\Sql"            => 'fastphp/db/Sql.php',
        ];
    }

    /***
     * 错误处理报告
     */
    public function setReporting(){
        if(APP_DEBUG == true){
            //报告错误级别，E_ALL:报告所有错误, E_ERROR|E_WARNING|E_PARSE:报告runtime错误，E_NOTICE
            error_reporting(E_ALL); //ini_set("error_reporting",E_ALL);
            ini_set("display_errors",'On');
        }else{
            error_reporting(E_ALL);
            ini_set("display_errors",'Off');
            ini_set("log_errors",'On');
            ini_set("error_log",APP_PATH.'log/'.date("YMD").'.error.log');
        }
    }
}