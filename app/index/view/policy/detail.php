<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>政策详情</title>
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
 

/*top头部样式**/
.top{
    margin: 3% 5% 5% 5%;
    background: #fff;
    box-shadow: 1px 4px 8px #dcdcdc;
    border-radius: 6px;
}

.top .top-img{
	padding: 16%;
	background: #fff;
}

.top .top-list{
    background: #fff;
	margin-bottom: 5%;
    box-shadow: 1px 4px 8px #dcdcdc;
	padding-bottom: 1%;
}
.top .top-list .top-list-top{
	padding: 10px;
	display: flex;
	border-bottom: 3px solid #f5f6f8;
}
.top .top-list .top-list-bottom .conner-img img{
	width: 100%;
}
.top .top-list .top-list-top p{
	margin: 0 0 0 10px;
	line-height: 2.1rem;
}
.top .top-list .top-list-top span{
    margin: 0;
    line-height: 2.1rem;
	color: #0685b4;
}
.top .top-list .top-list-bottom{
	display: flex;
	background: #f5f6f8;
	margin: 3%;
	border-radius: 7px;
}
.top .top-list .top-list-bottom .top-title{
	width: 5%;
	margin: auto;
	text-align: center;
}
.top .top-list .top-list-bottom .top-img{
	width: 35%;
	padding: 0 0.8rem;
	margin: auto 0;
}

.top .top-list .top-list-bottom .top-img img{
    width: 100%;
}

.top .top-list .top-list-bottom .top-text{
    width:100%;
}
.top .top-list .top-list-bottom .top-text ul{ 
	margin: 0px;
	padding: 1rem 0;
}
.top .top-list .top-list-bottom .top-text ul li{    
	line-height: 2rem;
	text-align: center;
}

/*conner**/
.conner{
	margin: 5% 5% 22% 5%;
	border-radius: 6px;
}
.conner .conner-top{
	padding: 3%;
	background: #0685b4;
	border-radius: 6px 6px 0 0;
	text-align: center;
	color: #fff;
}


.conner .conner-list {
	background: #fff;
	margin-bottom: 5%;
	border-radius: 6px;
	padding: 3% 2px 3% 2px;
	box-shadow: 1px 4px 8px #dcdcdc;
}
.conner  .conner-table{
	width: 100%;
	overflow: auto;
}

table{
    border-collapse: collapse;
    text-align: center;
    width: 100%;
}        
table td, table th {            
	border:1px solid #c8cacc;            
	color: #666;           
	height: 30px;        
}        
table thead th{            
	background-color: #CCE8EB;            
	width: 100px;        
}        
table tr:nth-child(odd){            
    background: #fff;        
}        
table tr:nth-child(even){            
    background: #F5FAFA;
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
			<div class="top-list-top">
				  <img src="__IMG__/company.png">
				  <p>保险公司 —</p>
				  <span>{$goodsInfo.companyName}</span>
			</div>
			<div class="top-list-bottom">
				    <div  class="top-title">
 
					</div>
					<div style="width: 3px; background: #f5f6f8;"></div>
					<div class="conner-img">
					    <img src="{$goodsInfo.url}"/>
					</div>
					<div class="top-text">
					    <ul>
						     <li>产品名称</li>
							 <li>{$goodsInfo.title}</li>
						</ul>
					</div>
			</div>
		</div>
	</div>
<div class="conner">
         <div class="conner-list">
	        <div class="conner-top">1~5年投保</div>
			<div class="conner-table">
				<table>
					<thead>
						<tr>
							<td>年期</td>
							<td>投保年龄</td>
							<td>第1年</td>
							<td>第2年</td>
							<td>第3年</td>
							<td>第4年</td>
							<td>第5年</td>
						</tr>
					</thead>
					<tbody>
						{volist name="goodsCommisionInfo" id="vo"}
							<tr>
								<td>{$vo.period}</td>
								<td>{$vo.age}</td>
								<td>{$vo.commisionRate1}%</td>
								<td>{$vo.commisionRate2}%</td>
								<td>{$vo.commisionRate3}%</td>
								<td>{$vo.commisionRate4}%</td>
								<td>{$vo.commisionRate5}%</td>
							</tr>
						{/volist}
					</tbody>
				</table>
			</div>
		</div>

         <div class="conner-list">
	        <div class="conner-top">6~10年投保</div>
			<div class="conner-table">
				<table>
					<thead>
						<tr>
							<td>年期</td>
							<td>投保年龄</td>
							<td>第6年</td>
							<td>第7年</td>
							<td>第8年</td>
							<td>第9年</td>
							<td>第10年</td>
						</tr>
					</thead>
					<tbody>
						{volist name="goodsCommisionInfo" id="vo"}
							<tr>
								<td>{$vo.period}</td>
								<td>{$vo.age}</td>
								<td>{$vo.commisionRate6}%</td>
								<td>{$vo.commisionRate7}%</td>
								<td>{$vo.commisionRate8}%</td>
								<td>{$vo.commisionRate9}%</td>
								<td>{$vo.commisionRate10}%</td>
							</tr>
						{/volist}
					</tbody>
				</table>
			</div>
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
