<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>佣金</title>
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
a{
	display: block;
	float: left;
	color: #000;
	width: 100%;
	text-decoration: none;
}
 

/*top头部样式**/
.top{
    margin: 3% 5% 5% 5%;
    background: #fff;
    border-radius: 12px;
    box-shadow: 1px 4px 8px #dcdcdc;
}

/***弹性盒子布局****/
.top .top-list{
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #4768f3;
}
.top .top-list ul{
    display: flex;
    width: 100%;
    padding: 0;
    margin: 0;
}
.top .top-list ul li{
    width:100%;
}
.top .top-list ul li img{
    width: 30%;
    margin: 0px 35%;
}
.top .top-list ul li p{
	text-align: center;
	margin: 5% 0;
}

.top .top-list ul .top-list-on{
	background: #4768f3;
}
.top .top-list ul .top-list-on p{
	color: #fff;
}



/*conner内容样式**/
.conner{
	margin: 5% 5% 22% 5%;
	border-radius: 6px;
}

.conner .conner-img{
	padding: 16%;
	background: #fff;
}

.conner .conner-list{
    background: #fff;
    margin-bottom: 5%;
    padding: 1% 0;
    box-shadow: 1px 4px 8px #dcdcdc;
}

.conner .conner-list .conner-cor{
	margin: 8px 0 8px 8px;
	border-left: 2px solid #7ab6ff;
	border-radius: 2px;
}
.conner .conner-list:nth-child(2n+1) .conner-cor{ 
   border-left: 2px solid #fcd184;
}

.conner .conner-list .conner-list-top{
	padding: 10px;
	border-bottom: 3px solid #f5f6f8;
}
.conner .conner-list .conner-list-bottom{
    display: flex;
}
.conner .conner-list .conner-list-bottom .conner-title{
	width: 20%;
	margin: auto;
	text-align: center;
}
.conner .conner-list .conner-list-bottom .conner-img{
	width: 35%;
	padding: 0 0.8rem;
	margin: auto 0;
}

.conner .conner-list .conner-list-bottom .conner-img img{
    width: 100%;
}

.conner .conner-list .conner-list-bottom .conner-text{
    width:100%;
}
.conner .conner-list .conner-list-bottom .conner-text ul{ 
	margin: 0px;
	padding: 1rem 0;
}
.conner .conner-list .conner-list-bottom .conner-text ul li{    
    line-height: 2rem;
}
.conner .conner-list .conner-list-bottom .conner-text ul li:nth-child(3){    
   color: #9c9c9c;
}

/*底部样式**/
.bottom{
    width: 100%;
    position: fixed;
    margin: 0 auto;
	max-width: 720px;
    bottom: 0;
    background: #fff;
    box-shadow: 1px -1px 8px #dcdcdc;
}
/***弹性盒子布局****/
.bottom ul{
	display: flex;
	width: 100%;
	padding: 0;
	margin: 0;
}
.bottom ul li{
    width:100%;
}
.bottom ul li img{
	width: 25%;
	margin: 11px 37% 0 37%;
}
.bottom ul li p{ 
    text-align: center;
    margin: 0;
    margin-bottom: 6px;
}
</style>

<body>
	<div class="top" >
		  <div class="top-list">
				<ul>
					 <li class='{if condition="$status eq 1"}top-list-on{/if}'>
					      <a href="{:url('index/Commision/index')}?status=1">
							  <p>已结算</p>
						  </a>
					 </li>
					 <li class='{if condition="$status eq 0"}top-list-on{/if}'>
					      <a href="{:url('index/Commision/index')}?status=0">
							  <p>未结算</p>
						  </a>
					 </li>
				</ul>
		  </div>
	</div>
	<div class="conner">

		{if condition="empty($commisionInfo)"}
			<div class="conner-img">
			   <img style="width: 100%" src="__IMG__/user/no-order.png" />
			</div>
		{else /}
			<div>
				{volist name="commisionInfo" id="vo"}
					<div class="conner-list">
					    <div class="conner-cor">
							<div class="conner-list-top">
								   订单号：{$vo.orderNum}
							</div>
							<div class="conner-list-bottom">
									<div  class="conner-title">
										 <span>{$vo.userName}</span>
									</div>
									<div style="width: 3px; background: #f5f6f8;"></div>
									<div class="conner-img">
										<img src="{$vo.goodsUrl}"/>
									</div>
									<div class="conner-text">
										<ul>
											 <li>{$vo.goodsName}</li>
											 <li>{$vo.status}</li>
											 <li>{$vo.time}</li>
										</ul>
									</div>
							</div>
						</div>
					</div>
				{/volist}
			</div>
		{/if}
		
	</div>
	<div style="height: 1px; width: 100%"></div>
	<div class="bottom">
          <ul>
			 <li>
			      <a href="{:url('index/index/index')}">
				  <img src="__IMG__/personal/rectangle1.png" />
				  <p>首页</p>
				  </a>
			 </li>
			 <li>
			      <a href="{:url('index/commision/index')}">
				  <img src="__IMG__/personal/manage2.png"/>
				  <p style="color:#4768f3">佣金</p>
				  </a>
			 </li>
			 <li>
			      <a href="{:url('index/policy/index')}">
				  <img src="__IMG__/personal/1.png" />
				  <p>政策</p>
				  </a>
			 </li>
			 <li>
			      <a href="{:url('index/personal/index')}">
				  <img src="__IMG__/personal/user1.png" />
				  <p>我的</p>
				  </a>
			 </li>
		  </ul>
	</div>
</body>

</html>
