<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>保险产品分析</title>
</head>
    <style>
@media(min-width:720px){
	.appwexi{
	   max-width: 720px;
	}
}
body{max-width: 720px; background:#fff;}
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

/*top头部样式**/
.top{
    padding: 5% 5%;
    text-align: center;
}
/*conner内容样式**/
.conner{
  margin-top: 24px;
  padding:0 5%;
}
/***弹性盒子布局**/
.conner-list ul{
	display: flex;
	width: 100%;
	padding: 0px;
	border: 1px solid #f5efef;
	margin: 0;
	background: #ecf5f4;
	border-radius: 90px;
}

.conner-list ul li{
	width: 100%;
	line-height: 2rem;
	text-align: center;
	font-size: 0.8rem;
	position: relative;
}

/***进度框****/
.conner-list ul .conner-list-li{
    background: #17c2d3;
    color: #fff;
    border-radius: 90px;
}
.conner-list ul .conner-list-li .conner-li-top{
    position: absolute;
    width: 80%;
    margin: 0 10%;
    top: -40px;
    color: #000;
    border: 1px solid #000;
    border-radius: 8px;
}
/*向下*/
.triangle_border_down{
    width: 0;
    height: 0;
    border-width: 7px 7px 0;
    border-style: solid;
    border-color: #333 transparent transparent;
    position: absolute;
    left: 42%;
}
.triangle_border_down span{
    display: block;
    width: 0;
    height: 0;
    border-width: 11px 11px 0;
    border-style: solid;
    border-color: #fff transparent transparent;
    position: relative;
    top: -12px;
    left: -11px;
}
/***edu进度框****/

/***标题h3 弹性盒子布***/
.conner-h3{
   text-align: center;
}
.conner-h3 div{
  display: inline-block;
}
.conner-h3 ul{
    display: flex;
    padding: 0px;
    margin: 0 auto;
}
.conner-h3 ul li{ 
	text-align: center;
	color: #17c2d3;
	font-size: 2.8rem;
	margin-top: 0.77rem;
}
.conner-h3 ul li img{ 
    width:40%;
}
.conner-h3 ul li:nth-child(2){ 
    font-size: 1.5rem;
    color: #000;
    margin: 2rem 10px;
    text-align: center;
}

.conner-h3 ul li h5{
    margin: 0px;
}
.conner .conner-bottom img{ 
  width:100%;
}

/*底部样式**/
.bottom{
    padding: 0 5%;
	margin: 0 auto;
	background: #fff;
	padding-bottom: 30px;
}

.bottom a{   
    outline: none;
    background-color: #17c2d3;
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
}
</style>

<body>
   <div class="top" >
        <h2>分析|{$goodsInfo.companyName}-{$goodsInfo.title}</h2>
   </div>
   <div class="conner">
		<div class="conner-list">
			<ul>
                <li {if condition="$goodsInfo.score >= 0 && $goodsInfo.score < 30"}class="conner-list-li"{/if}>
                    {if condition="$goodsInfo.score >= 0 && $goodsInfo.score < 30 "}
                        <div class="conner-li-top">
                            {$goodsInfo.score}
                            <div class="triangle_border_down"><span></span></div>
                        </div>
                    {/if}
                    太差
                </li>
                <li {if condition="$goodsInfo.score >= 30 && $goodsInfo.score < 60 "}class="conner-list-li"{/if}>
                    {if condition="$goodsInfo.score >= 30 && $goodsInfo.score < 60 "}
                        <div class="conner-li-top">
                            {$goodsInfo.score}
                            <div class="triangle_border_down"><span></span></div>
                        </div>
                    {/if}
                    一般
                </li>
                <li {if condition="$goodsInfo.score >= 60 && $goodsInfo.score < 90 "}class="conner-list-li"{/if}>
                    {if condition="$goodsInfo.score >= 60 && $goodsInfo.score < 90 "}
                        <div class="conner-li-top">
                            {$goodsInfo.score}
                            <div class="triangle_border_down"><span></span></div>
                        </div>
                    {/if}
                    不错
                </li>
				<li {if condition="$goodsInfo.score >= 90 "}class="conner-list-li"{/if}>
                    {if condition="$goodsInfo.score >= 90 "}
                        <div class="conner-li-top">
                            {$goodsInfo.score}
                            <div class="triangle_border_down"><span></span></div>
                        </div>
                    {/if}
                    产品很棒
				</li>
			</ul>
		</div>
		<div class="conner-h3">
		     <div>
				 <ul>
					   <li><img src="__IMG__/conner-left.png" /></li>
					   <li><h5>这个产品太棒了！ 赶紧去看看吧</h5></li>
					   <li><img src="__IMG__/conner-regin.png" /></li>
				 </ul>
			 </div>
		</div>
		<div class="conner-bottom">
             <img src="{$goodsInfo.url}">
		</div>
   </div>
	<div class="bottom">
		  <a href="{:url('index/productplan/goodsdetail',['id' => $goodsInfo.id])}">查看产品详情</a>
	</div>
</body>

</html>
