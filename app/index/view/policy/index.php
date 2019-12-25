<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>政策</title>
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
	color: #000;
	text-decoration: none;
}


/*conner内容样式**/
.conner{
    margin: 5% 5% 13% 5%;
    background: #fff;
    box-shadow: 1px 4px 8px #dcdcdc;
    border-radius: 6px;
	float: left;
}

/***弹性盒子布局****/
.conner .conner-list ul{
	width: 100%;
	padding: 0;
	margin: 0;
}

.conner .conner-list ul li{
    width:50%;
	float: left;
}

.conner .conner-list ul li a{
	padding: 10% 0;
}
.conner .conner-list ul li div{ 
	width: 80%;
	margin-top: 0.55rem;
	max-width: 200px;
	margin: 0 auto;
}
.conner .conner-list ul li div img{
	width: 100%;
	border: 3px solid #eaeaea;
}
.conner .conner-list ul li p{ 
    text-align: center;
}
.conner .conner-list ul li p span{ color:#9a9a9a;
}
/*底部样式**/
.bottom{
    width: 100%;
    position: fixed;
    margin: 0 auto;
    bottom: 0;
    background: #fff;
	max-width: 720px;
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
	<div class="conner">
		  <div class="conner-list">
				<ul>
					{volist name="policyInfo2" id="vo"}
						<li>
						  	<a href="{:url('index/policy/detail')}?goodsId={$vo.goodsId}">
							  	<div class="conner-list-img"><img src="{$vo.goodsUrl}" /></div>
							  	<p>{$vo.goodsName}</p>
						  	</a>
						</li>
					{/volist}
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
					  <img src="__IMG__/personal/2.png" />
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
