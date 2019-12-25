<?php


namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;
use think\Cache;
use app\index\model\VisitorModule;

class Api extends Common
{	

	//微信号
    public function wechat(){
        header('Access-Control-Allow-Origin:*');
    	$sqlUrl = db('url');
        $wechatMysql = db('wechat');
    	if ($this->request->isPost()) {
    		$urlid = input('urlid');
    		if (empty($urlid)) {
    			return json_encode(array('code' => -1, 'msg'=> '参数不足','data'=>[]));
    		} 

    		$data = $sqlUrl->where(array('id' => $urlid))->find();
            if (!empty($data['id'])){
                $on = $wechatMysql->where('urlid='.$data['id'])->select();
                if ($on) {
                    foreach ($on as $k => $v) {
                        $li[] = $v['name'];
                        $lss[]=$v['username'];
                        $liimg[] = 'http://zd.yinsiwangfa.cn'.$v['url'];
                    }
                    $onli = array_rand($li);
                    $res['wechat'] = $li[$onli];
                    $res['url'] = $liimg[$onli];
                    $res['username']=$lss[$onli];
                }else{
                    $res = '';
                }

            }else{
                $res = '';
            }
    		return json_encode(array('code' => 1, 'msg'=> '成功','data'=>$res));
    	}
    	return json_encode(array('code' => -1, 'msg'=> '请使用post提交','data'=>[]));
    }

    //页面访客统计接口
    public function landin(){
        header('Access-Control-Allow-Origin:*');
        if ($this->request->isPost()) {
                $wxstatistice_list = db('wxstatistice_list');
                $Visitor = new VisitorModule();//获取访客ip
                $cookie = input('cookie');//1有cookie 2没有coolie
                $cip = $Visitor->cip();//获取访客ip
                $urlid = input('urlid');

                $data = array(
                    'cookie' => $cookie,
                    'cip' => $cip,
                    'urlid' => $urlid,
                    'source' => $_SERVER['HTTP_REFERER'],
                    'region' => '',
                );

                $on = $wxstatistice_list->where($data)->order('id desc')->find();
                $data['ctime'] = time();
                
                if (!empty($on)) {
                    $ti = $on['ctime']+7200;
                    if ($ti < $data['ctime']){
                        $res = $wxstatistice_list->insert($data);
                    }
                }else{
                    $res = $wxstatistice_list->insert($data);
                }
                exit;
        }
    }

    public function landincnzz()
    {
        header('Access-Control-Allow-Origin:*');
        if ($this->request->isGet()) {
                $wxconversion = db('wxconversion');
                $data = $this->request->get();
                //验证toke  
                $on = $wxconversion->where($data)->find();

                if (!empty($on)) {
                    $res['number'] = $on['number']+1;
                   
                    $wxconversion->where('urlid',$data['urlid'])->update($res);
                    return 'ok';
                }
                exit;
        }
    }



    //提交订单 order表
    public function orderadd(){
        header('Access-Control-Allow-Origin:*');
    	$Order = db('order');
    	if ($this->request->isPost()) {
    		$data = $this->request->post();
            if (empty($data['mobie']) && empty($data['name']) && empty($data['address'])) {
                return json_encode(array('code' => -1, 'msg'=> '参数不足','data'=>[]));
            } 
            // $sql['mobie'] = $data['mobie'];
            // $sql['name'] = $data['name'];
            // $res = $Order->where($sql)->find();
            // if ($res) {
            //     return json_encode(array('code' => -1, 'msg'=> '请勿重复提交！','data'=>[]));
            // }

            $data['ctime'] = time();
            $res = $Order->insert($data);
            if($res){
                return json_encode(array('code' => 1, 'msg'=> '提交成功','data'=>$res));
            } else {
                return json_encode(array('code' => 1, 'msg'=> '提交失败','data'=>$res));
            }
        }
        return json_encode(array('code' => -1, 'msg'=> '请使用post提交','data'=>[]));
    	
    }

    //提交订单 order_copy1
    public function OrderCopy1add(){

        header('Access-Control-Allow-Origin:*');
        $Order = db('order_copy1');
        if ($this->request->isPost()) {
            $data = $this->request->post();
            if (empty($data['mobie']) && empty($data['name']) && empty($data['address']) && empty($data['cip']) && empty($data['cip']) ) {
                return json_encode(array('code' => -1, 'msg'=> '参数不足','data'=>[]));
            } 
            
            $sql['name'] = $data['name'];
            $sql['cip'] = $data['cip'];
            $res = $Order->where($sql)->find();
            if ($res) {
                return json_encode(array('code' => -1, 'msg'=> '请勿重复提交！','data'=>[]));
            }

            $data['ctime'] = time();
            $res = $Order->insert($data);
            if($res){
                return json_encode(array('code' => 1, 'msg'=> '提交成功','data'=>$res));
            } else {
                return json_encode(array('code' => -1, 'msg'=> '提交失败','data'=>$res));
            }
        }
        return json_encode(array('code' => -1, 'msg'=> '请使用post提交','data'=>[]));
        
    }

    //提交订单 order_copy1
    public function OrderCopy2add(){
        header('Access-Control-Allow-Origin:*');
        $Order = db('order_copy2');
        if ($this->request->isPost()) {
            $data = $this->request->post();
  
            if (empty($data['mobie']) && empty($data['name']) && empty($data['address']) && empty($data['cip']) && empty($data['cip']) ) {
                return json_encode(array('code' => -1, 'msg'=> '参数不足','data'=>[]));
            } 
            
            $sql['name'] = $data['name'];
               
            $res = $Order->where($sql)->find();
            if ($res) {
                return json_encode(array('code' => -1, 'msg'=> '请勿重复提交！','data'=>[]));
            }

            $data['ctime'] = time();

            $res = $Order->insert($data);
            if($res){
                return json_encode(array('code' => 1, 'msg'=> '提交成功','data'=>$res));
            } else {
                return json_encode(array('code' => -1, 'msg'=> '提交失败','data'=>$res));
            }
        }
        return json_encode(array('code' => -1, 'msg'=> '请使用post提交','data'=>[]));
    }

    //提交订单 order_copy3
    public function OrderCopy3add(){
        header('Access-Control-Allow-Origin:*');
        $Order = db('order_copy3');
        if ($this->request->isPost()) {
            $data = $this->request->post();
  
            if (empty($data['mobie']) && empty($data['name']) && empty($data['address']) ) {
                return json_encode(array('code' => -1, 'msg'=> '参数不足','data'=>[]));
            } 
            
            $sql['name'] = $data['name'];
               
            $res = $Order->where($sql)->find();
            if ($res) {
                return json_encode(array('code' => -1, 'msg'=> '请勿重复提交！','data'=>[]));
            }

            $data['ctime'] = time();

            $res = $Order->insert($data);
            if($res){
                return json_encode(array('code' => 1, 'msg'=> '提交成功','data'=>$res));
            } else {
                return json_encode(array('code' => -1, 'msg'=> '提交失败','data'=>$res));
            }
        }
        return json_encode(array('code' => -1, 'msg'=> '请使用post提交','data'=>[]));
    }
}