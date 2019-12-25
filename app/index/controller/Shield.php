<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\index\model\ShieldModule;
use think\Log;


class Shield extends Common
{
    public function index()
    {
        $ShieldModule = new ShieldModule();
        // $this = new Verify();
        $cip = '116.234.222.36';
        $ondata = $_SERVER['HTTP_USER_AGENT'];//curl参数
        $MobileType = 'pc';//客户端
        $up = 'kd654ahgljd';//广告id
        $url = '';
        //根据ip获取地区
        $userData = $ShieldModule->address($cip,$ondata,$MobileType); 
        if ($this->Shield($up,$userData,$url)) {
            return 'view.php';
        }else{
            return 'fake.php';
        }
    }

    /**
     * 屏蔽
     */
    public function Shield($up,$userData,$url)
    {


        $city = $userData['city'];
        $type = $userData['type'];

        //地区屏蔽
        $region = $this->ScreenedArea($city);
        $Pangolin = $this->Pangolin();
        $Ideaid = $this->Ideaid($up);
        
        //创建文件
        $file = 'testfile.txt';
        if(!file_exists($file)){
            $myfile = fopen("testfile.txt", "w");
        }

        //数据
        $data['time'] = date("Y-m-d h:i:s",time());
        $data['url'] = $url;
        $data['notes'] = '';


        if ($region) {//屏蔽该地区
            //审核页
            $data['notes'] = '地区屏蔽';
        }else{
            if($Ideaid){//IDEA_ID屏蔽
                //审核页
                $data['notes'] = '访问异常';
            }
        }

        if ($type == 1) {
            $data['ip'] = $userData['ip'];
            $data['city'] = $city;
            $data['region'] = $userData['region'];
            $data['ondata'] = $userData['ondata'];
            $data['MobileType'] = $userData['MobileType'];
            $res = json_encode($data).'|';
            $text = file_get_contents($file);
            $fp = file_put_contents($file,$res, FILE_APPEND);
        }
 
        if ($data['notes'] != '') {
            return false;
        }else{
            return ture;
        }
    }

    /**
     * 地区屏蔽
     */
    public function ScreenedArea($city)
    {
        $data = '北京市,广州市,天津市,济南市,成都市,长沙市,金华市,深圳市,上海市';
        $conner = explode(",", $data);
        if(in_array($city,$conner)){
            return true;//屏蔽该地区
        }else{
            return false;
        }
    }

    /**
     * 穿山甲屏蔽
     */
    public function Pangolin()
    {
        $server = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($server,'open_news') > 0){
            return false;//屏蔽该地区
        }else{
            return true;
        }
    }

    /**
     * IDEA_ID屏蔽
     */
    public function Ideaid($up)
    {
        if(strlen($up) > 10){
            return false;
        }else{
            return true;
        }
    }
}