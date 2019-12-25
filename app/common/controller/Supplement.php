<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.HisiPHP.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------

namespace app\common\controller;
use think\View;
use think\Controller;
use app\common\controller\Common;
use app\admin\controller\Wechat;

/**
 * 用户端公共控制器
 * @package app\common\controller
 */
class Supplement extends Common
{
    protected function _initialize(){
        $openid = session('openid');
        $user = db('user');
        $count = $user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat();
            $WeChat->wxlogin(request()->url());
        }else {
            $openid = session('openid');
        }
        
        $userdata = $user->where('openid',$openid)->find();
        if (empty($userdata['name']) || empty($userdata['phone'])) {
        	  $this->redirect(url('index/Supplement/index'));
        } 
    }
}