<?php
namespace fastphp\base;

class Controller{
    protected $_controller;
    protected $_action;
    protected $_view;

    /***
     * 析构函数，初始化属性，实例化模型
     */
    public function __construct($controller,$action){
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new View($controller,$action);
    }

    /***
     * 分配变量
     */
    public function assign($name,$value){
        $this->_view->assign($name,$value);
    }

    /***
     * 视图渲染
     */
    public function render(){
        $this->_view->render();
    }
}