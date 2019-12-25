<?php
namespace app\index\model;
use think\queue\Connector;
use think\Model;
use Gaoming13\WechatPhpSdk\Utils\HttpCurl;

/**
 * 访客信息模型
 * @package app\admin\model
 */
class VisitorModule extends Model
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


    //获取当前访客ip地址
    public function cip()
    {
        static $realip;
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $realip = getenv("HTTP_CLIENT_IP");
            } else {
                $realip = getenv("REMOTE_ADDR");
            } 
        }
        return $realip;
    }

}
