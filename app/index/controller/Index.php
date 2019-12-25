<?php
namespace app\index\controller;

use think\Db;
use app\common\controller\Common;
use app\admin\controller\Wechat2;
use think\Log;

class Index extends Common
{

    public function _initialize()
    {
        $common_configDb = db('common_config');
        $common_config = $common_configDb->find();
        $this->assign('common_config',$common_config);
    }

    public function index()
    {
		$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        $this->redirect($http_type.$_SERVER['SERVER_NAME'].'/admin.php');
        return $this->fetch();
    }

    /**
     * 获取小头部的信息
     */
    public function header1($name = '')
    {
        $header1Db = db('header1');
        $header1 = $header1Db->where('name',$name)->find();
        return $header1;
    }

    /**
     * 产品A
     */
    public function goodsa()
    {
        $header1 = $this->header1('goodsa');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

    /**
     * 产品B
     */
    public function goodsb()
    {
        $header1 = $this->header1('goodsb');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

    /**
     * 产品C
     */
    public function goodsc()
    {
        $header1 = $this->header1('goodsc');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

    /**
     * 产品D
     */
    public function goodsd()
    {
        $header1 = $this->header1('goodsd');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

    /**
     * 商标注册
     */
    public function brand()
    {
        return $this->fetch();
    }

    /**
     * 版权登记
     */
    public function copyright()
    {
        return $this->fetch();
    }

    /**
     *  专利申请
     */
    public function patent()
    {
        return $this->fetch();
    }

    /**
     * 企业认证
     */
    public function renzheng()
    {
        return $this->fetch();
    }

    /**
     * 网站建设
     */
    public function wangzhanjianshe()
    {
        $header1 = $this->header1('wangzhanjianshe');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

    /**
     * 税务代理
     */
    public function tax()
    {
        $header1 = $this->header1('tax');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

    /**
     * 工商代理
     */
    public function reg()
    {
        $header1 = $this->header1('reg');
        $this->assign('header1',$header1);
        return $this->fetch();
    }

}