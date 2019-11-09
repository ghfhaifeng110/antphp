<?php
spl_autoload_register('autoload');

function autoload($class){
    $file = __DIR__.'\\'.strtolower($class).'.php';
    if(is_file($file)){
        require_once $file;
    }else{
        die($file." 文件不存在");
    }
}

$c = new \lib\Controller();
$c->index();