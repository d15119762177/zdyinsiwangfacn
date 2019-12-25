<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>受益人</title>
<link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css">
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

ul{padding: 0px;margin: 0;}
ul li{
   list-style-type:none;line-height: 2rem;
}
.appwexi{
    margin: 0 auto;
    padding: 30px 15px;
    background: #fff;
}

/***title***/
.title ul li{
    width: 100%;
    margin: 0 auto;
    text-align: center;
}
.title ul li h3{ 
    margin:0;
}

.title ul li h3 span{ 
    margin-left: -8px;
    margin-right: 4px;
    font-weight: bold;
    color: #f00;
}
.title ul li:nth-child(2){
font-size: 0.8rem;
}

.conner-list{
    display: -webkit-flex;
    display: flex;

    width: 100%;
    border-bottom: 1px solid #e3e3e3;
}


.flex-item:first-child{ 
    color: #5e5a5a;
    width: 30%;
    font-weight: bold;
    height: 1.6em;
    line-height: 1.9rem;
}

.flex-item {
    width: 100%;
    margin: 10px;
}

.flex-item p{
    position: relative;
    margin: 0;
    color: #f00;
    float: left;
    margin-left: -9px;
}

.flex-item input{
    width: 100%;
    height: 2em;
    border: 0px;
    outline: 0;
}

/***单选框样式****/
.radio label{
    display: block;
    width: 95px;
    float: left;
    margin: 0.8% 0;
}
.radio input{
    width: 1.8rem;
    height: 1.8rem;
    border: 0px;
    float: left;
    display:none;
}

input[type="radio"] + label::before {
    content: "\a0"; /*不换行空格*/
    display: inline-block;
    vertical-align: middle;
    font-size: 18px;
    width: 1em;
    height: 1em;
    margin-right: .4em;
    border-radius: 50%;
    border: 1px solid #cbcbcb;
    text-indent: .15em;
    line-height: 1; 
    background: #fff;
    padding: 0.1em;
}

input[type="radio"]:checked + label::before {
    background-color:#ff0f0f;
    background-clip: content-box;
    padding: 0.1em;
}
input[type="radio"] {
    position: absolute;
    clip: rect(0, 0, 0, 0);
}

/***三列弹性盒子布局****/
.flex-item-input{position: relative; right: -2.57%;}
.flex-item-on{
    width: 17%;
    margin: 0;
    line-height: 3.175rem;
    position: relative;
    right: 0;
    background: #fff;
    text-align: center;
}
/*底部按钮样式**/
.bottom{
    width: 100%; margin:0 auto;margin-top: 15px;
}
.bottom a{   
    outline: none; 
    background-color: #fa1818; /* Green */
    border: none;
    color: white;
        padding: 15px 0 15px 0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;    
    margin-top: 15px;
  width:100%;
}

</style>

<body>
  <div style="height:15px; width:100%; background:#f6f6f6;"></div>
  <div class="appwexi">
        <div class="title">
             <ul>
                 <li><h3><span>|</span>受益人资料</h3></li>
                 <li>请填写并核对信息</li>
             </ul>
        </div>
        <div class="conner">
                <div class="conner-list" style="border-top: 1px solid #e3e3e3;">
                      <div class="flex-item">
                          <p>*</p>
                          姓名
                      </div>
                      <div class="flex-item">
                           <input placeholder="请填写你的姓名"/>
                      </div>
                </div>
                
                <div class="conner-list">
                      <div class="flex-item">性别</div>
                      <div class="flex-item radio">
                            <div class="female">
                                <input type="radio" id="female" name="sex" />
                                <label for="female">男</label>
                            </div>
                            <div class="male">                
                                <input type="radio" id="male" name="sex" />
                                <label for="male">女</label>
                            </div>
                      </div>
                </div>      
                
                <div class="conner-list">
                      <div class="flex-item">吸烟习惯</div>
                      <div class="flex-item radio">
                            <div class="female">
                                <input type="radio" id="shi" name="radioa" />
                                <label for="shi">非吸烟</label>
                            </div>
                            <div class="male">                
                                <input type="radio" id="fo" name="radioa" />
                                <label for="fo">吸烟</label>
                            </div>
                      </div>
                </div>  
                
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          出生日期
                      </div>
                      <div class="flex-item">
                           <input type="text" class="demo-input" placeholder="请选择日期" id="test1">
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          关系
                      </div>
                      <div class="flex-item">
                            <input placeholder="请填写与申请人关系"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          身份证号
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入你的身份证号码"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          通行证
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入你的通行号码"/>
                      </div>
                </div>  
                <div class="conner-list">
                      <div class="flex-item" >
                          <p>*</p>
                          身高
                      </div>
                      <div class="flex-item flex-item-input">
                            <input placeholder="请输入你的身高"/>
                      </div>
                      <div class="flex-item  flex-item-on">
                           厘米
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          体重
                      </div>
                      <div class="flex-item flex-item-input">
                            <input placeholder="请输入你的体重"/>
                      </div>
                      <div class="flex-item flex-item-on">
                           公斤
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          居住地址
                      </div>
                      <div class="flex-item">
                            <input placeholder="请填写身份证上的地址"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          收件地址
                      </div>
                      <div class="flex-item">
                            <input placeholder="请填写能收到文件的地址"/>
                      </div>
                </div>
        </div>
  </div>
  <div style="height:15px; width:100%; background:#f6f6f6;"></div>
<div class="appwexi">
        <div class="title">
             <ul>
                 <li><h3><span>|</span>受保人为18岁以上请填写此部分</h3></li>
                 <li>请填写并核对信息</li>
             </ul>
        </div>
        <div class="conner">
                <div class="conner-list" style="border-top: 1px solid #e3e3e3;">
                      <div class="flex-item">
                          <p>*</p>
                          公司名称
                      </div>
                      <div class="flex-item">
                           <input placeholder="请填写你的公司名称"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          业务性质
                      </div>
                      <div class="flex-item">
                            <input placeholder="请填写业务性质"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          工作职称
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入你的职称"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          公司地址
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入公司地址"/>
                      </div>
                </div>  
                <div class="conner-list">
                      <div class="flex-item" >
                          <p>*</p>
                          年收入
                      </div>
                      <div class="flex-item flex-item-input">
                            <input placeholder="请填写年收入金额"/>
                      </div>
                      <div class="flex-item  flex-item-on">
                           港币
                      </div>
                </div>
        </div>
        <div class="bottom">
			    <a href="#" type="button" class="btn btn1">下一页</a>
			    <a href="#" type="button" class="btn btn1">上一页</a>
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
