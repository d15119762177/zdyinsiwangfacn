<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use think\Log;
use Pinyin;

class Visitbook extends Common
{   

    protected $field = true;
    // 申请人资料
    public function index()
    {

        $orderId = input('orderId');
        //微信授权
        $openid = session('openid');
        if (empty($openid)){
            $WeChat = new Wechat();
            $WeChat->wxlogin(url('index/Visitbook/index',"orderId=$orderId"));
        }else {
            $orderId = input('orderId');
            $order = db('order');
            //找出订单信息
            $orderInfo = $order->where('id', $orderId)->find();

            $openid = session('openid');
            $user = db('user');
            //找出此订单的用户openId
            $orderOpenId = $user->where('id', $orderInfo['userId'])->value('openId');
            //判断与登陆的微信用户是否为同个人
            //如果相同则展示页面
            if ($openid === $orderOpenId) {
                // 根据类型，判断这是什么操作，0代表第一次进来显示的是空页面。1代表是上一页进来的
                $type = 1;
                if ($type == 1) {
                    $map['userId'] = $orderInfo['userId'];
                    $map['orderId'] = $orderId;

                    $bespeak = db('bespeak');

                    $info = $bespeak->where($map)->find();
                    $this->assign('orderId',$orderId);
                    $this->assign('userId',$orderInfo['userId']);
                    $this->assign('info', $info);
                    return $this->fetch();

                } else if ($type == 0) {
                    $this->assign('orderId',$orderId);
                    $this->assign('userId',$orderInfo['userId']);
                    return $this->fetch();
                }
            }
        }

    }

    // 提交申请人资料
    public function submitIndex()
    {
        $data = input('');
        $orderId = $data['orderId'];
        $userId  = $data['userId'];
        unset($data['orderId']);
        unset($data['userId']);
        // 模拟的数据
        $data['userId'] = $userId;
        $data['orderId'] = $orderId;

        // 模拟的条件，用以判断该用户该订单是否已经填过了
        $map['userId'] = $userId;
        $map['orderId'] = $orderId;

        // 生成姓名拼音
        $py = new \Pinyin();

        $data['applyNamePinyin'] = $py->str2pys($data['applyName']);


        $bespeak = db('bespeak');

        $count = $bespeak->where($map)->count();

        if($count){
            // 填过，更新操作
            $bespeak->where($map)->update($data);
        } else {
            // 没填过，新增操作
            $bespeak->insert($data);
        }
        return $this->redirect('index/Visitbook/plan',["type" => 1,"orderId" => $orderId,"userId" => $userId]);
    }


    //计划资料页面
    public function plan()
    {
        
        // 根据类型，判断这是什么操作，0代表第一次进来显示的是空页面。1代表是上一页进来的
        $type = input('type');

        if($type==0){

            $data = input('');

            $goods = db('goods');

            $list = $goods->select();

            $this->assign('list',$list);

            return $this->fetch();

        } else if($type == 1){
            $map['userId'] = input('userId');
            $map['orderId'] = input('orderId');

            $bespeak = db('bespeak');

            $info = $bespeak->where($map)->find();

            $this->assign('info',$info);

            $goods = db('goods');

            $list = $goods->select();

            $this->assign('userId',$map['userId']);
            $this->assign('orderId', $map['orderId'] );
            $this->assign('list',$list);

            return $this->fetch();
        }
        
    }

    // 提交计划资料
    public function submitPlan()
    {
        $data = input('');
        $map['userId'] = input('userId');
        $map['orderId'] = input('orderId');
        $userId = $map['userId'];
        $orderId = $map['orderId'];

        if($data['type'] == 0){
            $this->redirect("index/Visitbook/index?type=1&userId=$userId&orderId=$orderId");
        }
        
        // 模拟的条件


        $bespeak = db('bespeak');

        // 根据type值判断页面跳转
        if($data['type'] == 1){
            unset($data['type']);
            unset($data['userId']);
            unset($data['orderId']);
            $bespeak->where($map)->update($data);
            $this->redirect("index/Visitbook/insurant?type=0&userId=$userId&orderId=$orderId");
        } else if($data['type'] == 2){
            unset($data['type']);
            unset($data['userId']);
            unset($data['orderId']);
            $bespeak->where($map)->update($data);
            $this->redirect("index/Visitbook/health?type=2&userId=$userId&orderId=$orderId");
        }

    }


