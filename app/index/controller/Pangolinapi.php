<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;

class Wechatapi extends Common
{	
	//微信号
    public function wechat(){
    	$sqlUrl = db('url');
    	if ($this->request->isPost()) {
    		$url = input('url');
    		if (empty($url)) {
    			return json_encode(array('code' => -1, 'msg'=> '参数不足','data'=>[]));
    		} 
    		$data = $sqlUrl->where(array('url' => $url))->find();
            $data['WeChat'] = explode(',', $data['WeChat']);
            $li =array_rand($data['WeChat']); 
            $data['WeChat'] = $data['WeChat'][rand(0, $li)];
          
    		return json_encode(array('code' => 1, 'msg'=> '成功','data'=>$data));
    	}

    	return json_encode(array('code' => -1, 'msg'=> '请使用post提交','data'=>[]));
    }

    public function wechat2(){
    	$sqlUrl = db('url');
    	if ($this->request->isGet()) {
    		$url = input('url');
            $callback = input('callback');
    		if (empty($url)) {
                return input('callback').'(参数错误)'; 
    		} 
    		$data = $sqlUrl->where(array('url' => $url))->find();
            $data['WeChat'] = explode(',', $data['WeChat']);
            $li =array_rand($data['WeChat']); 
            $data['WeChat'] = $data['WeChat'][rand(0, $li)];
            return input('callback').'('.json_encode($data['WeChat']).')'; 
    	}
        return input('callback').'(请使用post提交)'; 
    	
    }
}