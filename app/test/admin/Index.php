<?php
namespace app\test\admin;
use app\admin\controller\Admin;
use think\Request;

class Index extends Admin
{

    protected function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {

        return $this->fetch();
    }

    public function testlist(){
        return $this->fetch();
    }

    public function add(){

        if ($this->request->isPost()) {
            $data = $this->request->post();
            dump($data);die;
        }
        return $this->fetch();
    }

    public function ceshi(){
        echo "rewr";
    }


}