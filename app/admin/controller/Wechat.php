<?php
namespace app\admin\controller;
use think\Log;
use think\Controller;
use Gaoming13\WechatPhpSdk\Api;
use Gaoming13\WechatPhpSdk\Wechat as ExtendWechat;
define("appId",config('develop.user_appid'));
define("appSecret",config('develop.user_appsecret'));
define("encodingAESKey",config('develop.user_encodingAESKey'));
define("TOKEN","weixin");


class Wechat extends Admin{
    public function index(){   
        if ($this->request->isAjax()) {
            $url = db('url');
            $Wechat = db('wechat');

            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 15);
            $keyword = input('param.keyword');
            if ($keyword) {
                $where['name'] = ['like', "%{$keyword}%"];
            }
            $where['wctype'] = 1;//微信管理分类
            $data['data'] = $url->where($where)->page($page)->limit($limit)->select();
            foreach ($data['data'] as $k => $v) {
            	$on = $Wechat->field('name')->where('urlid='.$v['id'])->select();
            	foreach ($on as $a => $s){
            		$naem[$a] = $s['name'];
            	}
            	$data['data'][$k]['name'] = implode(',',$naem);
            }
            $data['count'] = $url->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        return $this->fetch();
    }

    public function add()
    {
    	return $this->fetch();
    }

    public function edit()
    {
    	return $this->fetch();
    }

    public function wechat()
    {
    	$urlid = input('id');
        if ($this->request->isAjax()) {
            $urlid = input('urlid');
            $Wechat = db('wechat');
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 15);
            $keyword = input('param.keyword');
            if ($keyword) {
                $where['name'] = ['like', "%{$keyword}%"];
            }
            $where['urlid'] = $urlid;//微信管理分类
            $data['data'] = $Wechat->where($where)->page($page)->limit($limit)->select();
            $data['count'] = $Wechat->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        $this->assign('urlid',$urlid);
    	return $this->fetch();
    }    
}