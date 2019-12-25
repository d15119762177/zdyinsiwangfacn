<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;

class Queren extends Common
{
	public function index()
	{
		$openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Queren/index'));
        }else{

        	// 判断用户是什么身份，普通用户，审核中的代理，审核通过的代理

        	$apply = db('apply');
        	$agent_user = db('agent_user');

        	// 找到代理公众号用户表ID
        	$agentUserId = $agent_user->where('openId',$openid)->value('id');

        	$map1['agentUserId'] = $agentUserId;

        	// 判断是否申请
        	$count1 = $apply->where($map1)->count();

        	if($count1){
        		// 有数据
        		// 判断该申请的用户在表里是什么类型
        		$applyInfo = $apply->where($map1)->select();

        		foreach ($applyInfo as $key => $val) {
        			if($val['status'] == 0){
        				// 待审核
        				$type = 1;
	        		} else if($val['status'] == 1) {
	        			// 已通过
	        			$type = 2;
	        		}
        		}

        	} else {
        		$type = 0;
        	}

        	$this->assign('type',$type);
			return $this->fetch();
		}
	}
}