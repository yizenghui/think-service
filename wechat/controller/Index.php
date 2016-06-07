<?php
namespace app\wechat\controller;
use app\wechat\traits\Juhe;
class Index
{
    use Juhe;
    public function index()
    {
        config('juhe_appkey','269f3b701937ab99d7c41eb6618c8366');
        self::joke();
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    public function test_dream()
    {

        config('juhe_appkey','4a35cf644128f9330492320442a14e3b');
        self::dream('桃子');

    }
    public function test_wd()
    {
        config('juhe_appkey','17578cfac9e3d09535cc6a5f7995a951');
        self::robot('茂名有哪些酒店');

    }

    public function test_weather()
    {
        config('juhe_appkey','1b192879be7a0df41722eeaa16b492c7');
        self::weather('高州');
    }

    public function test_joke()
    {
        config('juhe_appkey','ab02d651f5cac7f0ad23ae5e51fc577e');
        self::joke();

    }


    public function test_c(){
        //
        config('juhe_appkey','2b8470f6d132888298b0ddf6d1dae0dc');
        self::constellation();
    }

    public function test_qq(){
        config('juhe_appkey','b43132d8fd04911bfd1fdec22d4e2c07');
        self::qq('794784562');

    }
    public function t(){

        config('juhe_appkey','269f3b701937ab99d7c41eb6618c8366');
        $url = "http://japi.juhe.cn/joke/img/list.from";
        $params = array(
            "sort" => "",//类型，desc:指定时间之前发布的，asc:指定时间之后发布的
            "page" => "",//当前页数,默认1
            "pagesize" => "20",//每次返回条数,默认1,最大20
            "time" => time(),//时间戳（10位），如：1418816972
            "key" =>  config('juhe_appkey'),//您申请的key
        );
        $paramstring = http_build_query($params);
        $content = self::juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                dump($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";
        }
    }
}