    //受保人页面
    public function insurant()
    {
    	// 根据类型，判断这是什么操作，0代表第一次进来显示的是空页面。1代表是上一页进来的

        $type = input('type');
    	if($type == 0){
            $userId = input('userId');
            $orderId = input('orderId');
            $this->assign('userId',$userId);
            $this->assign('orderId',$orderId);
        	return $this->fetch();
    	} else if($type == 1){
    		$map['userId'] = input('userId');
            $map['orderId'] = input('orderId');
            $userId = $map['userId'];
            $orderId = $map['orderId'];

            $bespeak = db('bespeak');

            $info = $bespeak->where($map)->find();
            $this->assign('userId',$userId);
            $this->assign('orderId',$orderId);
            $this->assign('info',$info);
            return $this->fetch();
    	}
    }

    // 提交受保人资料
    public function submitInsurant()
    {
    	$data = input('');
        $userId = $data['userId'];
        $orderId = $data['orderId'];

    	if($data['type'] == 0){
            $this->redirect("index/Visitbook/plan?type=1&userId=".$userId."&orderId=".$orderId);
        }
    	// 生成姓名拼音
        $py = new \Pinyin();

        $data['insuredNamePinyin'] = $py->str2pys($data['insuredName']);

    	// 模拟的条件
        $map['userId'] = '1';
        $map['orderId'] = '1';

        $bespeak = db('bespeak');

        // 根据type值判断页面跳转
        unset($data['type']);
        unset($data['userId']);
        unset($data['orderId']);
        $bespeak->where($map)->update($data);
        $this->redirect("index/Visitbook/health?type=0&userId=$userId&orderId=$orderId");
    }


    

    //健康状况页面
    public function health()
    {
        // 根据类型，判断这是什么操作，0代表第一次进来显示的是空页面。1代表是上一页进来的
        $type = input('type');

        if($type == 0){
            $userId = input('userId');
            $orderId = input('orderId');

                $this->assign('userId', $userId);
                $this->assign('orderId', $orderId);
                $this->assign('type', $type);
                return $this->fetch();

        } else if($type == 1){
            $userId = input('userId');
            $orderId = input('orderId');
            $map['userId'] = $userId;
            $map['orderId'] = $orderId;

            $bespeak = db('bespeak');

            $info = $bespeak->where($map)->find();

            $info['beneficiaryInfo'] = json_decode($info['beneficiaryInfo'],true);
            foreach ($info['beneficiaryInfo'] as $key1 => $val1) {
                $info[$key1] = $val1;
            }

            $info['healthStatus'] = json_decode($info['healthStatus'],true);

            foreach ($info['healthStatus'] as $key2 => $val2) {
                $info[$key2] = $val2;
            }

            $info['everPolicy'] = json_decode($info['everPolicy'],true);
            foreach ($info['everPolicy'] as $key3 => $val3) {
                $info[$key3] = $val3;
            }


            $this->assign('userId',$userId);
            $this->assign('orderId',$orderId);
            $this->assign('info',$info);
            $this->assign('type',$type);
            return $this->fetch();
        }else {
            $userId = input('userId');
            $orderId = input('orderId');
            $bespeak = db('bespeak');
            $map['userId'] = $userId;
            $map['orderId'] = $orderId;
            $info = $bespeak->where($map)->find();
            if ($info['healthStatus'] == NULL) {

                $this->assign('userId', $userId);
                $this->assign('orderId', $orderId);
                $this->assign('type', $type);
                return $this->fetch();
            } else {

                $info['beneficiaryInfo'] = json_decode($info['beneficiaryInfo'], true);
                foreach ($info['beneficiaryInfo'] as $key1 => $val1) {
                    $info[$key1] = $val1;
                }

                $info['healthStatus'] = json_decode($info['healthStatus'], true);

                foreach ($info['healthStatus'] as $key2 => $val2) {
                    $info[$key2] = $val2;
                }

                $info['everPolicy'] = json_decode($info['everPolicy'], true);
                foreach ($info['everPolicy'] as $key3 => $val3) {
                    $info[$key3] = $val3;
                }


                $this->assign('userId', $userId);
                $this->assign('orderId', $orderId);
                $this->assign('info', $info);
                $this->assign('type', $type);
                return $this->fetch();
            }
        }

    }

