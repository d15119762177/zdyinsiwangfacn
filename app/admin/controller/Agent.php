<?php
namespace app\admin\controller;

use think\Db;

class Agent extends Admin
{	
	// 代理列表
	public function index(){
		// 获取搜索条件
		$where = input('search','');

		$agent = db('agent');

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

            $data['data'] = $agent->where($map)->page($page)->limit($limit)->select();
            foreach ($data['data'] as $key => &$val) {
            	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);

            	if($val['status'] == 1){
            		$val['status'] = '正常';
            	} else{
            		$val['status'] = '关闭';
            	}

            	// 待结算计算

            	$Commision = db('Commision_log');

            	$waitCommision = $Commision->where('status',0)->where('agentId',$val['id'])->select();

				$waitCommision2 = '';

            	foreach ($waitCommision as $keyw => $valw) {
            		$waitCommision2 += $valw['commision'];
            	}

                if(empty($waitCommision2)){
                    $waitCommision2 = 0;
                }

            	$val['waitCommision'] = $waitCommision2;

            	$finishCommision = $Commision->where('status',1)->where('agentId',$val['id'])->select();

            	$finishCommision2 = '';

            	foreach ($finishCommision as $keyf => $valf) {
            		$finishCommision2 += $valf['commision'];
            	}

                if(empty($finishCommision2)){
                    $finishCommision2 = 0;
                }

            	// 已结算计算
            	$val['finishCommision'] = $finishCommision2;
            }

            $data['count'] = $agent->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('search',$where);
		return $this->fetch();
	}

	// 代理修改
	public function edit()
	{
		$agent = db('agent');
		if($this->request->isPost()){
			$data = $this->request->post();

			$res = $agent->update($data);

			if($res){
				return $this->success('修改成功！');
			} else {
				return $this->error('修改失败！');
			}
		} else {
			$map['id'] = input('id');
			$info = $agent->where($map)->find();

			$info['waitCommision'] = '500';
            $info['finishCommision'] = '666';

            $user = db('user');

            $mapu['id'] = $info['userId'];

            $userInfo = $user->where($mapu)->find();

            $info['userInfo'] = $userInfo['id'].'.'.$userInfo['nickname'];

			$this->assign('info',$info);

			return $this->fetch();
		}
		
	}

	// 代理删除
	public function del()
	{
		$agent = db('agent');
		if($this->request->isPost()){
			// 多选删除
			$ids = $this->request->post();

			foreach ($ids['id'] as $key => $val) {
				$agent->where('id',$val)->delete();
			}

			return $this->success('删除成功。');
		}else {
			// 单选删除
			$map['id'] = input('id');
		
			$agent->where($map)->delete();
		}
	}

	// 状态修改
	public function status()
    {
        $ids = input('param.id/a');
        $val = input('param.val/d');
        
        $agent = Db('agent');

        foreach ($ids as $key => $id) {
        	if($val == 1){
	        	$data['status'] = 1;
	        	$agent->where('id',$id)->update($data);
	        } else {
	        	$data['status'] = 0;
	        	$agent->where('id',$id)->update($data);
	        }
        }
        
        return $this->success('操作成功');
    }

    // 佣金流水
	public function list_log(){
		// 获取搜索条件
		// $where = input('search','');

		$id = input('id');

		$Commision = db('Commision_log');

		if ($this->request->isAjax()) {
            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);

            // $where = input('param.search','');

            // 判断是否存在搜索条件
            // if($where){
            // 	$map['title'] = array('like',"%{$where}%");
            // } else {
            // 	$map = '';
            // }

            $goods = db('goods');
            $agent = db('agent');
            $order = db('order');

            $data['data'] = $Commision->page($page)->where('agentId',$id)->limit($limit)->select();
            foreach ($data['data'] as $key => &$val) {

            	$mapg['id'] = $val['goodsId'];
            	$val['goodsName'] = $goods->where($mapg)->value('title');

            	$mapa['id'] = $val['agentId'];
            	$val['agentName'] = $agent->where($mapa)->value('name');

            	$mapo['id'] = $val['orderId'];
            	$val['orderNum'] = $order->where($mapo)->value('orderNum');

            	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);

            	if($val['status'] == 1){
            		$val['status'] = '已结算';
            	} else{
            		$val['status'] = '未结算';
            	}

            }

            $data['count'] = $Commision->where('agentId',$id)->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('id',$id);
        // $this->assign('search',$where);
		return $this->fetch();
	}

}