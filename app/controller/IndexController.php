<?php
namespace app\controller;

use antphp\base\Controller;
use antphp\base\Model;

class IndexController extends Controller
{
    public function index()
    {
        $model = new Model('Student');
        $data = $model->fields('no,name')->order('no desc')->fetchAll();
        print_r($data);
    }

    public function show()
    {
        $this->assign('number','111');
        $this->assign('name','222');

        $this->render();
    }

    public function add()
    {
        $data = ['no'=>'1004','name'=>'3243242','sex'=>'33','age'=>11];
        $model = new Model('student');
        echo $model->add($data);
    }

}