<?php
namespace app\admin\controller;

use think\Db;

class Apply extends Admin
{	
	// 代理列表
	public function index(){
		// 获取搜索条件
		$where = input('search','');

		$apply = db('apply');

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

            $data['data'] = $apply->where($map)->page($page)->limit($limit)->select();
            foreach ($data['data'] as $key => &$val) {
            	$val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);

            	if($val['status'] == 1){
            		$val['status'] = '通过';
            	} else if($val['status'] == 2){
            		$val['status'] = '驳回';
            	} else{
            		$val['status'] = '待审核';
            	}
            	
            }

            $data['count'] = $apply->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        $this->assign('search',$where);
		return $this->fetch();
	}

	// 代理删除
	public function del()
	{
		$apply = db('apply');
		if($this->request->isPost()){
			// 多选删除
			$ids = $this->request->post();

			foreach ($ids['id'] as $key => $val) {
				$apply->where('id',$val)->delete();
			}

			return $this->success('删除成功。');
		}else {
			// 单选删除
			$map['id'] = input('id');
		
			$apply->where($map)->delete();
		}
	}

	// 绑定用户页面
	public function pass()
	{

		$id = input('id');

		$apply = db('apply');

		$this->assign('id',$id);
		return $this->fetch();
	}

	// 查询用户数据
	public function userInfo()
	{
        if ($this->request->isPost()) {
            $keywords = input('keywords');
            $condition["phone"] = array("like","%".$keywords."%");
            $data=db('user')->where($condition)->select();
            //print_r($data);
            echo json_encode($data);
        }
	}

	public function addAgent()
	{
		$id = input('id');
		$userinfo = input('userinfo');

		$apply = db('apply');

		$agent = db('agent');

		$user = db('user');

		$map1['id'] = $id;
		$data1['status'] = 1;

		$map2['userId'] = $userinfo;

		// 判断该用户是否已绑定
		$count = $agent->where($map2)->count();

		if($count){
			return $this->error('该用户已被绑定成为代理');
		} else {
			$info = $apply->where($map1)->find();

			if($info['status'] == 1){
				return $this->error('该申请已通过');
			}else if($info['status'] == 2){
				return $this->error('该申请已驳回');
			}
			$data2['userId'] = $userinfo;
			$data2['agentUserId'] = $info['agentUserId'];
			$data2['name'] = $info['name'];
			$data2['phone'] = $info['phone'];
			$data2['IDCard'] = $info['IDCard'];
			$data2['status'] = 1;
			$data2['createTime'] = time(); 

			// 修改申请表状态
			$apply->where($map1)->update($data1);

			//把数据加到代理人去
			$agent->insert($data2);

			$agentId = $agent->getLastInsID();

			//修改用户数据成为代理，绑定代理ID
			$data3['agentId'] = $agentId;
			$data3['type'] = 1;

			$user->where('id',$userinfo)->update($data3);

			// 修改代理公众号用户身份，绑定代理ID
			$data4['type'] = 1;
			$data4['agentId'] = $agentId;

			$agent_user = db('agent_user');
			$agent_user->where('id',$info['agentUserId'])->update($data4); 

			return $this->success('操作成功');
		}

		exit;
	}

	// 状态修改
	public function status()
    {
        $ids = input('param.id/a');
        $val = input('param.val/d');
        
        $apply = Db('apply');

        foreach ($ids as $key => $id) {
        	if($val == 1){
	        	$data['status'] = 1;
	        	$apply->where('id',$id)->update($data);
	        }else if($val == 2){
	        	$data['status'] = 2;
	        	$apply->where('id',$id)->update($data);
	        } else {
	        	$data['status'] = 0;
	        	$apply->where('id',$id)->update($data);
	        }
        }
        
        return $this->success('操作成功');
    }
}