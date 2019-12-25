<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;
use Pinyin;

class Personal extends Common
{   

    protected $field = true;
    // 代理人个人中心
    public function index()
    {

    	// $agentId = input('agentId','6');
		$openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Personal/index'));
        }else{
            $agent_user = db('agent_user');

        	$openid = session('openid2');

            $agentUserInfo = $agent_user->where('openId',$openid)->find();

            if($agentUserInfo['type'] == 0){
                $this->redirect('index/Queren/index');
                exit;
            }

            $this->assign('agentUserInfo',$agentUserInfo);

       		return $this->fetch();
    	}


    }

}