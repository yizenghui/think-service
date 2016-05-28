<?php
namespace app\user\model;

use think\Model;

class UserSign extends Model
{
    protected $auto = ['token','ip','uid'];
    protected $insert = ['status'=>1];
    protected $update = [];


    public static function buildToken()
    {
        return 'token123';
    }

    public static  function getIp()
    {
        return '127.0.0.1';
    }

    protected function setTokenAttr()
    {
        return UserSign::buildToken();
    }
    protected function setIpAttr()
    {
        return UserSign::getIp();
    }

    // 验证用户安全信息 获取用户UID
    protected function setUidAttr()
    {
        $uid = UserInfo::where('email|mobile',$this->accounts)->where('pwd',$this->pwd)->value('uid');
        return $uid;
    }

}