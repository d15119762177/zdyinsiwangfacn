<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>订单提交成功</title>
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


/*底部样式**/
.bottom{
width: 100%;
    margin: 0 auto;
    background: #fff;
    padding-bottom: 30px;
}

</style>

<body>
   <div style="padding: 36%;">
        <img src="__IMG__/logo.png" style="width:100%">
   </div>
   <div>
        <div class="bottom">
			    <p style="text-align: center;">{$message}</p>
        </div>
  </div>
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
