<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>客户</title>
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
}

/***弹性盒子布局****/
.top .top-list{
   padding: 5px 0px 13px 0px;
}
.top .top-list ul{
    display: flex;
    width: 100%;
    padding: 12px 0 4px 0;
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
    box-shadow: 1px 4px 8px #dcdcdc;
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
					 <li>
					      <a href="{:url('index/user/index')}?type=0">
						  <img src='{if condition="$type eq 0"}__IMG__/user/whole1.png{else /}__IMG__/user/whole2.png{/if}' />
						  <p style='{if condition="$type eq 0"}color:#DF6207;{/if}'>成交</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=1">
						  <img src='{if condition="$type eq 1"}__IMG__/user/proposal1.png{else /}__IMG__/user/proposal2.png{/if}' />
						  <p style='{if condition="$type eq 1"}color:#DF6207;{/if}' >建议书</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=2">
						  <img src='{if condition="$type eq 2"}__IMG__/user/Deal1.png{else /}__IMG__/user/Deal2.png{/if}' />
						  <p style='{if condition="$type eq 2"}color:#DF6207;{/if}' >成交单</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=3">
						  <img src='{if condition="$type eq 3"}__IMG__/user/return1.png{else /}__IMG__/user/return2.png{/if}'/>
						  <p style='{if condition="$type eq 3"}color:#DF6207;{/if}' >访港</p>
						  </a>
					 </li>
				</ul>
				<ul>
					 <li>
					      <a href="{:url('index/user/index')}?type=4">
						  <img src='{if condition="$type eq 4"}__IMG__/user/Trial1.png{else /}__IMG__/user/Trial2.png{/if}' />
						  <p style='{if condition="$type eq 4"}color:#DF6207;{/if}' >已缴费</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=5">
						  <img src='{if condition="$type eq 5"}__IMG__/user/Trial1.png{else /}__IMG__/user/Trial2.png{/if}'>
						  <p style='{if condition="$type eq 5"}color:#DF6207;{/if}' >审核中</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=6">
						  <img src='{if condition="$type eq 6"}__IMG__/user/Solve1.png{else /}__IMG__/user/Solve2.png{/if}' />
						  <p style='{if condition="$type eq 6"}color:#DF6207;{/if}' >已审核</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=7">
						  <img src='{if condition="$type eq 7"}__IMG__/user/collect1.png{else /}__IMG__/user/collect2.png{/if}' />
						  <p style='{if condition="$type eq 7"}color:#DF6207;{/if}' >已签收</p>
						  </a>
					 </li>
				</ul>
		  </div>
	</div>
	<div class="conner">

		{if condition="empty($orderInfo)"}
			<div class="conner-img">
			   <img style="width: 100%" src="__IMG__/user/no-order.png" />
			</div>
		{else /}
			<div>
				{volist name="orderInfo" id="vo"}
					<div class="conner-list">
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
										 <li>{$vo.updateTime}</li>
									</ul>
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
				  <img src="__IMG__/personal/manage1.png"/>
				  <p>佣金</p>
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
				  <img src="__IMG__/personal/user2.png" />
				  <p>我的</p>
				  </a>
			 </li>
		  </ul>
	</div>
</body>

</html>
