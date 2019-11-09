<?php
namespace fastphp\base;

class View{
    protected $_controller;
    protected $_action;
    protected $variables = array();

    /***
     * 构造函数
     */
    function __construct($controller,$action){
        $this->_controller = strtolower($controller);
        $this->_action = strtolower($action);
    }

    /***
     * 分配变量
     */
    public function assign($name,$value){
        //赋值到变量
        $this->varables[$name] = $value;
    }

    /***
     * 渲染
     */
    public function render(){
        //从数组中将变量导入到当前的符号表
        extract($this->varables);

        //视图文件路径
        $controllerLayout = APP_PATH.'app/view/'.$this->_controller.'/'.$this->_action.'.php';

        if(is_file($controllerLayout)){
            include($controllerLayout);
        }else{
            echo "<h1>视图文件不存在</h1>";
        }
    }
}