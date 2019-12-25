<?php
namespace app\admin\controller;

use think\Db;

class Goodscommision extends Admin
{	
	// 产品佣金列表
	public function index(){
		// 获取搜索条件
		$where = input('search','');

		$goods_commision = db('goods_commision');

		if ($this->request->isAjax()) {
            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);

            $where = input('param.search','');

            // 判断是否存在搜索条件
            if($where){
            	$map['title'] = array('like',"%{$where}%");
            } else {
            	$map = '';
            }

            $goods = db('goods');

            $data['data'] = $goods_commision->where($map)->page($page)->limit($limit)->select();
            foreach ($data['data'] as $key => &$val) {
            	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);

            	$val['goodsName'] = $goods->where('id',$val['goodsId'])->value('title');

            	if($val['starAge'] == $val['endAge']){
            		$val['age'] = $val['starAge'].'岁';
            	} else {
            		$val['age'] = $val['starAge'].'-'.$val['endAge'].'岁';
            	}

            	$commisionRate = json_decode($val['commisionRate'],true);

            	$val['commisionRate1'] = (float)$commisionRate['commisionRate1'].'%';
            	
            }

            $data['count'] = $goods_commision->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('search',$where);
		return $this->fetch();
	}

	// 产品佣金添加
	public function add()
	{
		if($this->request->isPost()){
			$data = $this->request->post();

			$data2['goodsId'] = $data['goodsId'];
			$data2['starAge'] = $data['starAge'];
			$data2['endAge'] = $data['endAge'];
			$data2['period'] = $data['period'];
			$data2['createTime'] = time();

			$commisionRate['commisionRate1'] = (float)$data['commisionRate1'];
			$commisionRate['commisionRate2'] = (float)$data['commisionRate2'];
			$commisionRate['commisionRate3'] = (float)$data['commisionRate3'];
			$commisionRate['commisionRate4'] = (float)$data['commisionRate4'];
			$commisionRate['commisionRate5'] = (float)$data['commisionRate5'];
			$commisionRate['commisionRate6'] = (float)$data['commisionRate6'];
			$commisionRate['commisionRate7'] = (float)$data['commisionRate7'];
			$commisionRate['commisionRate8'] = (float)$data['commisionRate8'];
			$commisionRate['commisionRate9'] = (float)$data['commisionRate9'];
			$commisionRate['commisionRate10'] = (float)$data['commisionRate10'];

			$data2['commisionRate'] = json_encode($commisionRate);

			$goods_commision = db('goods_commision');

			$res = $goods_commision->insert($data2);

			if($res){
				return $this->success('添加成功！');
			} else {
				return $this->error('添加失败！');
			}
		} else {

			$goods = db('goods');

			$goodsInfo = $goods->select();

			$this->assign('goodsInfo',$goodsInfo);
			return $this->fetch();
		}
	}

	// 产品佣金修改
	public function edit()
	{
		$goods_commision = db('goods_commision');
		if($this->request->isPost()){
			$data = $this->request->post();

			$data2['goodsId'] = $data['goodsId'];
			$data2['starAge'] = $data['starAge'];
			$data2['endAge'] = $data['endAge'];
			$data2['period'] = $data['period'];
			$data2['id'] = $data['id'];

			$commisionRate['commisionRate1'] = (float)$data['commisionRate1'];
			$commisionRate['commisionRate2'] = (float)$data['commisionRate2'];
			$commisionRate['commisionRate3'] = (float)$data['commisionRate3'];
			$commisionRate['commisionRate4'] = (float)$data['commisionRate4'];
			$commisionRate['commisionRate5'] = (float)$data['commisionRate5'];
			$commisionRate['commisionRate6'] = (float)$data['commisionRate6'];
			$commisionRate['commisionRate7'] = (float)$data['commisionRate7'];
			$commisionRate['commisionRate8'] = (float)$data['commisionRate8'];
			$commisionRate['commisionRate9'] = (float)$data['commisionRate9'];
			$commisionRate['commisionRate10'] = (float)$data['commisionRate10'];

			$data2['commisionRate'] = json_encode($commisionRate);

			$res = $goods_commision->update($data2);

			if($res){
				return $this->success('修改成功！');
			} else {
				return $this->error('修改失败！');
			}
		} else {
			$map['id'] = input('id');
			$info = $goods_commision->where($map)->find();

			$commisionRate = json_decode($info['commisionRate'],true);

			$info['commisionRate1'] = (float)$commisionRate['commisionRate1'];
			$info['commisionRate2'] = (float)$commisionRate['commisionRate2'];
			$info['commisionRate3'] = (float)$commisionRate['commisionRate3'];
			$info['commisionRate4'] = (float)$commisionRate['commisionRate4'];
			$info['commisionRate5'] = (float)$commisionRate['commisionRate5'];
			$info['commisionRate6'] = (float)$commisionRate['commisionRate6'];
			$info['commisionRate7'] = (float)$commisionRate['commisionRate7'];
			$info['commisionRate8'] = (float)$commisionRate['commisionRate8'];
			$info['commisionRate9'] = (float)$commisionRate['commisionRate9'];
			$info['commisionRate10'] = (float)$commisionRate['commisionRate10'];

			$this->assign('info',$info);

			$goods = db('goods');

			$goodsInfo = $goods->select();

			$this->assign('goodsInfo',$goodsInfo);

			return $this->fetch();
		}
		
	}

	// 产品佣金删除
	public function del()
	{
		$goods_commision = db('goods_commision');
		if($this->request->isPost()){
			// 多选删除
			$ids = $this->request->post();

			foreach ($ids['id'] as $key => $val) {
				$goods_commision->where('id',$val)->delete();
			}

			return $this->success('删除成功。');
		}else {
			// 单选删除
			$map['id'] = input('id');
		
			$goods_commision->where($map)->delete();
		}
	}
}