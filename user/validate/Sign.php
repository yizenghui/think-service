<?php
namespace app\user\validate;
use think\Validate;
class Sign extends Validate
{
    protected $rule = [
        'accounts'  =>  'require',
        'pwd' =>  'require',
    ];
}