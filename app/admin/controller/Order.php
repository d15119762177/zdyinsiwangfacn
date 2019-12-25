<?php
namespace app\admin\controller;
use app\admin\controller\Wechat;
use think\Db;


class Order extends Admin
{
    public function ordertype(){
        switch (ADMIN_ID){
            case 4:
                return $order = db('order');
                break;
            case 55:
                return $order = db('order_copy1');
                break;
            case 58:
                return $order = db('order_copy2');
                break;
            case 66:
                return $order = db('order_copy3');
                break;
            default:
                return $order = db('order');
                break;
        }
    }

      public function orderhtml(){
        switch (ADMIN_ID) {
            case 4:
                return $this->fetch();
                break;
            case 55:
                return $this->fetch('order/index1');
                break;
            case 58:
                return $this->fetch('order/index2');
                break;
            case 66:
                return $this->fetch('order/index3');
                break;
            default:
                return $this->fetch();
                break;
        }
    }  

	//订单列表
	public function index()
	{

        // 获取搜索条件
		$where = input('search','');

        $order = $this->ordertype();
          
        $user = db('user');

		if ($this->request->isAjax()) {

            $data = [];
            $page = input('param.page/d', 1);
            $limit = input('param.limit/d', 5);
            $where = input('param.search','');

            // 判断是否存在搜索条件
            if($where){
                $map['mobie'] = array('like',"%{$where}%");
            } else {
            	$map = '';
            }
         
            $data['data'] = $order->where($map)->page($page)->limit($limit)->select();

            foreach ($data['data'] as $k => $v) {
                $data['data'][$k]['ctime'] = date('Y-m-s h:i:s',$v['ctime']);
            }
            $data['count'] = $order->count('id');
            $data['code'] = 0;
            $data['msg'] = '';

            return json($data);
        }
        
        $this->assign('search',$where);

        return $this->orderhtml();
		 
	}



    // 产品删除
    public function del()
    {
        $Order = $this->ordertype();

        if($this->request->isPost()){
            // 多选删除
            $ids = $this->request->post();

            foreach ($ids['id'] as $key => $val) {
                $Order->where('id',$val)->delete();
            }
            return $this->success('删除成功。');
        }else {
            // 单选删除
            $map['id'] = input('id');
            $Order->where($map)->delete();
        }
    }

	/**
     * 导出订单
     */
	public function exportorder(){
	    if (request()->isGet()){
            if (ADMIN_ID == 4) {
                $order = db('order');
                $header=['订单ID','姓名','电话','地址','详细地址','下单时间'];
            }
            if (ADMIN_ID == 55) {
                $order = db('order_copy1');
                $header=['订单ID','姓名','电话','数量','地址','详细地址','留言','下单时间'];
            }
            if (ADMIN_ID == 58) {
                $order = db('order_copy2');
                $header=['订单ID','姓名','电话号码','地址','详细地址','数量','金额','产品名','留言','下单时间'];
            }
            if (ADMIN_ID == 66) {
                $order = db('order_copy3');
                $header=['订单ID','姓名','电话号码','详细地址','方便接听时间','下单时间'];
            }
            $name= '导出订单';
            $data = $order->select();
            foreach ($data as $k => $v) {
                $data[$k]['ctime'] = date('Y-m-s h:i:s',$v['ctime']);
            }
            $this->excelExport($name,$header,$data);
        }
    }

    /**
     * excel表格导出
     * @param string $fileName 文件名称
     * @param array $headArr 表头名称
     * @param array $data 要导出的数据
     * @author static7  */
    function excelExport($fileName = '', $headArr = [], $data = []) {
        
        include_once ROOT_PATH.'extend/PHPExcel/Classes/PHPExcel.php';

        $fileName .= "_" . date("Y_m_d", time()) . ".xls";

        $objPHPExcel = new \PHPExcel();
     
        $objPHPExcel->getProperties();
             
        $key = ord("A"); // 设置表头
     
        foreach ($headArr as $v) {
     
            $colum = chr($key);
     
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
     
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            
            //下面注释的这行代码是让表头拥有筛选功能，根据需要取消注释即可
            //$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());
            $key += 1;
        }
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
       
        foreach ($data as $key => $rows) { // 行写入
            $span = ord("A");
            foreach ($rows as $keyName => $value) { // 列写入
                $objActSheet->setCellValue(chr($span) . $column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName); // 重命名表

        $objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表

        header('Content-Type:application/vnd.ms-excel;charset=UTF-8;name="'.$fileName.'.xls"');

        header('Content-Type: application/vnd.ms-excel');
     
        header("Content-Disposition: attachment;filename=$fileName");
     
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        // dump($objWriter);exit;
        // ; // 文件通过浏览器下载
        $objWriter->save('php://output');
 
        exit();
     
    }

}