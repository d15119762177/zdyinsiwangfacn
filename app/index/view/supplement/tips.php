<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>提示页</title>
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
.conner-bottom input{   
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
   <div class="top">
        <img src="__IMG__/tips.png" style="width:100%">
   </div>
</body>

</html>
