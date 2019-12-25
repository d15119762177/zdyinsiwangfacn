<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css">
<title>补充资料</title>
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
    padding: 10% 25% 5% 25%;
}
/*conner内容样式**/
.conner{
  padding:0 5%;
}
/***弹性盒子布局**/
.conner-list ul{
	display: flex;
	width: 100%;
	padding: 12px 0;
	border-bottom: 1px solid #f5efef;
	margin: 0;
}
.conner-list ul li:first-child{ 
	width: 25%;
	font-weight: 600;
}
.conner-list ul li{
    width:100%;
}
.conner-list ul li input{
	border: 0px;
	font-size: 1rem;
	width: 100%;outline:none;
}

.conner-list ul li span{
    color: #f00;
	margin-right:2px;
}

/****form提交框样式***/
.conner-battom{
    margin-top: 30px;
}     
.conner-bottom button{   
	outline: none;
	background-color: #17c2d3;
	border: none;
	color: white;
	padding: 15px 0 15px 0px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin-top: 35px;
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

</style>

<body>
   <div class="top" >
        <img src="__IMG__/vectoicon.png" style="width:100%">
		<h3 style="text-align:center;">你好！ 请补充资料</h3>
   </div>
   <div class="conner">
        <form action="{:url('index/Supplement/index')}" method="post" method="post" class="layui-form" lay-ignore >
		      <div class="conner-list">
					<ul>
					  <li><span>*</span>姓名：</li>
					  <li><input placeholder="请填写您的姓名"/ name="name" lay-verify="username"></li>
					</ul>
					<ul>
					  <li><span>*</span>电话：</li>
					  <li><input placeholder="请输入您的常用电话号码"/ name="email" lay-verify="mobile"></li>
					</ul>
					<ul>
					  <li><span>*</span>邮箱：</li>
					  <li><input placeholder="请填写您的邮箱" name="phone" lay-verify="email" /></li>
					</ul>
			  </div>
			  <div class="conner-bottom">
			       <button type="submit" class="btn btn1" lay-filter="formDemo" lay-submit="" lay-ignore>确认</button>
			  </div>
		</form>
   </div>
</body>
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
<script src="__ADMIN_JS__/layui/layui.js"></script>
<script>
    layui.use('form', function(){
        var form = layui.form;
        var reg = /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/;
        var age1 = /(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx])|([1−9]\d5\d2((0[1−9])|(10|11|12))(([0−2][1−9])|10|20|30|31)\d2[0−9Xx])/;
        var mobileon = /^1[34578]\d{9}$/;
        //各种基于事件的操作，下面会有进一步介绍
        form.verify({
            //用户名判断
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if (value == '') { 
                    return '用户名不能为空'
                }
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
                if(!new RegExp("^[\u4E00-\u9FA5]{2,5}$").test(value)){
                    return '请检查名字，不符合规定';
                }
            },

            //电话号码
            mobile:function(value, item){
                if (value == '') { 
                    return '电话号不能为空'
                }
                if(!new RegExp(mobileon).test(value)){
                    return '请输入正确的电话号';
                }
            }
        });
    });
</script>

</html>
