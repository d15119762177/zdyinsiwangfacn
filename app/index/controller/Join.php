<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;
use Pinyin;

class Join extends Common
{   
    // 我要加入
    public function index()
    {
    	$openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Join/index'));
        }else{

            $agent_user = db('agent_user');

            // 找到代理公众号用户表ID
            $agentUserId = $agent_user->where('openId',$openid)->value('id');

            // 判断是否有填过申请，申请状态如何

            $apply = db('apply');

            $applyInfo = $apply->where('agentUserId',$agentUserId)->select();


            if($applyInfo){

                foreach ($applyInfo as $key => $val) {


                    if($val['status'] == 0){
                        // 待审核
                        $this->assign('type',$val['status']);
                        $this->redirect('index/Queren/index');
                    } else if($val['status'] == 1){
                        // 审核通过
                        $this->assign('type',$val['status']);
                        $this->redirect('index/Queren/index');
                    }
                }

                return $this->fetch();

            } else {
                return $this->fetch();
            }

            


       		
       	}
    }

    public function add()
    {

    	$apply = db('apply');
    	$agent_user = db('agent_user');
    	$openid = session('openid2');

    	$id = $agent_user->where('openId',$openid)->value('id');

    	$data['name'] = input('name');
    	$data['phone'] = input('phone');
    	$data['IDCard'] = input('IDCard');
    	$data['email'] = input('email');
    	$data['address'] = input('address');
    	$data['data'] = input('data');
    	$data['agentUserId'] = $id;
    	$data['status'] = 0;
    	$data['createTime'] = time();

    	$res = $apply->insert($data);

    	if($res){
    		// 成功插入
    		echo '成功';
    		exit;
    	} else {
    		// 失败
    		echo '失败';
    		exit;
    	}

    }

}