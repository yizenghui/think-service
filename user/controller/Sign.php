<?php
namespace app\user\controller;
class Sign
{


    // 返回数据结构与验证规则
    public function create()
    {
        // m get
        // 实例化视图类
        $view = new \think\View();
        // 渲染模板输出
        return $view->fetch();
    }

    // 创建数据接口
    public function save()
    {
        // m post
        $data = input('post.');
        $Sign = new \app\user\model\UserSign();
        // 调用当前模型对应的User验证器类进行数据验证
        $sign_id = $Sign->validate('Sign')->save($data);

        if(false === $sign_id){
            // 验证失败 输出错误信息
            dump($Sign->getError());
            return false;

        }
        $result = $Sign->get($sign_id);
        if($result->uid){
            $Sign->where('id','<',$result->id)->where('uid',$result->uid)->delete();
            return $result->token;
        }
        return false;
    }

    public function index()
    {
        return 'aa';
    }
}