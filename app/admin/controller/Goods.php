<?php
namespace app\admin\controller;

use think\Db;

class Goods extends Admin
{	
	// 产品列表
	public function index()
	{
		// 获取搜索条件
		$where = input('search','');

		$header1db = db('header1');

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

            $Company = db('company');
            $data['data'] = $header1db->where($map)->page($page)->limit($limit)->select();

            $data['count'] = $header1db->count('id');
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
		} else {

			$Company = db('company');

			$map['status'] = 1;
			$company = $Company->where($map)->select();

			$this->assign('company',$company);
			return $this->fetch();
		}
	}

	// 产品修改
	public function edit()
	{
        $header1db = db('header1');
		if($this->request->isPost()){
			$data = $this->request->post();

			$res = $header1db->update($data);

			if($res){
				return $this->success('修改成功！');
			} else {
				return $this->error('修改失败！');
			}
		} else {
			$map['id'] = input('id');
			$info = $header1db->where($map)->find();
			$this->assign('info',$info);

			return $this->fetch();
		}
		
	}

    // 产品修改
    public function common_config_edit()
    {
        $common_configdb = db('common_config');
        if($this->request->isPost()){
            $data = $this->request->post();
            $res = $common_configdb->update($data);

            if($res){
                return $this->success('修改成功！');
            } else {
                return $this->error('修改失败！');
            }
        } else {
            $map['id'] = 1;
            $info = $common_configdb->where($map)->find();
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