<?php
namespace app\admin\controller;
use think\Log;
use think\Controller;
use Gaoming13\WechatPhpSdk\Api;
use Gaoming13\WechatPhpSdk\Wechat as ExtendWechat;
use app\admin\model\AdminUser as UserModel;


define("appId",config('develop.user_appid'));
define("appSecret",config('develop.user_appsecret'));
define("encodingAESKey",config('develop.user_encodingAESKey'));
define("TOKEN","weixin");


class Domainname extends Admin{
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
            $where['wctype'] = 1;//分类id
            if (ADMIN_ID != 1) {
                $where['userid'] = ADMIN_ID;
            }
     
            $data['data'] = $url->where($where)->order('id desc')->page($page)->limit($limit)->select();

            foreach ($data['data'] as $k => $v) {
                $naem = [];
            	$on = $Wechat->field('name')->where('urlid='.$v['id'])->select();
                if ($on) {
                    foreach ($on as $a => $s){
                        $naem[$a] = $s['name'];
                    }
                    $data['data'][$k]['name'] = implode(',',$naem);
                }

            }
            $data['count'] = $url->where($where)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }
        return $this->fetch();
    }

    //域名添加
    public function add()
    {
        $urlmysql = db('url');

        if ($this->request->isAjax()){
            $urlmysql = db('url');
            $data = $this->request->post();
            $data['type'] = '1';
            $data['wctype'] = '1';
            $data['ctime'] = date("Y-m-d h:i:sa",time());
            
            $res = $urlmysql->insert($data);
            if($res){
                return $this->success('添加成功！');
            } else {
                return $this->error('添加失败！');
            }
            return json($data);
        }

        $user = db('admin_user');
        $data = $user->field('id,nick')->select();
        $this->assign('data',$data);
    	return $this->fetch();
    }

    //域名修改
    public function edit()
    {
        $urlmysql = db('url');

        if ($this->request->isAjax()){
            $data = $this->request->post();
            $res = $urlmysql->where('id',$data['id'])->update($data);

            if($res){
                return $this->success('修改成功！');
            } else {
                return $this->error('修改失败！');
            }
            return json($data);
        }

        $id = input('id');
        $data =  $urlmysql->where('id',$id)->find(); 

        $user = db('admin_user');
        $userlist = $user->field('id,nick')->select();

        $this->assign('userlist',$userlist);
        $this->assign('data',$data);
    	return $this->fetch();
    }




    //微信列表
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




    //微信号添加
    public function wechatadd()
    {
        $urlid = input('urlid');
        if ($this->request->isAjax()) {
            $Wechat = db('wechat');
            $name = input('name');
            $urlid = input('urlid');
            $username=input('username');
        
            $sql['name'] = $name;
        
            $sql['urlid'] = $urlid;
            $on = $Wechat->where($sql)->find();
            if (!empty($on)) {
                $data['code'] = 0;
                $data['msg'] = '微信号已存在';
                return json($data);
            }

            $data = $this->request->post();
            $data['ctime'] = date("Y-m-d H:i:s",time());
            $res = $Wechat->insert($data);
            if($res){
                return $this->success('添加成功！');
            } else {
                return $this->error('添加失败！');
            }
            return json($data);
        }

        $this->assign('urlid',$urlid);
        return $this->fetch();
    } 



    //微信号修改
    public function wechatedit()
    {
        $Wechat = db('wechat');
        $id = input('id');

        if ($this->request->isAjax()) {
            $data = $this->request->post();

    
            $on = $Wechat->where($data)->find();

            if (!empty($on)){
                $data['code'] = 0;
                $data['msg'] = '微信号已存在';
                return json($data);
            }

            $res = $Wechat->where('id',$data['id'])->update($data);
            if($res){
                return $this->success('修改成功！');
            } else {
                return $this->error('修改失败！');
            }
            return json($data);
        }

        $data = $Wechat->where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }


    //微信号删除
    public function wechatdel()
    {
        $Wechat = db('wechat');
        if($this->request->isPost()){
            // 多选删除
            $ids = $this->request->post();

            foreach ($ids['id'] as $key => $val) {
                $Wechat->where('id',$val)->delete();
            }

            return $this->success('删除成功。');
        }else {
            // 单选删除
            $map['id'] = input('id');
        
            $Wechat->where($map)->delete();
        }
    }

    //域名删除
    public function del()
    {
        $url = db('url');
        if($this->request->isPost()){
            // 多选删除
            $ids = $this->request->post();

            foreach ($ids['id'] as $key => $val) {
                $url->where('id',$val)->delete();
            }

            return $this->success('删除成功。');
        }else {
            // 单选删除
            $map['id'] = input('id');
        
            $url->where($map)->delete();
        }
    }  
}