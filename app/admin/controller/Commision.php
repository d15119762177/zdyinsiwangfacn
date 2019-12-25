<?php
namespace app\admin\controller;

use think\Db;

class Commision extends Admin
{	
	// 佣金流水列表
	public function index(){
		// 获取搜索条件
		$where = input('search','');

		$Commision = db('Commision_log');

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
            $agent = db('agent');
            $order = db('order');

            $data['data'] = $Commision->where($map)->page($page)->limit($limit)->select();
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

            $data['count'] = $Commision->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('search',$where);
		return $this->fetch();
	}

	// 佣金流水删除
	public function del()
	{
		$Commision = db('Commision_log');
		if($this->request->isPost()){
			// 多选删除
			$ids = $this->request->post();

			foreach ($ids['id'] as $key => $val) {
				$Commision->where('id',$val)->delete();
			}

			return $this->success('删除成功。');
		}else {
			// 单选删除
			$map['id'] = input('id');
		
			$Commision->where($map)->delete();
		}
	}

	// 状态修改
	public function status()
    {
        $ids = input('param.id/a');
        $val = input('param.val/d');
        
        $Commision = Db('Commision_log');

        foreach ($ids as $key => $id) {
        	if($val == 1){
	        	$data['status'] = 1;
	        	$Commision->where('id',$id)->update($data);
	        } else {
	        	$data['status'] = 0;
	        	$Commision->where('id',$id)->update($data);
	        }
        }
        
        return $this->success('操作成功');
    }

}