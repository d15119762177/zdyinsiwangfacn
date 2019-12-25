<?php
namespace app\admin\controller;

use think\Db;

class Company extends Admin
{
	// 公司列表
	public function index()
	{
		// 获取搜索条件
		$where = input('search','');

		$Company = db('company');

		if ($this->request->isAjax()) {
            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);

            $where = input('param.search','');

            // 判断是否存在搜索条件
            if($where){
            	$map['name'] = array('like',"%{$where}%");
            } else {
            	$map = '';
            }
            
            $data['data'] = $Company->where($map)->page($page)->limit($limit)->select();
            foreach ($data['data'] as $key => &$val) {
            	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);
            }
            $data['count'] = $Company->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('search',$where);
		return $this->fetch();
	}

	// 公司添加
	public function add()
	{
		if($this->request->isPost()){
			$data = $this->request->post();


			$data['createTime'] = time();

			$Company = db('company');

			$res = $Company->insert($data);

			if($res){
				return $this->success('添加成功！');
			} else {
				return $this->error('添加失败！');
			}
		} else {

			return $this->fetch();
		}
	}

	// 公司修改
	public function edit()
	{
		$Company = db('company');
		if($this->request->isPost()){
			$data = $this->request->post();

			$res = $Company->update($data);

			if($res){
				return $this->success('修改成功！');
			} else {
				return $this->error('修改失败！');
			}
		} else {
			$map['id'] = input('id');
			$info = $Company->where($map)->find();

			$this->assign('info',$info);
			return $this->fetch();
		}
		
	}

	// 公司删除
	public function del()
	{
		$Company = db('company');
		if($this->request->isPost()){
			// 多选删除
			$ids = $this->request->post();

			foreach ($ids['id'] as $key => $val) {
				$Company->where('id',$val)->delete();
			}

			return $this->success('删除成功。');
		}else {
			// 单选删除
			$map['id'] = input('id');
		
			$Company->where($map)->delete();
		}
	}

	// 状态修改
	public function status()
    {
        $ids = input('param.id/a');
        $val = input('param.val/d');
        
        $Company = Db('company');

        foreach ($ids as $key => $id) {
        	if($val == 1){
	        	$data['status'] = 1;
	        	$Company->where('id',$id)->update($data);
	        } else {
	        	$data['status'] = 0;
	        	$Company->where('id',$id)->update($data);
	        }
        }
        
        return $this->success('操作成功');
    }
}