    // 提交健康状况
    public function submitHealth()
    {
        $data = input('');
        $userId = input('userId');
        $orderId = input('orderId');

        if($data['type'] == 0){
            $this->redirect("index/Visitbook/insurant?type=1&userId=$userId&orderId=$orderId");
        }elseif ($data['type'] == 2){
            $this->redirect("index/Visitbook/plan?type=1&userId=$userId&orderId=$orderId");
        }

        // 揉成受益人json数据
        $beneficiaryInfo['name1'] = $data['name1'];
        $beneficiaryInfo['relationship1'] = $data['relationship1'];
        $beneficiaryInfo['IDCard1'] = $data['IDCard1'];
        $beneficiaryInfo['percent1'] = $data['percent1'];

        $beneficiaryInfo['name2'] = $data['name2'];
        $beneficiaryInfo['relationship2'] = $data['relationship2'];
        $beneficiaryInfo['IDCard2'] = $data['IDCard2'];
        $beneficiaryInfo['percent2'] = $data['percent2'];

        $beneficiaryInfo['name3'] = $data['name3'];
        $beneficiaryInfo['relationship3'] = $data['relationship3'];
        $beneficiaryInfo['IDCard3'] = $data['IDCard3'];
        $beneficiaryInfo['percent3'] = $data['percent3'];

        $data2['beneficiaryInfo'] = json_encode($beneficiaryInfo);

        // 揉成曾今保单json数据
        $everPolicy['company1'] = $data['company1'];
        $everPolicy['goods1'] = $data['goods1'];
        $everPolicy['money1'] = $data['money1'];
        $everPolicy['date1'] = $data['date1'];

        $everPolicy['company2'] = $data['company2'];
        $everPolicy['goods2'] = $data['goods2'];
        $everPolicy['money2'] = $data['money2'];
        $everPolicy['date2'] = $data['date2'];

        $everPolicy['company3'] = $data['company3'];
        $everPolicy['goods3'] = $data['goods3'];
        $everPolicy['money3'] = $data['money3'];
        $everPolicy['date3'] = $data['date3'];

        $data2['everPolicy'] = json_encode($everPolicy);

        // 揉成健康状况json数据
        $healthStatus['question1'] = $data['question1'];
        $healthStatus['question2'] = $data['question2'];
        $healthStatus['question3'] = $data['question3'];
        $healthStatus['question4'] = $data['question4'];
        $healthStatus['question5'] = $data['question5'];
        $healthStatus['question6'] = $data['question6'];
        $healthStatus['question7'] = $data['question7'];
        $healthStatus['question8'] = $data['question8'];
        $healthStatus['question9'] = $data['question9'];

        $data2['healthStatus'] = json_encode($healthStatus);

        $data2['date'] = $data['date'];
        $data2['time'] = $data['time'];


        // 模拟的条件
        $map['userId'] = $userId;
        $map['orderId'] = $orderId;

        $bespeak = db('bespeak');

        // 根据type值判断页面跳转
        $bespeak->where($map)->update($data2);
        $this->redirect("index/Visitbook/carry?type=0&userId=$userId&orderId=$orderId");
    }
    
    //访港时所需携带
    public function carry()
    {
        $userId = input('userId');
        $orderId = input('orderId');
        $this->assign('userId',$userId);
        $this->assign('orderId',$orderId);
        return $this->fetch();
    }

    public function submitCarry()
    {
        $data = input('');
        $userId = input('userId');
        $orderId = input('orderId');
        if($data['type'] == 0){
            $this->redirect("index/Visitbook/health?type=2&userId=$userId&orderId=$orderId");
        }

        $data2['createTime'] = time();

         // 模拟的条件
        $map['userId'] = $userId;
        $map['orderId'] = $orderId;

        $bespeak = db('bespeak');

        // 根据type值判断页面跳转
        $bespeak->where($map)->update($data2);

        $this->redirect('index/Visitbook/tosuccess?message='."提交成功！2-3天后有访港确认书下发，请注意查收公众号消息");
    }


        //受益人页面
    public function beneficiary()
    {
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
        }
        return $this->fetch();
    }

    // 产品修改
    public function edit()
    {
        $Goods = db('goods');
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

    public function toSuccess($message =''){
        $message = input('message');
        $this->assign('message',$message);
        return $this->fetch('tosuccess');
    }

}