<?php
namespace app\admin\controller;
use think\Log;
use think\Controller;
use Gaoming13\WechatPhpSdk\Api2;
use Gaoming13\WechatPhpSdk\Api;
use Gaoming13\WechatPhpSdk\Wechat as ExtendWechat;

define("appId2",config('develop.agent_appid'));
define("appSecret2",config('develop.agent_appsecret'));
define("encodingAESKey2",config('develop.agent_encodingAESKey'));
define("TOKEN2","daili");


class Wechat2 extends Controller{


	public function wxExample2(){

        /*token验证*/
        // $timestamp = $_GET['timestamp'];
        // $nonce = $_GET['nonce'];
        // $token = 'daili';
        // $signature = $_GET['signature'];
        // $array = array($timestamp,$nonce,$token);
        // //2.将排序后的三个参数拼接之后用sha1加密
        // $tmpstr = implode('',$array);
        // $tmpstr = sha1($tmpstr);
        // //3.将加密后的字符串与signature进行对比，判断该请求是否来自微信
        // if($tmpstr == $signature)
        // {    
        //     header('content-type:text');    
        //     echo $_GET['echostr'];    
        //     exit;
        // }
        /*token验证*/

         // wechat模块 - 处理用户发送的消息和回复消息
        $this->wechat = new ExtendWechat(array(
            'appId' => appId2,
            'token' =>  TOKEN2,
            'encodingAESKey' =>  encodingAESKey2 //可选
        ));


        $this->xml_obj = $this->wechat->serve();

        switch ($this->xml_obj->MsgType)
        {
            case "text":
                $this->receiveText();
                break;
            case "event":
                $this->receiveEvent();
                break;
        }

    }
    
    public function wxlogin2($url){

        $api = new Api2(
            array(
                'appId' => appId2,
                'appSecret' => appSecret2,
                'get_access_token' => function() {
                    return session('wechat_login_token2');
                },
                'save_access_token' => function($token2) {
                    session('wechat_login_token2', $token2);
                }
            )
        );

        $a = $api->get_authorize_url('snsapi_userinfo',"http://ins.yourongfin.com/admin.php/admin/wechat2/wxGetCode2?url=".$url);
        header("location:".$a);

    }

    public function wxGetCode2(){

//        import('common.util.Gaoming13.Api',APP_PATH,'.php');
        $url = input('url');
        $api = new Api2(
            array(
                'appId' => appId2,
                'appSecret' => appSecret2,
                'get_access_token' => function() {
                    return session('wechat_login_token2');
                },
                'save_access_token' => function($token2) {
                    session('wechat_login_token2', $token);
                }
            )
        );

        list($err, $user_info) = $api->get_userinfo_by_authorize('snsapi_userinfo');

        $array = json_decode(json_encode($user_info,256|64),TRUE);


        // 判断用户是否加入代理公众号的用户表
        $agent_user = db('agent_user');

        $count = $agent_user->where('openId',$array['openid'])->count();
        if($count){
        	// 存在
        } else {
        	// 不存在
        	$data['openId'] = $array['openid'];
        	$data['headimgurl'] = $array['headimgurl'];
        	$data['nickname'] = $array['nickname'];
        	$data['type'] = 0;
        	$data['agentId'] = 0;
        	$data['createTime'] = time();

        	$agent_user->insert($data);
        }

        session('openid2',$array['openid']);
        session('nickname2',$array['nickname']);
        session('headimgurl2',$array['headimgurl']);

        $this->redirect($url);
    }

    /**
     * 创建自定义菜单
     */
    public function diyWeChatMenu2(){
        $api = new Api2(
            array(
                'appId' => appId2,
                'appSecret' => appSecret2,
                'get_access_token' => function() {
                    return session('wechat_token2');
                },
                'save_access_token' => function($token) {
                    session('wechat_token2', $token);
                }
            )
        );

 
        $res = $api->create_menu('
        {
            "button":[
                
                {
					"type":"view",
					"name":"加入我们",
					"url":"http://ins.yourongfin.com/index.php/index/join/index.html"
				},
               	{
					"type":"view",
					"name":"个人中心",
					"url":"http://ins.yourongfin.com/index.php/index/index/index.html"
				},
            ]
        }');

        echo '<pre>';
            print_r($res);
        echo '</pre>';

    }

    
}