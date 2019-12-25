<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;
use Pinyin;

class Policy extends Common
{   

    protected $field = true;
    // 政策资料
    public function index()
    {
        $openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Policy/index'));
        }else{

            $agent_user = db('agent_user');

            $openid = session('openid2');

            $type = $agent_user->where('openId',$openid)->value('type');

            if($type == 0){
                $this->redirect('index/Queren/index');
                exit;
            }

        	$goods_commision = db('goods_commision');

        	$policyInfo = $goods_commision->select();

        	$policyInfo2 = $this->array_unset_tt($policyInfo,'goodsId');

        	$goods = db('goods');

        	foreach ($policyInfo2 as $key => &$val) {
        		$goodsInfo = $goods->where('id',$val['goodsId'])->find();

        		$val['goodsUrl'] = $goodsInfo['url'];
        		$val['goodsName'] = $goodsInfo['title'];
        	}
        	
        	$this->assign('policyInfo2',$policyInfo2);
           	return $this->fetch();
        }

    }

    // 政策详情
    public function detail()
    {
        $openid = session('openid2');
        $agent_user = db('agent_user');
        $count = $agent_user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat2();
            $WeChat->wxlogin2(url('index/Policy/detail'));
        }else{

            $agent_user = db('agent_user');

            $openid = session('openid2');

            $type = $agent_user->where('openId',$openid)->value('type');

            if($type == 0){
                $this->redirect('index/Queren/index');
                exit;
            }

            $goodsId = input('goodsId');

            $goods_commision = db('goods_commision');
            $goods = db('goods');
            $company = db('company');

            $goodsCommisionInfo = $goods_commision->where('goodsId',$goodsId)->select();

            foreach ($goodsCommisionInfo as $key => &$val) {
                $commisionRate = json_decode($val['commisionRate'],true);

                $val['commisionRate1'] = $commisionRate['commisionRate1'];
                $val['commisionRate2'] = $commisionRate['commisionRate2'];
                $val['commisionRate3'] = $commisionRate['commisionRate3'];
                $val['commisionRate4'] = $commisionRate['commisionRate4'];
                $val['commisionRate5'] = $commisionRate['commisionRate5'];
                $val['commisionRate6'] = $commisionRate['commisionRate6'];
                $val['commisionRate7'] = $commisionRate['commisionRate7'];
                $val['commisionRate8'] = $commisionRate['commisionRate8'];
                $val['commisionRate9'] = $commisionRate['commisionRate9'];
                $val['commisionRate10'] = $commisionRate['commisionRate10'];

                if($val['starAge'] == $val['endAge']){
                    $val['age'] = $val['starAge'];
                } else {
                    $val['age'] = $val['starAge'].'-'.$val['endAge'];
                }

            }

            // 获取产品数据
            $goodsInfo = $goods->where('id',$goodsId)->find();

            $goodsInfo['companyName'] = $company->where('id',$goodsInfo['companyId'])->value('name');

            $this->assign('goodsInfo',$goodsInfo);
            $this->assign('goodsCommisionInfo',$goodsCommisionInfo);
            return $this->fetch();
        }
    }
    
    // 二维数组去重
    function array_unset_tt($arr,$key){           
	    //建立一个目标数组        
	    $res = array();              
	    foreach ($arr as $value) {                    
			//查看有没有重复项		              
			if(isset($res[$value[$key]])){                 
			//有：销毁				                 
				unset($value[$key]);				            
			}else{			                    
				$res[$value[$key]] = $value;          
			}          
		}        
		return $res;    
	}



}