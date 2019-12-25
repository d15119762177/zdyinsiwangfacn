<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>受保人</title>

</head>
<link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css">
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
/*select样式*/
.flex-item-select{
  border-radius: 5px;
  position: relative;
}
.flex-item-select select{
  border-color: rgb(255, 255, 255);
  border-radius: 6px;
  border: none;
  outline: none;
  width: 100%;
  height: 2rem; 
  line-height: 2rem;
  appearance: none;
  padding-left: 0.6rem;
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
.bottom button{   
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
  <form action="{:url('index/visitbook/submitInsurant')}" method="post" class="layui-form" lay-ignore>
  <div class="appwexi">
        <div class="title">
             <ul>
                 <li><h3><span>|</span>受保人资料（非申请人）</h3></li>
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
                           <input placeholder="请填写你的姓名" name="insuredName" value="{$info.insuredName|default=''}" lay-verify="username" />
                      </div>
                </div>
                
                <div class="conner-list">
                      <div class="flex-item">性别</div>
                      <div class="flex-item radio">
                            <div class="female">
                                <input type="radio" id="female" name="insuredSex" value="1" {if condition="isset($info['insuredSex']) && ($info.insuredSex eq 1)"}checked{/if} lay-ignore/>
                                <label for="female">男</label>
                            </div>
                            <div class="male">                
                                <input type="radio" id="male" name="insuredSex" value="0" {if condition="isset($info['insuredSex']) && ($info.insuredSex eq 0)"}checked{/if} lay-ignore/>
                                <label for="male">女</label>
                            </div>
                      </div>
                </div>      
                
                <div class="conner-list">
                      <div class="flex-item">吸烟习惯</div>
                      <div class="flex-item radio">
                            <div class="female">
                                <input type="radio" id="shi" name="insuredSmokingStatus" value="0" {if condition="isset($info['insuredSmokingStatus']) && ($info.insuredSmokingStatus eq 0)"}checked{/if} lay-ignore/>
                                <label for="shi">非吸烟</label>
                            </div>
                            <div class="male">                
                                <input type="radio" id="fo" name="insuredSmokingStatus" value="1" {if condition="isset($info['insuredSmokingStatus']) && ($info.insuredSmokingStatus eq 1)"}checked{/if} lay-ignore/>
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
                           <input type="text" class="demo-input" placeholder="请选择日期" id="test1" name="insuredBirth" value="{$info.insuredBirth|default=''}" lay-verify="required"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          关系
                      </div>
                      <div class="flex-item radio radio-select">
                          <div class="flex-item-select">
                              <select name="relationship" lay-ignore>
                                  <option  style=" display:none">请选择与申请人关系</option> 
                                  <option value="1" {if condition="isset($info['relationship']) && ($info.relationship eq 1)"}selected{/if}>子女</option>
                                  <option value="2" {if condition="isset($info['relationship']) && ($info.relationship eq 2)"}selected{/if}>父母</option>
                                  <option value="3" {if condition="isset($info['relationship']) && ($info.relationship eq 3)"}selected{/if}>配偶</option>
                              </select>
                          </div>
                      </div>
           
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          身份证号
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入你的身份证号码" name="insuredIDCard" value="{$info.insuredIDCard|default=''}" lay-verify="identity"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          通行证
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入你的通行号码" name="insuredPassCheck" value="{$info.insuredPassCheck|default=''}" lay-verify="required"/>
                      </div>
                </div>  
                <div class="conner-list">
                      <div class="flex-item" >
                          <p>*</p>
                          身高
                      </div>
                      <div class="flex-item flex-item-input">
                            <input placeholder="请输入你的身高" name="insuredHeight" value="{$info.insuredHeight|default=''}" lay-verify="required|money"/>
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
                            <input placeholder="请输入你的体重" name="insuredWight" value="{$info.insuredWight|default=''}" lay-verify="required|money"/>
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
                            <input placeholder="请填写身份证上的地址" name="insuredIDCardAddress" value="{$info.insuredIDCardAddress|default=''}" lay-verify="required"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          收件地址
                      </div>
                      <div class="flex-item">
                            <input placeholder="请填写能收到文件的地址" name="insuredFileAddress" value="{$info.insuredFileAddress|default=''}" lay-verify="required"/>
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
                           <input placeholder="请填写你的公司名称" name="insuredCompanyName" value="{$info.insuredCompanyName|default=''}" lay-verify="required"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          业务性质
                      </div>
                      <div class="flex-item">
                            <input placeholder="请填写业务性质" name="insuredBusinessNature" value="{$info.insuredBusinessNature|default=''}" lay-verify="required"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          工作职称
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入你的职称" name="insuredJobTitle" value="{$info.insuredJobTitle|default=''}" lay-verify="required"/>
                      </div>
                </div>
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          公司地址
                      </div>
                      <div class="flex-item">
                            <input placeholder="请输入公司地址" name="insuredCompanyAddress" value="{$info.insuredCompanyAddress|default=''}" lay-verify="required"/>
                      </div>
                </div>  
                <div class="conner-list">
                      <div class="flex-item" >
                          <p>*</p>
                          年收入
                      </div>
                      <div class="flex-item flex-item-input">
                            <input placeholder="请填写年收入金额" name="insuredYearIncome" value="{$info.insuredYearIncome|default=''}" lay-verify="required|money"/>
                      </div>
                      <div class="flex-item  flex-item-on">
                           港币
                      </div>
                </div>
        </div>
        <div class="bottom">
          <input type="text" id="type" name="type" style="display: none" />
			    <button type="submit" class="btn btn1" onclick="$('#type').val(0)" >上一页</button>
			    <button type="submit" class="btn btn1" onclick="$('#type').val(1)" lay-filter="formDemo" lay-submit="" lay-ignore>下一页</button>
        </div>
      <input type="hidden" name="orderId" value="{$orderId|default=''}">
      <input type="hidden" name="userId" value="{$userId|default=''}">
      </form>
  </div>
</body>
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
<script src="__JS__/laydate/laydate.js"></script>
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

            //金额
            money:function(value, item){
                if(!new RegExp(reg).test(value)){
                    return '不符合规定，请重新检查输入';
                }
            },

            //身份证
            identity:function(value, item){
                if (value == '') { 
                  return '身份证号不能为空'
                }
                if(!new RegExp(age1).test(value)){
                    return '请输入正确的身份证号';
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

        form.on('submit(formDemo)', function(data){
            // console.log(data.elem); //被执行事件的元素DOM对象，一般为button对象
            // console.log(data.form);//被执行提交的form对象，一般在存在form标签时才会返回
            // console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
            // if(data.field.sex == null){
            //     console.log("没有性别");
            // }
            // return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

    });

</script>

<script>
//lay('#version').html('-v'+ laydate.v);
//执行一个laydate实例
laydate.render({
  elem: '#test1' //指定元素
});

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
