<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use app\common\controller\Supplement;//继承
class Proposal extends Supplement
{	
	// 产品列表
	public function index()
	{
	
		// 获取搜索条件
		$where = input('search','');
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
      // var_dump('1111');exit;

        $goods = db('goods');
        $goodsList = $goods->where('planType',0)->select();
        $this->assign('goodsList',$goodsList);
        $openid = session('openid');
        $user = db('user');
        $count = $user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat();
            $WeChat->wxlogin(url('index/Proposal/index'));
        }else{
            $openid = session('openid');
            $nickname = session('nickname');
            $headimgurl = session('headimgurl');
            $this->assign('nickname',$nickname);
            $this->assign('headimgurl',$headimgurl);
            $this->assign('openid',$openid);
            return $this->fetch();
        }
	}

	// 订单添加
	public function add()
	{
		if($this->request->isPost()){
			$data = $this->request->post();

			$user = db('user');
			//找出当前登陆的微信用户的用户id
            $uid = $user->where('openId',$data['openId'])->value('id');

            $orderNum = date('YmdHis').str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);

			$orderInfo = [
                "userId" => $uid,
                "goodsId" => $data['goodsId'],
                "orderNum" => $orderNum,
                "applicant" => "暂无",
                "insurant" => "暂无",
                "payMentYear" => $data['payMentYear'],
                "remark" => $data['remark'],
                "createTime" => time(),
                "updateTime" => time()
            ];

            if (!empty($data['quota'])){
                $orderInfo['quota'] = $data['quota'];
            }

            if (!empty($data['premium'])){
                $orderInfo['premium'] = $data['premium'];
            }

			$order = db('order');
            //取得生成订单的id
			$orderId = $order->insertGetId($orderInfo);

			$recommendation = db('recommendation');

            $recommendInfo = [
                "uid" => $uid,
                "orderId" => $orderId,
                "sex" => $data['sex'],
                "birthday" => $data['birthday'],
                "nationality" => $data['nationality'],
                "name" => $data['name'],
                "smoking" => $data['smoking'],
                "createTime" => time()
            ];

            //插入建议书表
            $res = $recommendation->insert($recommendInfo);

			if($res){
                $this->redirect('index/Visitbook/tosuccess?message='."你的申请信息已收到，方案将1小时内推送公众号，请注意查收，有疑惑请联系相关理财规划师！");
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

	/**
     * 根据计划变换产品
     */
	public function changeGoodsByPlanType(){
	    if (request()->isAjax()){
	        $planType = input('planType');
	        $goods = db('goods');
	        $goodsList = $goods->where('planType',$planType)->select();
	        echo json_encode($goodsList,256|64);
        }
    }

}