<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>无标题文档</title>
</head>
<style>@media(min-width:720px){	.appwexi{
        max-width: 720px;}
    }
    body{max-width: 720px;}
    html{background: #f6f6f6;overflow: auto;}
    html,body{	height:100%;width:100%;	margin: 0 auto;padding:0;}
    body{background: #ffffff;}	ul{padding: 0px;margin: 0;}
    ul li{list-style-type:none;line-height: 2rem;}
    .appwexi{float: left; background: #fff;margin: 0 auto;	}
    .appwexi .top{ background-size: 100% 100%!important;width: 100%;}
    .appwexi .top .userimg{padding: 25% 21% 1% 20%;	}
    .appwexi .top .userimg img{width: 30%; margin: 0 35%;border-radius: 4em;}
    .appwexi .top p{text-align: center;	color: #fff7f4; margin-bottom: 30px;}
    .conner{margin-top: 4%;	padding: 0 20px;}
    .conner .conner-list{width: 100%; border: 1px solid #ededed; float: left; text-decoration: none; color: #000; margin-bottom: 15px;}
    .conner .conner-list .conner-list-left{	 width: 40%; padding: 10px; border-right: 1px solid #ededed; float: left;}
    .conner .conner-list .conner-list-left img{ width: 100%;}
    .conner .conner-list .conner-list-right {width: 100%; float: right; padding: 10px 0px 10px 10px;   }
    .conner-list{	display: -webkit-flex; justify-content: flex-end;	}
    .conner-list .flex-item:first-child{ width: 50%;	}
    .conner-list .conner-list-right .conner-right-li-top{padding-bottom: 10px;border-bottom: 1px solid #ededed;}
    .conner-list .conner-list-right .conner-right-li-bottom{ margin-top:10px;}
</style>
<body>


  <div class="appwexi">
           <div class="top" style=" background:url(__IMG__/back.png)">
		         <div class="userimg">
				       <img src="{$headimgurl}" />
					    <p>{$nickname}</p>
				 </div>
		   </div>
		   <div class="conner">
		         <div class="connera">
                     {volist name="orderList" id="vo"}
				  	   <div class="conner-list">
					        <div class="flex-item conner-list-left">
							     <img src="{$vo.url}" />
							</div>
					        <div class="flex-item conner-list-right">
								 <div class="conner-right-li-top"> 
									   <ul>
											<li style="font-weight: bolder;">{$vo.goodsName}</li>
											<li style="color: #f00;">保额：{$vo.quota}</li>
											<li>被保险人姓名：{$vo.userName}</li>
									   </ul>
								 </div>
								 <div class="conner-right-li-bottom">
									   <ul style="color: #989797;">
											<li>保险生效时间：{$vo.startTime}</li>
											<li>保险失效时间：{$vo.endTime}</li>
									   </ul>
								 </div>
							</div>
					   </div>
                     {/volist}
				 </div>
		   </div>
  </div>
</body>
</html>
