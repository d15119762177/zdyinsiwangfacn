<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;

class Commision extends Common
{   
    
    //佣金
    public function index()
    {
        $openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Commision/index'));
        }else{
        	$commision_log = db('commision_log');
        	$goods = db('goods');
        	$order = db('order');
        	$user = db('user');
            $agent_user = db('agent_user');

            $openid = session('openid2');

            $type = $agent_user->where('openId',$openid)->value('type');

            if($type == 0){
                $this->redirect('index/Queren/index');
                exit;
            }

            // 先获取代理ID
            $agentId = $agent_user->where('openId',$openid)->value('agentId');

        	$status = input('status',1);
        	// 0 待结算 1 已结算

            $map['status'] = $status;
        	$map['agentId'] = $agentId;

        	$commisionInfo = $commision_log->where($map)->select();

        	foreach ($commisionInfo as $key => &$val) {
        		$goodsInfo = $goods->where('id',$val['goodsId'])->find();

        		$val['goodsUrl'] = $goodsInfo['url'];
        		$val['goodsName'] = $goodsInfo['title'];

        		if($val['status'] == 0){
        			$val['status'] = '未结算';
        			$val['time'] = '预计结算时间 : '.$val['expectTime'];
        		}else if($val['status'] == 1){
        			$val['status'] = '已结算';
        			$val['time'] = '结算时间 : '.date('Y-m-d H:i:s',$val['settlementTime']);
        		}

        		// 获取订单号
        		$orderInfo = $order->where('id',$val['orderId'])->find();

        		$val['orderNum'] = $orderInfo['orderNum'];

        		// 获取并处理用户名
        		$userName = $user->where('id',$orderInfo['userId'])->value('name');

        		$nameLength = mb_strlen($userName,'UTF8');

                $str = str_repeat('*',$nameLength-1);

                $val['userName'] = mb_substr($userName,0,1).$str;

        	}

        	$this->assign('status',$status);
        	$this->assign('commisionInfo',$commisionInfo);
           	return $this->fetch();
        }

    }

}