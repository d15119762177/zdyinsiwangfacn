<?php

namespace app\admin\controller;
use redis\RedisPackage;
use app\common\util\Dir;
/**
 * 微信统计控制器
 * @package app\admin\controller
 */

class Wcstatistics extends Admin
{
    /**
     * 首页
     * @return mixed
     */
    public function index()
    {   
       
        $mysql_Url = db('url');
        $wxconversion = db('wxconversion');
        $where = input('search','');
        
        if ($this->request->isAjax()) {
            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);

            $where = input('param.search','');

            $map['wctype'] = '3';
            // 判断是否存在搜索条件
            if($where){
                $map['title'] = array('like',"%{$where}%");
            }

            $data['data'] = $mysql_Url->where($map)->page($page)->limit($limit)->order('id desc')->select();
            foreach ($data['data'] as $k => $v) {
                $on = $wxconversion->where('urlid',$v['id'])->find();
                if (!empty($on)) {
                    $data['data'][$k]['title'] = $on['title'];
                    $data['data'][$k]['number'] = $on['number'];
                }
            }

            $data['count'] = $mysql_Url->where($map)->count('id');

            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }

        $this->assign('search',$where);
        return $this->fetch();
    }


    /**
     * 首页
     * @return mixed
     */
    public function list()
    {   
       
        $wxstatistice_list = db('wxstatistice_list'); 
        $where = input('search','');
        $urlid = input('id');

        //获取当天时间戳
        $today = strtotime(date("Y-m-d"),time());
        //当天的24点时间戳
        $end = $today+60*60*24;

        if ($this->request->isAjax()) {
            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);
            $where = input('param.search','');

            //查询条件
            $map['urlid'] = input('urlid');

            // 判断是否存在搜索条件
            if($where){
                $map['cip'] = array('like',"%{$where}%");
            }

            $data['data'] = $wxstatistice_list->where($map)->where('ctime','between time',[$today,$end])->page($page)->limit($limit)->select();

            foreach ($data['data'] as $k => $v) {
               $data['data'][$k]['ctime'] = date("Y年m月d日 h:i:s", $v['ctime']);
            }
            $data['count'] = $wxstatistice_list->where($map)->where('ctime','between time',[$today,$end])->count('id');
            $data['code'] = 0;
            $data['msg'] = '';
            return json($data);
        }else{
            //查询条件
            $map['urlid'] = $urlid;
            $datalist = $wxstatistice_list->where('ctime','between time',[$today,$end])->where($map)->select();
            
            $ip = [];
            $uv = [];
            $time = [];
            foreach ($datalist as $k => $v) {
                $ip[] = $v['cip'];
                if ($v['cookie'] == '2') {
                   $uv = $v['cookie'];
                }

                //时间段
                for ($i=1; $i < 25; $i++) { 
                    $ontoday = $today+(3600*$i);
                    if ($v['ctime'] < $ontoday && $v['ctime'] > ($ontoday-'3600')) {
                        // $o = date("Y-m-d H:i:s", $v['ctime']);
                        // $t = date("Y-m-d H:i:s", $ontoday);
                        // $n = date("Y-m-d H:i:s", ($ontoday-'3600') );
                        // $time[$k][$i] = $o.' | '.$t.' | '.$n; 
                        $time[$k][$i]['ip'] = $v['cip'];
                        if ($v['cookie'] == '2') {
                           $time[$k][$i]['uv'] = $v['cookie'];
                        }

                    }else{
                        $time[$k][$i] = 0;
                    }
                }
              
            }
            // dump($time);
 // exit;

            //统计当天ip访问数
            $data['countip'] = empty($ip) ? '0' : count(array_unique($ip));
            //pv
            $data['countpv'] = empty($datalist) ? '0' : count($datalist);
            //uv
            $data['countuv'] = empty($uv) ? '0' : count($uv);
            
        }
 
        $arrayName = array('452','200','452','453','123','456','423','231','123','500','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
        $arrayName = json_encode($arrayName); 

        $this->assign('arrayName',$arrayName);
        $this->assign('data',$data);
        $this->assign('urlid',$urlid);
        $this->assign('search',$where);
        return $this->fetch();
    }


    public function add(){
        if ($this->request->isAjax()){
            $urlmysql = db('url');
            $wxconversion = db('wxconversion');
            $data = $this->request->post();
            $resdata = array(
                'title' => '网址',
                'url' => $data['url'], 
                'userId' => ADMIN_ID,
            );

            $resdata['type'] = '1';
            $resdata['wctype'] = '3';
            $resdata['ctime'] = date("Y-m-d h:i:sa",time());
         
            $urlid = $urlmysql->insertGetId($resdata);
            //生成唯一toke
            $rand = md5(mt_rand(1000,9999).sprintf("%d", time()));;

            if(!empty($urlid)){
                $ondata = array(
                    'urlid' => $urlid,
                    'title' => $data['title'],
                    'toke' => $rand,
                    'number' => '0',
                );
                $on = $wxconversion->insertGetId($ondata);
                return $this->success('添加成功！');
            }else {
                return $this->error('添加失败！');
            }
            return json($data);
        }
        return $this->fetch();
    }



    public function edit()
    {   

        $mysql_Url = db('url');
        $mysql_Shield = db('shield');

        //根据域名id获取域名详情
        $id['id'] = input('id');
        $url_data = $mysql_Url->where($id)->find();
        $url = $url_data['url'];

        //获取数据
        if ($this->request->isAjax()){
           
            //根据域名获取域名详情
            $id['id'] = input('id');
            $url_data = $mysql_Url->where($id)->find();
            $url = $url_data['url'];

            $on = file_get_contents($url.'/testfile.txt');
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
 
        $on = file_get_contents($url.'/testfile.txt');
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
 
}
