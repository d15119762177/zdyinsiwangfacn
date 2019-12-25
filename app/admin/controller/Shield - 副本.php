<?php

namespace app\admin\controller;

use app\common\util\Dir;
/**
 * 后台默认首页控制器
 * @package app\admin\controller
 */

class Shield extends Admin
{
    /**
     * 首页
     * @return mixed
     */
    public function index()
    {   
        $mysql_Url = db('url'); 
        $where = input('search','');
        
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

            $data['data'] = $mysql_Url->where($map)->page($page)->limit($limit)->select();
            $data['count'] = $mysql_Url->count('id');

            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }

        $this->assign('search',$where);
        return $this->fetch();
    }

    public function edit()
    {   


        $mysql_Url = db('url');
        $mysql_Shield = db('shield');

        //根据域名获取域名详情
        $id['id'] = input('id');
        $url_data = $mysql_Url->where($id)->find();
        $url = $url_data['url'];

        //获取数据
        if ($this->request->isAjax()){
            //根据域名获取域名详情
            $id['id'] = input('id');
            $url_data = $mysql_Url->where($id)->find();
            $url = $url_data['url'];
        
            $on = file_get_contents('http://'.$url.'/testfile.txt');
            $on = substr($on,0,strlen($on)-1); 
            $on = explode('|',$on); 
            $data['data'] = [];
            $countCity = [];// 城市统计
            foreach ($on as $k => $v) {
                $v = json_decode($v);
                $data[$k]['time'] = empty($v->time) ? '' : $v->time;
                $data[$k]['url'] =  empty($v->url) ? '' : $v->url;
                $data[$k]['notes']  = empty($v->notes) ? '' : $v->notes;
                $data[$k]['ip']  =  empty($v->ip) ? '' : $v->ip;
                $data[$k]['city']  = empty($v->city) ? '' : $v->city;
                $data[$k]['region']  = empty($v->region) ? '' : $v->region;
                $data[$k]['ondata']  = empty($v->ondata) ? '' : $v->ondata;
                $countCity[$k] = empty($v->city) ? '' : $v->city;
            }
            $data['data']   = $data;

            $data['code']   = 0;
            return json($data);
        }


        //获取屏蔽地区配置
        $sql['id'] = $url_data['shieldTyep'];
        $cityData = $mysql_Shield->where($sql)->find();
 
        $on = file_get_contents('http://'.$url.'/testfile.txt');
        $on = substr($on,0,strlen($on)-1); 
        $on = explode('|',$on); 

        $data = [];
        $countCity = [];// 城市统计
        foreach ($on as $k => $v) {
            $v = json_decode($v);
            $data[$k]['time'] = empty($v->time) ? '' : $v->time;
            $data[$k]['url'] =  empty($v->url) ? '' : $v->url;
            $data[$k]['notes']  = empty($v->notes) ? '' : $v->notes;
            if ($data[$k]['notes']  != '') {
                $count[] = $v->notes;
            } 
            $data[$k]['ip']  =  empty($v->ip) ? '' : $v->ip;
            $data[$k]['city']  = empty($v->city) ? '' : $v->city;
            $data[$k]['region']  = empty($v->region) ? '' : $v->region;
            $countCity[$k] = empty($v->city) ? '' : $v->city;
        }



        $oncount = count($count);
        //屏蔽城市统计
        $count = array_count_values($countCity);//统计
        $cityData = explode(',',$cityData['closedarea']);
        $city = [];
        foreach ($cityData as $k => $v) {
            $city[$k]['city'] = $v;
            if (array_key_exists($v,$count)){
                $city[$k]['count'] = $count[$v];
            }else{
                $city[$k]['count'] = 0;
            }
        }
        $count = count($on);

        $this->assign('oncount',$oncount);
        $this->assign('city',$city);
        $this->assign('count',$count);
        $this->assign('data',$data);
        $this->assign('url',$url);
        if (cookie('hisi_iframe')) {
            $this->view->engine->layout(false);
            return $this->fetch('iframe');
        } else {
            return $this->fetch();
        }
    }





    // public function index()
    // {   

    //     $Type = db('type');

    //     $SqlUrl = db('url');
    //     $url = input('url');
    //     if (empty($url)) {
    //         $url = $urldata[0]['url'];
    //     }
     
    //     $on = file_get_contents('http://yfxy.szjssm.cn/testfile.txt');
    //     $on = substr($on,0,strlen($on)-1); 
    //     $on = explode('|',$on); 

    //     $data = [];
    //     $countCity = [];// 城市统计
    //     foreach ($on as $k => $v) {
    //         $v = json_decode($v);
    //         $data[$k]['time'] = empty($v->time) ? '' : $v->time;
    //         $data[$k]['url'] =  empty($v->url) ? '' : $v->url;
    //         $data[$k]['notes']  = empty($v->notes) ? '' : $v->notes;
    //         if ($data[$k]['notes']  != '') {
    //             $count[] = $v->notes;
    //         } 
    //         $data[$k]['ip']  =  empty($v->ip) ? '' : $v->ip;
    //         $data[$k]['city']  = empty($v->city) ? '' : $v->city;
    //         $data[$k]['region']  = empty($v->region) ? '' : $v->region;
    //         $countCity[$k] = empty($v->city) ? '' : $v->city;
    //     }
       
    //     $oncount = count($count);
    //     //屏蔽城市统计
    //     $count = array_count_values($countCity);//统计
    //     $city = [];
    //     foreach ($cityData as $k => $v) {
    //         $city[$k]['city'] = $v;
    //         if (array_key_exists($v,$count)){
    //             $city[$k]['count'] = $count[$v];
    //         }else{
    //             $city[$k]['count'] = 0;
    //         }
    //     }
    //     $count = count($on);

    //     $this->assign('oncount',$oncount);
    //     $this->assign('city',$city);
    //     $this->assign('count',$count);
    //     $this->assign('data',$data);
    //     if (cookie('hisi_iframe')) {
    //         $this->view->engine->layout(false);
    //         return $this->fetch('iframe');
    //     } else {
    //         return $this->fetch();
    //     }
    // }







}
