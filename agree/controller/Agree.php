<?php
namespace app\agree\controller;

class Agree
{

    public function index()
    {
        return 'Agree';
    }

    // save
    public function save()
    {

    }
    public function create()
    {
        // m get
        // 实例化视图类
        $view = new \think\View();
        // 渲染模板输出
        return $view->fetch();
    }
}