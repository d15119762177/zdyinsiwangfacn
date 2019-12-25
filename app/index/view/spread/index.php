<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>推广</title>
</head>
    <style>
@media(min-width:720px){
	.appwexi{
	   max-width: 720px;
	}
}
body{max-width: 720px; background:#f5f6f8;}
html{
    background: #f6f6f6;
    overflow: auto;
}
html,body{
    height:100%;
    width:100%;
    margin: 0 auto;
    padding:0;
}
ul li{ list-style-type:none;} 
a{display: block;
    color: #000;
    text-decoration: none;}
 

/*top头部样式**/
.top{
    margin: 3% 5% 5% 5%;
    background: #fff;
    box-shadow: 1px 4px 8px #dcdcdc;
    border-radius: 6px;
    padding-bottom: 15px;
}

.top .top-img{
	width: 30%;
	margin: 0 auto;
	padding-top: 14%;
}

.top .top-img img{
	width: 100%;
	border-radius: 100px;
}
.top p{ 
    text-align:center;
}
/*conner内容样式**/
.conner{
	margin: 5% 5% 8% 5%;
	border-radius: 6px;
}

.conner .conner-img{
	padding: 16%;
	background: #fff;
}

.conner .conner-list{
    background: #fff;
	margin-bottom: 5%;
    box-shadow: 1px 4px 8px #dcdcdc;
}

.conner .conner-list .conner-list-img{
    padding: 15% 13% 2% 13%;
    overflow: hidden;
}

.conner .conner-list .conner-list-p{
    padding: 0 13% 6% 13%;
}

.conner .conner-list .conner-list-img .conner-div-con{
    border: 3px solid #3989ec;
    padding: 10px;
	position: relative;
}

.conner .conner-list .conner-list-img .conner-div-con .conner-left{
    width: 42%;
    background: #fff;
    padding: 12% 12% 89% 12%;
    position: absolute;
    top: -2%;
    height: 100%;
    z-index: 1;
    margin: 0 15%;

}

.conner .conner-list .conner-list-img .conner-div-con .conner-regin{
    height: 54%;
    width: 93%;
    background: #ffffff;
    padding: 6% 5% 5% 5%;
    position: absolute;
    z-index: 0;
    left: -17%;
    top: 18%;
    margin: 0 15%;
}

.conner .conner-list .conner-list-img .conner-div-con img{
    width: 100%;
    z-index: 1;
    position: relative;
}

/*底部样式**/
.bottom{
	width: 100%;
	margin: 0 auto;
	padding-bottom: 30px;
}

.bottom a {
    outline: none;
    background-color: #3989ec;
    border: none;
    color: white;
    padding: 15px 0 15px 0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: 15px;
    width: 100%;
    border-radius: 8px;
	cursor: pointer;
}
</style>

<body>

	<div class="top"  style="background:url(__IMG__/spread/background.png)">
	      <div class="top-img"><img src="{$agentUserInfo['headimgurl']}"></div>
		  <p>{$agentUserInfo['nickname']}</p>
	</div>
	<div class="conner">
        
            <div class="conner-list">
                {if condition="empty($QRCodeUrl)"}
            <!-- 数据为空 -->
                {else /}
                        <div class="conner-list-img">
                            <div class="conner-div-con">
                                <div class="conner-left"></div>

                                <img src="{$QRCodeUrl}" />
                                <!-- https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQFc8DwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAySlpOZVVRVnRjVm0xMDAwMHcwM1QAAgRcTrxbAwQAAAAA -->
                                <div class="conner-regin"/div>
                            </div>
                        </div>
                {/if}

            </div>
     	
      <div class="conner-list-p">
            <p>1、长按二维码关注香港保险</p>
            <p>2、开始填保单</p>
      </div>
	</div>
	<div class="bottom">
        {if condition="empty($QRCodeUrl)"}
            <!-- 数据为空 -->
            <a href="http://ins.yourongfin.com/admin.php/admin/Wechat/buildQRCode">点击生成二维码</a>
        {else /}
            
        {/if}
	</div>
</body>

</html>
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
