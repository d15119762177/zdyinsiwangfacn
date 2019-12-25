<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use think\Log;
use app\common\controller\Supplement;//继承
class Order extends Supplement
{	
	// 产品列表
	public function index()
	{
		// var_dump('111');exit;
		// // 获取搜索条件
		// $where = input('search','');

		// $Goods = db('goods');

		// if ($this->request->isAjax()) {
  //           $data = [];
  //           $page = input('param.page/d', 1); 
  //           $limit = input('param.limit/d', 5);

  //           $where = input('param.search','');

  //           // 判断是否存在搜索条件
  //           if($where){
  //           	$map['title'] = array('like',"%{$where}%");
  //           } else {
  //           	$map = '';
  //           }

  //           $data['data'] = $Goods->where($map)->page($page)->limit($limit)->select();
  //           foreach ($data['data'] as $key => &$val) {
  //           	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);
  //           }
  //           $data['count'] = $Goods->count('id');
  //           $data['code'] = 0;
  //           $data['msg'] = '';

  //           return json($data);
  //       }
        // $this->assign('search',$where);
		$openid = session('openid');
		if (empty($openid)){
		    $WeChat = new Wechat();
		    $WeChat->wxlogin(url('index/order/index'));
		}else{
		    $openid = session('openid');
		    $nickname = session('nickname');
		    $headImgurl = session('headimgurl');

            $order = db('order');
            $goods = db('goods');
            $user = db('user');

            $userList = $user->where('openId',$openid)->select();

            //找出当前登陆用户所买的订单
            $orderList = [];
            foreach ($userList as $k => $v) {
                $tempOrderList = $order->where('userId',$userList[$k]['id'])->select();
                $orderList = array_merge($orderList,$tempOrderList);
            }

            foreach ($orderList as $k => $v) {
                $orderList[$k]['userName'] = $user->where('id',$orderList[$k]['userId'])->value('name');
                $orderList[$k]['goodsName'] = $goods->where('id',$orderList[$k]['goodsId'])->value('title');
                $orderList[$k]['url'] = $goods->where('id',$orderList[$k]['goodsId'])->value('url');
            }

            if (empty($orderList)){
                return $this->error('您还没有订单，请到公众号菜单保险-填写建议书进行填写');
            }

            $this->assign('orderList',$orderList);
		    $this->assign('nickname',$nickname);
		    $this->assign('headimgurl',$headImgurl);
		    return $this->fetch();
		}
	}

	// 产品添加
	public function add()
	{
		if($this->request->isPost()){
			$data = $this->request->post();


			$data['createTime'] = time();

			$Goods = db('goods');

			$res = $Goods->insert($data);

			if($res){
                $this->redirect('index/Visitbook/tosuccess?message='."提交成功！2-3天后有建议书下发，请注意公众号信息");
			} else {
				return $this->error('添加失败！');
			}
		}
		return $this->fetch();
	}

	// 产品修改
	public function edit()
	{
		$Goods = db('goods');
		if($this->request->isPost()){
			$data = $this->request->post();

			$res = $Goods->update($data);

			if($res){
				return $this->success('修改成功！');
			} else {
				return $this->error('修改失败！');
			}
		} else {
			$map['id'] = input('id');
			$info = $Goods->where($map)->find();

			$this->assign('info',$info);
			return $this->fetch();
		}
		
	}

	// 产品删除
	public function del()
	{
		$Goods = db('goods');
		if($this->request->isPost()){
			// 多选删除
			$ids = $this->request->post();

			foreach ($ids['id'] as $key => $val) {
				$Goods->where('id',$val)->delete();
			}

			return $this->success('删除成功。');
		}else {
			// 单选删除
			$map['id'] = input('id');
		
			$Goods->where($map)->delete();
		}
	}

}