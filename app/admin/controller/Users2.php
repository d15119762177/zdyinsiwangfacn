<?php

namespace app\admin\controller;

use think\db;
class  Users2 extends  Admin
{


    // 产品列表
    public function index()
    {
        // 获取搜索条件
        $where = input('search','');

        $Goods = db('user');

        if ($this->request->isAjax()) {
            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);

            $where = input('param.search','');

            // 判断是否存在搜索条件
            if($where){
                $map['nickname'] = array('like',"%{$where}%");
            } else {
                $map = '';
            }

            $data['data'] = $Goods->where($map)->page($page)->limit($limit)->select();

            foreach ($data['data'] as $key => &$val) {
                $val['createTime'] = date('Y-m-d H:i:s',$val['createTime']);
                $val['subscribeTime'] = date('Y-m-d H:i:s',$val['subscribeTime']);
                if($val['smoking']== 1){
                    $val['smoking'] = '抽烟';
                }else if($val['smoking']== 0){
                    $val['smoking'] = '不抽烟';
                } else {
                    $val['smoking'] = '未知';
                }

                if($val['type']== 1){
                    $val['type'] = '代理';
                }else if($val['type']== 0){
                    $val['type'] = '用户';
                } else {
                    $val['type'] = '未知';
                }

                if($val['sex']== 1){
                    $val['sex'] = '男';
                }else if($val['sex']== 0){
                    $val['sex'] = '女';
                }else{
                    $val['sex'] = '未知';
                }

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
//        if($this->request->isPost()){
//            $data = $this->request->post();
//            dump("-------------------");
//
//            $data['createTime'] = time();
//            $data['subscribeTime'] = time();
//
//            $Goods = db('user');
//            $res = $Goods->insert($data);
//            if($res){
//                return $this->success('添加成功！');
//            } else {
//                return $this->error('添加失败！');
//            }
//        }
//

        if($this->request->isPost()){
            $data = $this->request->post();

            $data['createTime'] = time();
            $data['subscribeTime'] = time();

            $Goods = db('user');
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
        $Goods = db('user');
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
        $Goods = db('user');
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

?>