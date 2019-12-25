<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\index\model;
use think\queue\Connector;
use think\Model;
use Gaoming13\WechatPhpSdk\Utils\HttpCurl;

/**
 * 后台角色模型
 * @package app\admin\model
 */
class ShieldModule extends Model
{
    /**
     * 根据ip获取地址信息
     */
    public function address($cip,$ondata,$MobileType){
        if (empty($_COOKIE['city'])) {
            $key = 'WeCWr1V1XkZXX7jEbROfwbWdnyXBK58I';
            $url = 'https://api.map.baidu.com/location/ip?ip='.$cip.'&ak='.$key.'&coor=bd09ll';
            $data = HttpCurl::get($url);
            $data = json_decode($data);
            if($data != '') {
                $data = $data->content->address_detail;
                $ip = $cip;
                $region = $data->province;
                $city = $data->city;
            }else{
                $url = $this->getTaobaoAddress($cip);
                $ip = $cip;
                $city = $url['city'];
                $region = $url['region'];
            }
            setcookie('ip',$cip,time() + 99 * 365);//永不过期
            setcookie('region',$region,time() + 99 * 365);//永不过期
            setcookie('city',$city,time() + 99 * 365 * 24);//永不过期
            $userData = array(
                'ip' => $cip,
                'region' => $region,
                'city' => $city,
                'ondata'=>$ondata,
                'MobileType' => $MobileType,
                'type' => '0'
            );
            return $userData;
        }else{
            $userData = array(
                'ip' => $cip,
                'region' => $_COOKIE['region'],
                'city' => $_COOKIE['city'],
                'ondata'=>$ondata,
                'MobileType' => $MobileType,
                'type' => '1'
            );
            return $userData;
        }
    }    


    /**
     * 获取用户ip(外网ip 服务器上可以获取用户外网Ip 本机ip地址只能获取127.0.0.1)
     */
    public function getip($userAgent = null)
    {
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else if(!empty($_SERVER["REMOTE_ADDR"])){
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else{
            $cip = '';
        }
        preg_match("/[\d\.]{7,15}/", $cip, $cips);
        $cip = isset($cips[0]) ? $cips[0] : 'unknown';
        unset($cips);
        $MobileType = $this->isMobileType();
        $ondata = $_SERVER['HTTP_USER_AGENT'];

        if (empty($_COOKIE['city'])) {
            $key = 'WeCWr1V1XkZXX7jEbROfwbWdnyXBK58I';
            $url = 'https://api.map.baidu.com/location/ip?ip='.$cip.'&ak='.$key.'&coor=bd09ll';
            $data = HttpCurl::get($url);
            $data = json_decode($data);
            if($data != '') {
                $data = $data->content->address_detail;
                $ip = $cip;
                $region = $data->province;
                $city = $data->city;
            }else{
                $url = $this->getTaobaoAddress($cip);
                $ip = $cip;
                $city = $url['city'];
                $region = $url['region'];
            }
            setcookie('ip',$cip,time() + 99 * 365);//永不过期
            setcookie('region',$region,time() + 99 * 365);//永不过期
            setcookie('city',$city,time() + 99 * 365 * 24);//永不过期
            $userData = array(
                'ip' => $cip,
                'region' => $region,
                'city' => $city,
                'ondata'=>$ondata,
                'MobileType' => $MobileType,
                'type' => '0'
            );
            return $userData;
        }else{
            $userData = array(
                'ip' => $cip,
                'region' => $_COOKIE['region'],
                'city' => $_COOKIE['city'],
                'ondata'=>$ondata,
                'MobileType' => $MobileType,
                'type' => '1'
            );
            return $userData;
        }
    }


    /*
     * 根据ip获取地区
     */
    public function getTaobaoAddress($ip){  
        $ipContent   = $this->curl_request("http://ip.ws.126.net/ipquery?ip=".$ip);  
        $dada = $this->array_iconv($ipContent);
 
        $t1 = mb_strpos($dada,'{');
        $t2 = mb_strpos($dada,'}');
        $s = mb_substr($dada,$t1+1,$t2-$t1-1);
        $s = str_replace('"','',$s);
        $data = explode(',',$s);

        foreach ($data as $k => $v) {
            $v = explode(':',$v);
            if ($v[0] == 'city') {
                $on['city'] = $v[1];
            }

            if ($v[0] == ' province') {
                $on['region'] = $v[1];
            }
        }
        
        return $on;  
    } 

    /**
     * 对数据进行编码转换
     * @param array/string $data 数组
     * @param string $output 转换后的编码
     * Created on 2016-7-13
     */
    function array_iconv($data, $output = 'utf-8') {
        $encode_arr = array('UTF-8','ASCII','GBK','GB2312','BIG5','JIS','eucjp-win','sjis-win','EUC-JP');
        $encoded = mb_detect_encoding($data, $encode_arr);
        if (!is_array($data)) {
            return mb_convert_encoding($data, $output, $encoded);
        }else{
            foreach ($data as $key=>$val) {
                $key = array_iconv($key, $output);
                if(is_array($val)) {
                    $data[$key] = array_iconv($val, $output);
                } else {
                    $data[$key] = mb_convert_encoding($data, $output, $encoded);
                }
            }
            return $data;
        }
    }

    public function cut($begin,$end,$str){
        $b = mb_strpos($str,$begin) + mb_strlen($begin);
        $e = mb_strpos($str,$end) - $b;
        return mb_substr($str,$b,$e);
    }

    // /**
    //  * 判断客户端
    //  */
    // public function isMobileType()
    // {
    //     if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
    //         return 'IOS';
    //     }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
    //         return 'Android';
    //     }else{
    //         return 'pc';
    //     }
    // }
}
