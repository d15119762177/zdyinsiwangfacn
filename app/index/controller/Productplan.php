<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use think\Log;
use Pinyin;

class Productplan extends Common
{   

    protected $field = true;
    // 产品分析详情
    public function index()
    {
        if (request()->isGet()){
            $id = input('id');
            $goodsName = input('goodsName');
            if (!empty($id)){

                $goods = db('goods');
                $goodsInfo =  $goods->where('id',$id)->find();
                //找出公司名字
                $company = db('company');
                $goodsInfo['companyName'] = mb_substr($company->where('id',$goodsInfo['companyId'])->value('name'), -2,2,'utf-8');

            }

            if (!empty($goodsName)){

                $goods = db('goods');
                $goodsInfo =  $goods->where('title',$goodsName)->find();
                //找出公司名字
                $company = db('company');
                $goodsInfo['companyName'] = mb_substr($company->where('id',$goodsInfo['companyId'])->value('name'), -2,2,'utf-8');

            }

            if (empty($id) && empty($goodsName)){
                return "请传入产品id或产品名";
            }

            $this->assign('goodsInfo',$goodsInfo);
        }

        return $this->fetch();

    }

    public function goodsdetail(){
        if (request()->isGet()){
            $id = input('id');
            if (empty($id)){
                return "请传入产品id";
            }

            $goods = db('goods');
            $goodsInfo =  $goods->where('id',$id)->find();
            $this->assign('goodsInfo',$goodsInfo);
        }

        if (request()->isPost()){
            $goodsName = input('goodsName');
            $goods = db('goods');
            $goodsInfo =  $goods->where('title',$goodsName)->find();
            $this->assign('goodsInfo',$goodsInfo);
        }

        return $this->fetch();
    }



}