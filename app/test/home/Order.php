<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;

class Order extends Common
{	
	// 产品列表
	public function index()
	{
		var_dump('111');exit;
		// 获取搜索条件
		$where = input('search','');

		$Goods = db('goods');

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

            $data['data'] = $Goods->where($map)->page($page)->limit($limit)->select();
            foreach ($data['data'] as $key => &$val) {
            	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);
            }
            $data['count'] = $Goods->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('search',$where);
		return $this->fetch();
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
				return $this->success('添加成功！');
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