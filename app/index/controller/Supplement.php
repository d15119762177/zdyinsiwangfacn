<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat;
use think\Log;
use Pinyin;

class Supplement extends Common
{   
    // 补充资料
    public function index()
    {   
    	$data = $this->request->post();
		$isPost = $this->request->isPost();
		if($isPost && !empty($data)){
	    	$data = $this->request->post();
	    	$user = db('user');
	    	$openid = session('openid');
	    	$res = $user->where('openid',$openid)->update($data);
	        if ($res) {
	        	$this->redirect(url('index/Supplement/tips'));
	        }else{
	            echo"<script>alert('提交失败!');</script>";  
	        }
		}
       	return $this->fetch();
    }

    // 提示页
    public function tips(){
       return $this->fetch();
    }
}