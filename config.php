<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

return [
//    'default_return_type'=>'json',
    'default_module'        => 'test',
    'url_route_on' => true,
    'log'          => [
//        'type' => 'trace', // 支持 socket trace file
        'type'             => 'socket',
        // socket服务器
        'host'             => 'slog.thinkphp.cn',
    ],
];
