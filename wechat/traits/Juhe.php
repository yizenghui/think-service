<?php
namespace app\wechat\traits;

trait Juhe
{

    function jztk(){
        //
        config('juhe_appkey','2217595198685318ca870141520cd7f8');
        $url = "http://api2.juheapi.com/jztk/query";
        $params = array(
            "key" => config('juhe_appkey'),//您申请的appKey
            "subject" => "1",//选择考试科目类型，1：科目1；4：科目4
            "model" => "c1",//驾照类型，可选择参数为：c1,c2,a1,a2,b1,b2；当subject=4时可省略
            "testType" => "rand",//测试类型，rand：随机测试（随机100个题目），order：顺序测试（所选科目全部题目）
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
    // 周公解梦
    function dream($q)
    {
        $url = "http://v.juhe.cn/dream/query";
        $params = array(
            "key" => config('juhe_appkey'),//应用APPKEY(应用详细页查询)
            "q" => $q,//梦境关键字，如：黄金 需要utf8 urlencode
            "cid" => "",//指定分类，默认全部
            "full" => "1",//是否显示详细信息，1:是 0:否，默认0
        );
        $paramstring = http_build_query($params);
        $content = self::juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";
        }
//**************************************************
    }

    // 灵图机器人问答
    function robot($info)
    {
        //17578cfac9e3d09535cc6a5f7995a951
        //************1.问答************
        $url = "http://op.juhe.cn/robot/index";
        $params = array(
            "key" => config('juhe_appkey'),//您申请到的本接口专用的APPKEY
            "info" => $info,//要发送给机器人的内容，不要超过30个字符
            "dtype" => "",//返回的数据的格式，json或xml，默认为json
            "loc" => "北京中关村",//地点，如北京中关村
            "lon" => "116234632",//经度，东经116.234632（小数点后保留6位），需要写为116234632
            "lat" => "40234632",//纬度，北纬40.234632（小数点后保留6位），需要写为40234632
            "userid" => "1",//1~32位，此userid针对您自己的每一个用户，用于上下文的关联
        );
        $paramstring = http_build_query($params);
        $content = self::juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";
        }
//**************************************************

    }

    // 星座运势
    function constellation(){
        $url = "http://web.juhe.cn:8080/constellation/getAll";
        $params = array(
            "key" => config('juhe_appkey'),//应用APPKEY(应用详细页查询)
            "consName" => "水瓶座",//星座名称，如:白羊座
            "type" => "today",//运势类型：today,tomorrow,week,nextweek,month,year
        );
        $paramstring = http_build_query($params);
        $content = self::juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";
        }
    }

    // 获取 笑话
    function joke(){
        $url = "http://japi.juhe.cn/joke/content/list.from";
        $params = array(
            "sort" => "",//类型，desc:指定时间之前发布的，asc:指定时间之后发布的
            "page" => "3",//当前页数,默认1
            "pagesize" => "20",//每次返回条数,默认1,最大20
            "time" => time(),//时间戳（10位），如：1418816972
            "key" => config('juhe_appkey'),//您申请的key
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

    // 中国天气
    function weather($city)
    {
        $url = "http://op.juhe.cn/onebox/weather/query";
        $params = array(
            "cityname" => $city,//要查询的城市，如：温州、上海、北京
            "key" => config('juhe_appkey'),//应用APPKEY(应用详细页查询)
            "dtype" => "",//返回数据的格式,xml或json，默认json
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




    // qq 号码测吉
    public function qq($qq){

        $url = "http://japi.juhe.cn/qqevaluate/qq";
        $params = array(
            "key" => config('juhe_appkey'),//您申请的appKey
            "qq" => $qq,//需要测试的QQ号码
        );
        $paramstring = http_build_query($params);
        $content = self::juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";
        }
    }


    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    function juhecurl($url,$params=false,$ispost=0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }
}