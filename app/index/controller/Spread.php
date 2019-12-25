<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;

class Spread extends Common
{	
	//我的推广
	public function index()
	{
		$openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Spread/index'));
        }else{

            $agent_user = db('agent_user');
            $agent = db('agent');

            $openid = session('openid2');

            $agentUserInfo = $agent_user->where('openId',$openid)->find();

            if($agentUserInfo['type'] == 0){
                $this->redirect('index/Queren/index');
                exit;
            }

            // 找出代理的推广二维码

            $QRCodeUrl = $agent->where('id',$agentUserInfo['agentId'])->value('QRCodeUrl');

            $this->assign('QRCodeUrl',$QRCodeUrl);
            $this->assign('agentUserInfo',$agentUserInfo);

     		return $this->fetch();
     	}
	}

}