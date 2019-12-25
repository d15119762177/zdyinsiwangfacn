<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>提示</title>
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
/****form提交框样式***/
.conner-battom{
    margin-top: 30px;
}     
.conner-bottom a{   
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
.conner-bottom p{   
	margin: 0;
	width: 100%;
	text-align: center;
	color: #17c2d3;
	font-size: 0.8rem;
	line-height: 2rem;
}

/*底部样式**/
.bottom{
width: 100%;
    margin: 0 auto;
    background: #fff;
    padding-bottom: 30px;
}
input[type="button"], input[type="submit"], input[type="reset"] {
    -webkit-appearance: none;
}

</style>

<body>
    {if condition="$type == 0"}
    <!-- 用户没有申请 -->
        <div style=" ">
        <img src="__IMG__/tishi1.png" style="width:100%;" >
        </div>
        <div style="padding: 0 5%;">
            <div class="conner-bottom">
                <!-- <p>您暂时不是代理</p> -->
                <a href="">填写代理申请</a>
            </div>
        </div>
    {elseif condition="$type == 1"/}
    <!-- 用户已申请，审核中 -->
    <div style=" ">
        <img src="__IMG__/tishi2.png" style="width:100%;" >
        </div>
        <div style="padding: 0 5%;">
            <div class="conner-bottom">
                <!-- <p>您暂时不是代理</p> -->
                <!-- <a href="">审核中呢，别急</a> -->
            </div>
        </div>
    {else /}
    <!-- 用户已通过 -->
    <div style=" ">
        <img src="__IMG__/tishi3.png" style="width:100%;" >
        </div>
        <div style="padding: 0 5%;">
            <div class="conner-bottom">
                <!-- <p>您暂时不是代理</p> -->
                <a href="{:url('index/index/index')}">审核通过了，跳转进个人中心吧</a>
            </div>
        </div>
    {/if}
   
</body>
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
<script src="__JS__/laydate/laydate.js"></script>
<script>
lay('#version').html('-v'+ laydate.v);
//执行一个laydate实例
laydate.render({
  elem: '#test1' //指定元素
});
</script>
<script>
//监控屏幕高度设置背景图
$(window).resize(function(){
    var height = $(window).height();
　　if(height < 500){
        $('body').css("height","auto");
    }else{
        $('body').css("height","100%");
    };
});
$(function(){ 
    var height = $(window).height();
　　if(height < 500){
        $('body').css("height","auto");
    }; 
}); 
</script>
</html>
