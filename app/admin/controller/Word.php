<?php
namespace app\admin\controller;
use think\Controller;
class Word extends Controller
{
    function start()
    {
        ob_start();
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"  xmlns:w="urn:schemas-microsoft-com:office:word"  xmlns="http://www.w3.org/TR/REC-html40">
              <head>
                   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                   <xml><w:WordDocument><w:View>Print</w:View></xml>
            </head><body>';
    }
    function save($path)
    {
        echo "</body></html>";
        $data = ob_get_contents();
        $this->wirtefile ($path,$data);
    }


    function wirtefile ($fn,$data)
    {
        $fp=fopen($fn,"wb");
        fwrite($fp,$data);
        fclose($fp);
    }

    /**
     * 导出订单
     */
    public function exportSuggestion($data){
        $html = '<style>
            .onle_bm{ width:50%; line-height:50px; font-size:30px; text-align:center; color:#ff1d00;margin: 0px auto;font-weight: bold;}
            .onle_bts{ width:50%; line-height:30px; font-size:20px; color:#000000; margin:0px auto;}
            .onle_bd{ width:50%; margin:0px auto; padding-top:20px;}
            .onle_bd table{ border-right: 1px solid #000;  border-bottom: 1px solid #000;height: 40px;}
            .onle_bd td{font-size: 14px; color: #000; border-left: 1px solid #000;  border-top: 1px solid #000;height: 40px;}
            
            </style><div class="onle_bm">建议书材料</div>
            <br>
            <br>
            <div class="onle_bts">1.保险产品:'.$data["goodsInfo"].'</div>
            <div class="onle_bts">2.姓名： '.$data["name"].'</div>
            <div class="onle_bts">3.性别： '.$data["sex"].'</div>
            <div class="onle_bts">4.出生年月：'.$data["birthday"].'</div>
            <div class="onle_bts">5.是否抽烟：'.$data["smoking"].'</div>
            <div class="onle_bts">6.保额：'.$data["quota"].'</div>
            <div class="onle_bts">7.保费：'.$data["premium"].'</div>
            <div class="onle_bts">8.缴费年期：'.$data["payMentYear"].'</div>
            <div class="onle_bts">9.国籍：'.$data["nationality"].'</div>
            <div class="onle_bts">10.备注：'.$data["remark"].'</div>
            ';

        $word = new word();
        $word->start();
        $filename = "星宇信息-".$data['name']."-".$data['planType'];
        $wordname = ROOT_PATH."static/jianli/星宇信息-".$data['name']."-".$data['planType'].".doc";//生成文件路径


        header("Content-Type: application/msword");
        header("Content-Disposition: attachment; filename=$filename.doc"); //指定文件名称
        header("Pragma: no-cache");
        header("Expires: 0");

        echo $html;
        $word->save($wordname);

        ob_flush();//每次执行前刷新缓存
        flush();
        ob_end_clean();
    }


    /**
     * 导出访港预约书
     */
        public function exportHKBooking($data){

        $html = '
        <div>
    <!--<img src="f4a3d776-f031-49fc-93c4-6a205838bb42.001.png" width="135" height="53" alt="" style="-aw-left-pos:378.3pt; -aw-rel-hpos:column; -aw-rel-vpos:paragraph; -aw-top-pos:-4.7pt; -aw-wrap-type:none; margin-left:377.8pt; margin-top:-5.2pt; position:absolute; z-index:0" />-->

    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:0pt; width:480pt">
        <tr style="height:20.5pt">
            <td colspan="12" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">申請人</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">資料</span></p>
                <!--<p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">-->
                    <!--<span style="font-family:Arial; font-size:10pt; font-weight:bold">(</span>-->
                    <!--<span style="font-family:微軟正黑體; font-size:10pt; font-weight:bold">介紹團隊名稱</span>-->
                    <!--<span style="font-family:Arial; font-size:10pt; font-weight:bold">:</span>-->
                    <!--<span style="font-family:Arial; font-size:10pt; font-weight:bold; text-decoration:underline"></span>-->
                    <!--<span style="font-family:Arial; font-size:10pt; font-weight:bold; text-decoration:underline"></span>-->
                    <!--测试-->
                    <!--<span style="font-family:\'Times New Roman\'; font-size:12pt; font-weight:normal; text-decoration:underline"></span>-->
                    <!--<span style="font-family:Arial; font-size:10pt; font-weight:bold">)</span></p>-->
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">中文姓名</span></p>
            </td>
            <td colspan="5" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:135.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyName'].'</p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:100.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">姓名</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">拼音</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:118.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyNamePinyin'].'</p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">性別</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:64.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <input type="checkbox" name="Check2" checked="checked"/>
                    <span style="font-family:微軟正黑體; font-size:10pt">'.$data['applySex'].'</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                </p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:60.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">'.$data['applySex1'].'</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                </p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:100.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">吸煙習慣</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:56.15pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <input type="checkbox" name="Check2" checked="checked"/>
                    <span style="font-family:微軟正黑體; font-size:10pt">'.$data['applySmokingStatus'].'</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                </p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:51.9pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">'.$data['applySmokingStatus1'].'</span></p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">出生日期</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:64.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.date("d",strtotime($data['applyBirth'])).'
                    <span style="font-family:微軟正黑體; font-size:10pt">日</span></p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:60.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.date("m",strtotime($data['applyBirth'])).'
                    <span style="font-family:微軟正黑體; font-size:10pt">月</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:45.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.date("Y",strtotime($data['applyBirth'])).'
                    <span style="font-family:微軟正黑體; font-size:10pt">年</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:43.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; text-indent:6pt; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">年龄</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:118.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyAge'].'</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:119.35pt; white-space: nowrap">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身份證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <span style="font-family:微軟正黑體; font-size:10pt">和</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <span style="font-family:微軟正黑體; font-size:10pt">通行證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">號碼</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt"></span></p>
            </td>
            <td colspan="10" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:376.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身份證號碼</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    <span style="font-family:\'Times New Roman\'; font-size:12pt"></span>
                    '.$data['applyIDCard'].'
                </p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">通行證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">號碼</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    <span style="font-family:\'Times New Roman\'; font-size:12pt"></span>
                    '.$data['applyPassCheck'].'
                </p>
            </td>
        </tr>
        <tr style="height:18pt">
            <td colspan="2" rowspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">婚姻狀況</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:51.9pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['applyMarryStatus1'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">未婚</span></p>
            </td>
            <td colspan="4" style="border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:72.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['applyMarryStatus2'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">已婚</span></p>
            </td>
            <td colspan="3" rowspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:100.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身高</span>
                    <span style="font-family:Arial; font-size:10pt">:</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['applyHeight'].'
                    <span style="font-family:微軟正黑體; font-size:10pt">厘米</span></p>
            </td>
            <td colspan="2" rowspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:118.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">體重</span>
                    <span style="font-family:Arial; font-size:10pt">:</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['applyWight'].'
                    <span style="font-family:微軟正黑體; font-size:10pt">公斤</span></p>
            </td>
        </tr>
        <tr style="height:18pt">
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:51.9pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['applyMarryStatus3'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">鰥寡</span></p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:72.85pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['applyMarryStatus4'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">離婚</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身份證上地址</span></p>
            </td>
            <td colspan="10" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:376.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyIDCardAddress'].'
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">收文件</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">位址</span></p>
            </td>
            <td colspan="10" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:376.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyFileAddress'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">住宅電話</span></p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:112.7pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyHomePhone'].'
                </p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:101.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">手機電話</span></p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:141.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                     '.$data['applyMobilePhone'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:119.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">電郵地址</span></p>
            </td>
            <td colspan="10" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:376.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyEmail'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="12" style="background-color:#fde9d9; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">計劃資料</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:112.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">計劃名稱</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">保額</span>
                    <span style="font-family:Arial; font-size:10pt">(</span>
                    <input type="checkbox" name="Check2" checked="checked"/>
                    <span style="font-family:微軟正黑體; font-size:10pt">美金</span>
                    <span style="font-family:Arial; font-size:10pt">/</span>
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">港幣</span>
                    <span style="font-family:Arial; font-size:10pt">)</span></p>
            </td>
            <td colspan="5" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:135.7pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['goodsName'].'
                </p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:53pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">繳費年期</span></p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:173.5pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-indent:12pt; widows:0">
                    <input type="checkbox" name="Check2" '.$data['paymentTime1'].'/>
                    <span style="font-family:Arial; font-size:10pt">10</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">年</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <input type="checkbox" name="Check2" '.$data['paymentTime2'].'/>
                    <span style="font-family:Arial; font-size:10pt">18</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">年</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <input type="checkbox" name="Check2" '.$data['paymentTime3'].'/>
                    <span style="font-family:Arial; font-size:10pt">25</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">年</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; text-indent:12pt; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">其它</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    <span style="font-family:\'Times New Roman\'; font-size:12pt"></span>
                    '.$data['paymentTime4'].'</p>
            </td>
        </tr>
        <tr style="height:0pt">
            <td style="width:122.85pt; border:none"></td>
            <td style="width:7.3pt; border:none"></td>
            <td style="width:62.7pt; border:none"></td>
            <td style="width:12.75pt; border:none"></td>
            <td style="width:48.05pt; border:none"></td>
            <td style="width:15.7pt; border:none"></td>
            <td style="width:7.15pt; border:none"></td>
            <td style="width:56.65pt; border:none"></td>
            <td style="width:32.4pt; border:none"></td>
            <td style="width:22.25pt; border:none"></td>
            <td style="width:66.95pt; border:none"></td>
            <td style="width:62.7pt; border:none"></td>
        </tr>
    </table>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:0pt; width:480pt">
        <tr style="height:22.7pt">
            <td colspan="5" style="background-color:#fde9d9; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">職業資料</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold"></span>
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:112.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">公司名稱</span></p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:383.8pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['applyCompanyName'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:112.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">業</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">務</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">性質</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:120pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['applyBusinessNature'].'
                </p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:101.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">工作職稱</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:141.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['applyJobTitle'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:112.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">公司地址</span></p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:383.8pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                   '.$data['applyCompanyAddress'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="5" style="background-color:#fde9d9; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">收入來源</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold"></span>
                    <span style="font-family:Arial; font-size:12pt; font-weight:bold">(</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">過去</span>
                    <span style="font-family:Arial; font-size:12pt; font-weight:bold">12</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">個月內總收入</span>
                    <span style="font-family:Arial; font-size:12pt; font-weight:bold">)</span></p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:105.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">工資</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:126.6pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">港幣</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    <span style="font-family:\'Times New Roman\'; font-size:12pt"></span>
                    '.$data['applyWages'].'
                </p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:101.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">獎金</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:141.1pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">港幣</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    <span style="font-family:\'Times New Roman\'; font-size:12pt"></span>
                    '.$data['applybonus'].'
                </p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:105.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">其他收入</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:126.6pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">港幣</span>
                    '.$data['applyOtherIncome'].'
                </p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:253pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">收入來源</span>
                    '.$data['applyIncomeStream'].'
                </p>
            </td>
        </tr>
        <tr style="height:0pt">
            <td style="width:116.25pt; border:none"></td>
            <td style="width:6.6pt; border:none"></td>
            <td style="width:130.8pt; border:none"></td>
            <td style="width:111.9pt; border:none"></td>
            <td style="width:151.9pt; border:none"></td>
        </tr>
    </table>
    <p style="margin:0pt; orphans:0; widows:0">
        <span style="display:none; font-family:\'Times New Roman\'; font-size:12pt">&#xa0;</span></p>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; float:left; margin:0pt 9pt; width:480pt">
        <tr>
            <td style="background-color:#f2dbdb; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:504.9pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt; font-weight:bold; text-decoration:underline">*溫馨提示*</span></p>
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">1) 投保金額達人民幣10萬以上，請客人先與銀行開通限額，一般銀聯卡自動有限制每次刷卡上限及每天刷卡上限。也可以選擇多張銀聯卡組合繳費(除</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">躉繳外)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">。</span></p>
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">2)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <span style="font-family:微軟正黑體; font-size:10pt">繳費之銀聯卡</span>
                    <span style="font-family:微軟正黑體; font-size:10pt; text-decoration:underline">必須由</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">持卡人親身刷卡，如持卡人非投保人，必須為直系親屬如父母/子女/配偶/兄弟姊妹。(需出示證明)</span></p>
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">3)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">所有香港保險公司都</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">以港幣刷卡，不論銀聯卡是什麼貨幣，</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">程序如同香港商戶刷卡消費，匯率跟據銀行而定。如保單貨幣為美元，會</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">把保費轉為港幣收費。</span></p>
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">4)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <span style="font-family:微軟正黑體; font-size:10pt">可即時交現金，但有上限。保誠為8</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">,</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">000美金，友邦為10</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">,</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">000美金，不設找續。</span></p>
            </td>
        </tr>
    </table>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <br style="page-break-before:always; clear:both" /></p>
    <br>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:0pt; width:480pt">
        <tr>
            <td colspan="12" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">受保</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">人資料</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">(如非申請人)</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">&#xa0;</span></p>
            </td>
        </tr>
        <tr style="height:26.6pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">姓名</span></p>
            </td>
            <td colspan="3" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">中文:</span>
                    '.$data['insuredName'].'</p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">拼音:</span>
                    '.$data['insuredNamePinyin'].'</p>
            </td>
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.3pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">性別</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">:</span>
                    <span style="font-family:\'Times New Roman\'; font-size:12pt"></span>
                </p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">男</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">女</span>
                    <br /></p>
            </td>
            <td colspan="4" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.35pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身高</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    '.$data['insuredHeight'].'
                    <span style="font-family:微軟正黑體; font-size:10pt">厘米</span></p>
            </td>
            <td style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:88.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">體重</span>
                    <span style="font-family:Arial; font-size:10pt">:</span>
                    '.$data['insuredWight'].'
                    <span style="font-family:微軟正黑體; font-size:10pt">公斤</span></p>
            </td>
        </tr>
        <tr style="height:21.3pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">與申請人關係</span></p>
            </td>
            <td colspan="3" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['relationship'].'</p>
            </td>
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.3pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">吸煙習慣</span></p>
            </td>
            <td colspan="5" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:180.6pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">非吸煙         </span>
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">吸煙</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">出生日期</span></p>
            </td>
            <td colspan="3" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredBirth'].'</p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">&#xa0;</span></p>
            </td>
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.3pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身份證號碼</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">:</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">通行證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">號碼</span>
                    <span style="font-family:Arial; font-size:10pt">:</span></p>
            </td>
            <td colspan="5" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:180.6pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredIDCard'].'</p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                   '.$data['insuredPassCheck'].'</p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">身份證上地址</span></p>
            </td>
            <td colspan="10" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:414.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                     '.$data['insuredIDCardAddress'].'</p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">收文件</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">位址</span></p>
            </td>
            <td colspan="10" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:414.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredFileAddress'].'</p>
            </td>
        </tr>
        <tr style="height:19.85pt">
            <td colspan="12" style="background-color:#fde9d9; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">如受保人為18歲</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">以上</span>
                    <span style="font-family:Arial; font-size:12pt; font-weight:bold">,</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">請填寫此</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">部份</span></p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">公司名稱</span></p>
            </td>
            <td colspan="6" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:237.25pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredCompanyName'].'</p>
            </td>
            <td style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:53pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">業</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">務</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">性質</span></p>
            </td>
            <td colspan="3" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:102.6pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredBusinessNature'].'</p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">公司地址</span></p>
            </td>
            <td colspan="6" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:237.25pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredCompanyAddress'].'</p>
            </td>
            <td style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:53pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">工作職稱</span></p>
            </td>
            <td colspan="3" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:102.6pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredJobTitle'].'</p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td colspan="2" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:81.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">年收入</span>
                    <span style="font-family:Arial; font-size:10pt">(</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">港幣</span>
                    <span style="font-family:Arial; font-size:10pt">)</span></p>
            </td>
            <td colspan="10" style="background-color:#ffffff; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:414.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['insuredYearIncome'].'</p>
            </td>
        </tr>
        <tr style="height:19.85pt">
            <td colspan="12" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">受益人資料</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:116.8pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">姓名</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">與受保</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">人關係</span></p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">受益人身份證號碼</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">分配</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">百分比</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:116.8pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['beneficiaryInfo']['name1'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['relationship1'].'</p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['IDCard1'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['percent1'].'</p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:116.8pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['beneficiaryInfo']['name2'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['relationship2'].'</p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['IDCard2'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['percent2'].'</p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:116.8pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['beneficiaryInfo']['name3'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['relationship3'].'</p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['IDCard3'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['beneficiaryInfo']['percent3'].'</p>
            </td>
        </tr>
        <tr>
            <td colspan="12" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:12pt; font-weight:bold">*</span>
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:12pt; font-weight:bold">已投保之香港保險公司保單(必須提供)</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:7.2pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">&#xa0;</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:94.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">保險公司</span></p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:135.7pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">產品</span></p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">年繳保費(港幣)</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">申請日期</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:7.2pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">1</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:94.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['everPolicy']['company1'].'</p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:135.7pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['goods1'].'</p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['money1'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['date1'].'</p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:7.2pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">1</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:94.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['everPolicy']['company2'].'</p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:135.7pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['goods2'].'</p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['money2'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['date2'].'</p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:7.2pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">1</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:94.05pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    '.$data['everPolicy']['company3'].'</p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:135.7pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['goods3'].'</p>
            </td>
            <td colspan="4" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:130.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['money3'].'</p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:95.55pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; text-align:justify; widows:0">
                    '.$data['everPolicy']['date3'].'</p>
            </td>
        </tr>
        <tr style="height:0pt">
            <td style="width:18pt; border:none"></td>
            <td style="width:74.2pt; border:none"></td>
            <td style="width:30.65pt; border:none"></td>
            <td style="width:4.75pt; border:none"></td>
            <td style="width:106.35pt; border:none"></td>
            <td style="width:35.4pt; border:none"></td>
            <td style="width:56.7pt; border:none"></td>
            <td style="width:14.2pt; border:none"></td>
            <td style="width:63.8pt; border:none"></td>
            <td style="width:7.05pt; border:none"></td>
            <td style="width:7.1pt; border:none"></td>
            <td style="width:99.25pt; border:none"></td>
        </tr>
    </table>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:0pt; width:480pt">
        <tr>
            <td colspan="5" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:506.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">健康狀況</span>
                    <span style="font-family:Arial; font-size:12pt; font-weight:bold">(</span>
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">基本</span>
                    <span style="font-family:Arial; font-size:12pt; font-weight:bold">)</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">1</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">您是否曾於申請壽險、危疾、意外、傷殘或醫療保險或申請復保時被拒絕受保、擱置受保、須繳付額外保費或修改合約條款</span>
                    <span style="font-family:Arial; font-size:10pt">?</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question11'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question12'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">2</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:20pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">您是否現正、正被建議或打算接受任何醫療諮詢或醫藥治療；或其他情況下被處方藥物超過14天或以上；或您是否現正等候任何檢驗或診斷結果？</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question21'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question22'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">3</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">在醫院或診所接受任何外科手術</span>
                    <span style="font-family:Arial; font-size:10pt">?</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question31'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question32'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">4</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">接受任何</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">檢驗</span>
                    <span style="font-family:Arial; font-size:10pt">(</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">包括</span>
                    <span style="font-family:Arial; font-size:10pt">X</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">光</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">、</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">心電圖</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">、</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">驗血</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">、</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">活體檢視</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">、</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">超聲波</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">、</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">乳房</span>
                    <span style="font-family:Arial; font-size:10pt">X</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">光或子宮頸細胞塗片檢查等</span>
                    <span style="font-family:Arial; font-size:10pt">)</span>
                    <span style="font-family:Arial; font-size:10pt">?</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question41'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question42'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">5</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:20pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">任何胸部或呼吸問題 (例如: 哮喘、支氣管炎、肺結核或其他呼吸器官問題, 包括流鼻血)?</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question51'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question52'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">6</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:20pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">任何心臟的疾病或胸口疼病 (例如: 風濕性發熱、高血壓、心絞痛、心臟雜音、心臟驟停), 或其他血液或血管疾病?</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question61'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question62'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">7</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">任何精神或腦部失常或問題而影響神經系統, 包括癲癇、癱瘓、痳痺、頭暈、長期頭痛、身體失去平衡或抽搐?</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question71'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question72'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">8</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">癌症或腫瘤、囊腫、腫塊或其他任何贅生物?</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question81'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question82'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:24.7pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">9</span></p>
            </td>
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:392.85pt">
                <p style="line-height:20pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">背部、脊椎、肌肉或關節疼痛或其他疾病, 痛風或其他身體殘疾或任何影響視力、說話能力和聽覺的疾病?</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.4pt; vertical-align:top; width:32.05pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question91'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">是</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.4pt; padding-right:5.03pt; vertical-align:top; width:24.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" '.$data['healthStatus']['question92'].'/>
                    <span style="font-family:微軟正黑體; font-size:10pt">否</span></p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="5" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:506.65pt">
                <p style="line-height:15pt; margin:0pt; orphans:0; text-align:center; widows:0">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">到港簽單日期</span></p>
            </td>
        </tr>
        <tr style="height:22.7pt">
            <td colspan="2" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:249.45pt">
                <p style="line-height:16pt; margin:0pt">
                    <span style="font-family:微軟正黑體; font-size:10pt; font-weight:normal">日期：</span>
                    '.$data['date'].'</p>
            </td>
            <td colspan="3" style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:246.4pt">
                <p style="line-height:16pt; margin:0pt">
                    <span style="font-family:微軟正黑體; font-size:10pt; font-weight:normal">時間：</span>
                    '.$data['time'].'</p>
            </td>
        </tr>
        <tr style="height:0pt">
            <td style="width:35.5pt; border:none"></td>
            <td style="width:224.75pt; border:none"></td>
            <td style="width:178.9pt; border:none"></td>
            <td style="width:42.85pt; border:none"></td>
            <td style="width:35.45pt; border:none"></td>
        </tr>
    </table>
    <p style="margin:0pt; orphans:0; widows:0">
        <span style="font-family:\'Times New Roman\'; font-size:12pt">&#xa0;</span></p>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:0pt; width:480pt">
        <tr style="height:22.7pt">
            <td colspan="2" style="background-color:#e5b8b7; border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:middle; width:506.65pt">
                <p style="line-height:16pt; margin:0pt; text-align:center">
                    <span style="font-family:微軟正黑體; font-size:12pt; font-weight:bold">訪港時請帶備以下文件</span></p>
            </td>
        </tr>
        <tr style="height:35.75pt">
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:244.4pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">成人</span>
                    <span style="color:#ff0000; font-family:Arial; font-size:10pt">(18</span>
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">歲以上</span>
                    <span style="color:#ff0000; font-family:Arial; font-size:10pt">)</span>
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">保單</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt; text-decoration:underline">申請人和受保人同為一人</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">中國居民身份證</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">港澳通行證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">(</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">或護照</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">正本</span>
                    <span style="font-family:微軟正黑體; font-size:10pt"></span>
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">入境標籤</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt">&#xa0;</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt; text-decoration:underline">申請人和受保人不同</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">申請人和受保人</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">的</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">中國居民身份證</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">申請人和受保人</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">的</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">港澳通行證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">(</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">或護照</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">正本</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">關係證明</span>
                    <span style="font-family:Arial; font-size:10pt">(</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">如戶口簿或結婚證</span>
                    <span style="font-family:Arial; font-size:10pt">)</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:251.45pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">小孩</span>
                    <span style="color:#ff0000; font-family:Arial; font-size:10pt">(18</span>
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">歲以下</span>
                    <span style="color:#ff0000; font-family:Arial; font-size:10pt">)</span>
                    <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">保單</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:微軟正黑體; font-size:10pt; text-decoration:underline">申請人</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">中國居民身份證</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">港澳通行證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">(</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">或護照</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">)</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">正本</span></p>
                <p style="margin:0pt">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
                <p style="margin:0pt">
                    <span style="font-family:微軟正黑體; font-size:10pt; text-decoration:underline">小孩</span></p>
                <p style="margin:0pt">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">出生證明</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">中國居民身份證</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">(如已領取)</span></p>
                <p style="margin:0pt">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">最近一年的兒童疫苗接種手冊</span>
                    <span style="font-family:Arial; font-size:10pt">(7</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">歲或以下</span>
                    <span style="font-family:Arial; font-size:10pt">)</span></p>
                <p style="margin:0pt">
                    <input type="checkbox" name="Check2" />
                    <span style="font-family:微軟正黑體; font-size:10pt">學生手冊或在校證明</span>
                    <span style="font-family:Arial; font-size:10pt">(7</span>
                    <span style="font-family:微軟正黑體; font-size:10pt">歲以上</span>
                    <span style="font-family:Arial; font-size:10pt">)</span></p>
                <p style="line-height:15pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
            </td>
        </tr>
        <tr style="height:0pt">
            <td style="width:255.2pt; border:none"></td>
            <td style="width:262.25pt; border:none"></td>
        </tr>
    </table>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:Arial; font-size:14pt; font-weight:bold">&#xa0;</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:Arial; font-size:14pt; font-weight:bold">&#xa0;</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="background-color:#ffff00; font-family:微軟正黑體; font-size:14pt; font-weight:bold">重疾</span>
        <span style="background-color:#ffff00; font-family:微軟正黑體; font-size:14pt; font-weight:bold">保單留意事項</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:Arial; font-size:10pt">&#xa0;</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="background-color:#ffff00; font-family:微軟正黑體; font-size:12pt; font-weight:bold">驗身要求</span></p>
    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-left:0pt">
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:新細明體; font-size:11pt">投保額</span>
                    <span style="font-family:新細明體; font-size:11pt"></span>
                </p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">(</span>
                    <span style="font-family:新細明體; font-size:11pt">美金</span>
                    <span style="font-family:Arial; font-size:11pt">)</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">0-17</span>
                    <span style="font-family:新細明體; font-size:11pt">歲</span>
                    <span style="font-family:新細明體; font-size:11pt"></span>
                </p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">18-40</span>
                    <span style="font-family:新細明體; font-size:11pt">歲</span>
                    <span style="font-family:新細明體; font-size:11pt"></span>
                </p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">41-45</span>
                    <span style="font-family:新細明體; font-size:11pt">歲</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">45-55</span>
                    <span style="font-family:新細明體; font-size:11pt">歲</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt; font-weight:bold">56</span>
                    <span style="font-family:微軟正黑體; font-size:11pt; font-weight:bold">歲或以上</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">&#xa0;</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:細明體; font-size:11pt">≦</span>
                    <span style="font-family:Arial; font-size:11pt">400,000</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">&#xa0;</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">400,001 – 650,000</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">X</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, MU, TM</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">650,001 – 750,000</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">APS</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, ECG</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, ECG</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, MU, TM</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, MU, TM</span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">750,001 – 1,250,000</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:69.95pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">APS</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, ECG</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, TM</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, MU, TM</span></p>
            </td>
            <td style="border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:0.75pt; border-left-color:#000000; border-left-style:solid; border-left-width:0.75pt; border-right-color:#000000; border-right-style:solid; border-right-width:0.75pt; border-top-color:#000000; border-top-style:solid; border-top-width:0.75pt; padding-left:5.03pt; padding-right:5.03pt; vertical-align:top; width:70pt">
                <p style="margin:0pt; orphans:0; widows:0">
                    <span style="font-family:Arial; font-size:11pt">BPA, MU, TM</span></p>
            </td>
        </tr>
    </table>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">&#xa0;</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">MED:</span>
        <span style="font-family:微軟正黑體; font-size:10pt">公司指定的醫生驗身</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">APS:</span>
        <span style="font-family:微軟正黑體; font-size:10pt">磷氏綜合征病理報告</span>
        <span style="font-family:微軟正黑體; font-size:10pt">(</span>
        <span style="font-family:微軟正黑體; font-size:10pt">各種風濕</span>
        <span style="font-family:微軟正黑體; font-size:10pt"></span>
        <span style="font-family:微軟正黑體; font-size:10pt">關節炎</span>
        <span style="font-family:微軟正黑體; font-size:10pt"></span>
        <span style="font-family:微軟正黑體; font-size:10pt">脈管炎</span>
        <span style="font-family:微軟正黑體; font-size:10pt"></span>
        <span style="font-family:微軟正黑體; font-size:10pt">脊椎炎</span>
        <span style="font-family:微軟正黑體; font-size:10pt"></span>
        <span style="font-family:微軟正黑體; font-size:10pt">淋巴腫瘤</span>
        <span style="font-family:微軟正黑體; font-size:10pt"></span>
        <span style="font-family:微軟正黑體; font-size:10pt">心肌梗死</span>
        <span style="font-family:微軟正黑體; font-size:10pt">)</span>
        <span style="font-family:微軟正黑體; font-size:10pt">等</span></p>
    <p style="margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">BPA:</span>
        <span style="font-family:微軟正黑體; font-size:10pt">驗血</span>
        <span style="font-family:微軟正黑體; font-size:10pt">,</span>
        <span style="font-family:微軟正黑體; font-size:10pt">激素檢查</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">ECG:</span>
        <span style="font-family:微軟正黑體; font-size:10pt">心電圖</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">TM:</span>
        <span style="font-family:微軟正黑體; font-size:10pt"></span>
        <span style="font-family:微軟正黑體; font-size:10pt">運動</span>
        <span style="font-family:微軟正黑體; font-size:10pt">心</span>
        <span style="font-family:微軟正黑體; font-size:10pt">電圖</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">MU:</span>
        <span style="font-family:微軟正黑體; font-size:10pt">顯微鏡尿液分析</span></p>
    <p style="line-height:18pt; margin:0pt; orphans:0; widows:0">
        <span style="color:#ff0000; font-family:微軟正黑體; font-size:10pt">*驗身注意事項</span></p>
    <p style="margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">-</span>
        <span style="font-family:微軟正黑體; font-size:10pt">女士應避免經期</span>
        <span style="font-family:微軟正黑體; font-size:10pt">一星期後驗身</span></p>
    <p style="margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">-驗血前一晚晚上12時後不可進食</span></p>
    <p style="margin:0pt; orphans:0; widows:0">
        <span style="font-family:微軟正黑體; font-size:10pt">-MU須留小便化驗</span></p>
</div>
            ';

        $word = new word();
        $word->start();
//        $filename = "星宇信息-".$data['name']."-".$data['planType'];
//        $wordname = ROOT_PATH."static/jianli/星宇信息-".$data['name']."-".$data['planType'].".doc";//生成文件路径
        $filename = "星宇信息-";
        $wordname = ROOT_PATH."static/jianli/星宇信息-.doc";//生成文件路径

        header("Content-Type: application/msword");
        header("Content-Disposition: attachment; filename=$filename.doc"); //指定文件名称
        header("Pragma: no-cache");
        header("Expires: 0");

        echo $html;
        $word->save($wordname);

        ob_flush();//每次执行前刷新缓存
        flush();
        ob_end_clean();
    }



}