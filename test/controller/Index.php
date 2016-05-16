<?php
namespace app\test\controller;

class Index
{
    public function index()
    {
        // 实例化视图类
        $view = new \think\View();
        // 渲染模板输出
        return $view->fetch();
    }
}
