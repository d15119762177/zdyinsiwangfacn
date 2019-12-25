<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>个人中心</title>
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
    padding: 50% 5% 0% 5%;
    background: #4768f3;
    position: relative;
}
.top .top-conner{ 
    width: 90%;
    position: absolute;
    top: 57%;
    box-shadow: 1px 4px 8px #dcdcdc;
    background: #fff;
    border-radius: 6px 6px 0px 0px;
}
.top .top-conner .top-img{
    width: 23%;
    border-radius: 100%;
    margin: 0 37.6%;
    position: absolute;
    top: -32%;
    z-index: 1;
    border: 6px solid #fff;
}
.top .top-conner p{
    text-align: center;
    width: 100%;
    background: #fff;
    margin: 0;
    padding-top: 15%;
    border-radius: 6px 6px 0 0;
}
.top .top-conner .top-conner-fff{
    background: #fff;
    margin-top: 7%;
}

/***弹性盒子布局**/
.top .top-conner .top-conner-fff ul{
	display: flex;
	width: 100%;
	background: #f5f6f8;
	padding:0;
	border-bottom: 1px solid #f5efef;
	margin: 0;
}

.top .top-conner .top-conner-fff ul li{
    width: 25%;
}
.top .top-conner .top-conner-fff li:nth-child(2){ 
    width: 100%;
    line-height: 4.55rem;
}
.top .top-conner .top-conner-fff li:nth-child(3){ 
	font-size: 1.2rem;
	line-height: 3.8rem;
	font-weight: bold;
}



.top .top-conner .top-conner-fff ul li img{
	padding: 0.5rem;
	margin-top: 0.2rem;
	width: 3rem;
	position: inherit;
}



/*conner内容样式**/
.conner{
	margin: 38% 5% 150px 5%;
	background: #fff;
	box-shadow: 1px 4px 8px #dcdcdc;
	border-radius: 6px;
}
.conner .conner-top h3{
    width: 32%;
    margin: 0 auto;
    text-align: center;
    line-height: 2.5rem;
    box-shadow: 0px 4px 0px #4768f3;
    position: relative;
    top: -1.2rem;
    background: #fff;
    border-radius: 6px;
}

/***弹性盒子布局****/
.conner .conner-list ul{
	display: flex;
	width: 100%;
	padding: 12px 0;
	margin: 0;
}
.conner .conner-list ul li{
    width:100%;
}
.conner .conner-list ul li img{
    width: 50%;
    margin: 0 25%;
}
.conner .conner-list ul li p{ 
    text-align:center;
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
		<div  class="top-conner">
			<img class="top-img" src="{$agentUserInfo['headimgurl']}" /> 
			<p>{$agentUserInfo['nickname']}</p>
			<a href="{:url('index/spread/index')}">
				<div class="top-conner-fff">
					<ul>
						 <li><img  src="__IMG__/personal/code.png" /></li>
						 <li style="margin-left: 7px;">我的推广</li>
						 <li><span style="    width: 7px;
    height: 7px;
    border-top: 2px solid #000000;
    border-right: 2px solid #080000;
    transform: rotate(45deg);
    display: block;
    margin:1.9rem auto;"></span></li>
					</ul>
				</div>
			</a>
		</div>
	</div>
	<div class="conner">
		  <div class="conner-top">
				<h3>我的订单</h3>
		  </div>
		  <div class="conner-list">
				<ul>
					 <li>
					      <a href="{:url('index/user/index')}?type=0">
						  <img src="__IMG__/personal/all.png" />
						  <p>全部</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=1">
						  <img src="__IMG__/personal/proposal.png" />
						  <p>建议书</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=2">
						  <img src="__IMG__/personal/deal.png" />
						  <p>成交单</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=3">
						  <img src="__IMG__/personal/visit.png"/>
						  <p>访港</p>
						  </a>
					 </li>
				</ul>
				<ul>
					 <li>
					      <a href="{:url('index/user/index')}?type=4">
						  <img src="__IMG__/personal/payment.png" />
						  <p>已缴费</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=5">
						  <img src="__IMG__/personal/audit.png">
						  <p>审核中</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=6">
						  <img src="__IMG__/personal/checked.png" />
						  <p>已审核</p>
						  </a>
					 </li>
					 <li>
					      <a href="{:url('index/user/index')}?type=7">
						  <img src="__IMG__/personal/signin.png" />
						  <p>已签收</p>
						  </a>
					 </li>

				</ul>
		  </div>
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
