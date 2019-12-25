<?php
namespace app\index\controller;
use think\Controller;
use app\admin\controller\Wechat;
class Preview extends Controller{

    public function buyComfirm(){

        if (request()->isGet()){

            $orderId = input('orderId');
            //微信授权
            $openid = session('openid');
            if (empty($openid)){
                $WeChat = new Wechat();
                $WeChat->wxlogin(url('index/Preview/buycomfirm',"orderId=$orderId"));
            }else{
                $orderId = input('orderId');
                $order = db('order');
                //找出订单信息
                $orderInfo = $order->where('id',$orderId)->find();

                $openid = session('openid');
                $user = db('user');
                //找出此订单的用户openId
                $orderOpenId = $user->where('id',$orderInfo['userId'])->value('openId');
                //判断与登陆的微信用户是否为同个人
                //如果相同则展示页面
                if ($openid === $orderOpenId){

                    $file = db('file');
                    $fileInfo = $file->where('orderId',$orderId)->where('userId',$orderInfo['userId'])->where('type',1)->order('createTime','desc')->find();
                    $this->assign('orderId',$orderId);
                    $this->assign('fileUrl',$fileInfo['url']);

                    return $this->fetch('buycomfirm');

                }else{
                    return "请确认登陆微信账号，订单与微信账号不符合";
                }

            }
        }

        if (request()->isPost()){
            $orderId = input('orderId');
            $operate = input('operate');
            if ($operate == "ok"){
                $order = db('order');
                $order->where('id',$orderId)->update(["status" => 2]);
                $this->success("确认购买成功，请填写访港预约书",url('index/Visitbook/index',"orderId=$orderId"));
            }else{
                $this->error("参数错误，请重新提交");
            }
        }
    }

    public function HKComfirm(){

        if (request()->isGet()){

            $orderId = input('orderId');
            //微信授权
            $openid = session('openid');
            if (empty($openid)){
                $WeChat = new Wechat();
                $WeChat->wxlogin(url('index/Preview/HKComfirm',"orderId=$orderId"));
            }else{
                $orderId = input('orderId');
                $order = db('order');
                //找出订单信息
                $orderInfo = $order->where('id',$orderId)->find();

                $openid = session('openid');
                $user = db('user');
                //找出此订单的用户openId
                $orderOpenId = $user->where('id',$orderInfo['userId'])->value('openId');
                //判断与登陆的微信用户是否为同个人
                //如果相同则展示页面

                if ($openid === $orderOpenId){

                    $file = db('file');
                    $fileInfo = $file->where('orderId',$orderId)->where('userId',$orderInfo['userId'])->where('type',0)->order('createTime','desc')->find();
                    $this->assign('orderId',$orderId);
                    $this->assign('fileUrl',$fileInfo['url']);

                    return $this->fetch('hkcomfirm');

                }else{
                    return "请确认登陆微信账号，订单与微信账号不符合";
                }

            }
        }

    }

}