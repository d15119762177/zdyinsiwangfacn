<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use think\Log;
use Pinyin;

class User extends Common
{   

    protected $field = true;
    // 用户订单列表，根据传入的值不同展示不同的订单
    public function index()
    {
    	$openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/User/index'));
        }else{

        	$openid = session('openid2');

	    	/* 	0 展示全部。
	    		1 建议书。
	    		2 成交单。
	    		3 访港。 
	    		4 已缴费。 
	    		5 审核中。 
	    		6 已审核。 
	    		7 已签收。 
	    	*/
	    	$type = input('type',1);

	    	if($type == 0){

	    	} else if($type == 1) {
	            $map['status'] = array('IN','1,2');
	    	} else if($type == 2) {
	    		$map['status'] = 3;
	    	} else if($type == 3) {
	    		$map['status'] = 4;
	    	} else if($type == 4) {
	    		$map['status'] = 5;
	    	} else if($type == 5) {
	    		$map['status'] = 6;
	    	} else if($type == 6) {
	    		$map['status'] = 7;
	    	} else if($type == 7) {
	    		$map['status'] = 8;
	    	}

	    	$agent_user = db('agent_user');

	    	$type2 = $agent_user->where('openId',$openid)->value('type');

	        if($type2 == 0){
	            $this->redirect('index/Queren/index');
	            exit;
	        }

	        // 先获取代理ID
	        $agentId = $agent_user->where('openId',$openid)->value('agentId');

	    	$map['agentId'] = $agentId;

	    	$order = db('order');
	        $user = db('user');
	        $goods = db('goods');

	    	$orderInfo = $order->where($map)->select();

	    	foreach ($orderInfo as $key => &$val) {

	            // 用订单内的userId去用户表换区名字,处理名字
	            $userName = $user->where('id',$val['userId'])->value('name');

	            $nameLength = mb_strlen($userName,'UTF8');

	            $str = str_repeat('*',$nameLength-1);

	            $val['userName'] = mb_substr($userName,0,1).$str;

	            // 状态显示值修改
	    		if($val['status'] == 1){
	    			$val['status'] = '建议书材料收集';
	    		}else if($val['status'] == 2){
	    			$val['status'] = '已出建议书';
	    		}else if($val['status'] == 3){
	    			$val['status'] = '确认成交';
	    		}else if($val['status'] == 4){
	    			$val['status'] = '访港安排';
	    		}else if($val['status'] == 5){
	    			$val['status'] = '已付款';
	    		}else if($val['status'] == 6){
	    			$val['status'] = '保单审核中';
	    		}else if($val['status'] == 7){
	    			$val['status'] = '审核通过，快递中';
	    		}else if($val['status'] == 8){
	    			$val['status'] = '已签收';
	    		}else if($val['status'] == 9){
	    			$val['status'] = '已取消';
	    		}

	            // 获取产品信息
	            $goodsInfo = $goods->where('id',$val['goodsId'])->find();

	            $val['goodsUrl'] = $goodsInfo['url'];
	            $val['goodsName'] = $goodsInfo['title'];

	            $val['updateTime'] = date('Y-m-d H:i:s',$val['updateTime']);
	    	}

	        $this->assign('type',$type);
	    	$this->assign('orderInfo',$orderInfo);
	       	return $this->fetch();
	    }
    }

}