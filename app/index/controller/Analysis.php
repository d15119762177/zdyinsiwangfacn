<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use think\Log;
use Pinyin;
use app\common\controller\Supplement;//继承
class Analysis extends Supplement
{   

    protected $field = true;
    // 申请人资料
    public function index()
    {
        $openid = session('openid');
        $user = db('user');
        $count = $user->where('openId',$openid)->count();
        if ($count == 0){
            $WeChat = new Wechat();
            $WeChat->wxlogin(url('index/Analysis/index'));
        }else {

            $goods = db('goods');
            $hotGoods = $goods->where('isHot', 1)->select();

            //获取公司名字
            $company = db('company');
            foreach ($hotGoods as $k => $v) {
                $hotGoods[$k]['companyName'] = mb_substr($company->where('id', $hotGoods[$k]['companyId'])->value('name'), -2, 2, 'utf-8');
            }
            $this->assign('hotGoods', $hotGoods);
            return $this->fetch();
        }
    }

    //input输入提醒返回方法
    public function search()
    {
        if (request()->isAjax()){
            $searchText = input('searchText');
            $goods = db('goods');
            $goodsList = $goods->where('title','like',"%$searchText%")->select();
            //获取公司名字
            $company = db('company');
            foreach ($goodsList as $k => $v){
                $goodsList[$k]['title'] = mb_substr($company->where('id',$goodsList[$k]['companyId'])->value('name'), -2,2,'utf-8')."--".$goodsList[$k]['title'];
            }
            echo json_encode($goodsList,256|64);
        }
    }

    /**
     * 判断是否有此产品
     */
    public function ajaxCheckGoods()
    {
        if (request()->isAjax()){
            $goodsName = input('goodsName');
            $goods = db('goods');
            $check = $goods->where('title',$goodsName)->find();
            if (empty($check)){
                $code = 1;
                //记录搜索
                $this->record($goodsName,1);
            }else{
                $code = 2;
                //记录搜索
                $this->record($goodsName,0);
            }

            echo json_encode($code,256|64);
        }
    }
    
    /**
     * 记录用户搜索记录
     */
    public function record($goodsName,$status)
    {
        $openId = session('openid');
        $user = db('user');
        $uid = $user->where('openId',$openId)->value('id');

        $record = db('record');
        $data = [
            "goodsName" => $goodsName,
            "status" => $status,
            "uid" => $uid,
            "createTime" => time()
        ];
        $record->insert($data);

    }

    /**
     * 显示分析记录
     */
    public function recordList()
    {
        $openId = session('openid');
        $user = db('user');
        $uid = $user->where('openId',$openId)->value('id');

        $record = db('record');
        $recordList = $record->where('uid',$uid)->select();
        $this->assign('recordList',$recordList);
        return $this->fetch();
    }


}