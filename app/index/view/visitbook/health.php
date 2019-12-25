<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css">
<title>健康状况</title>
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
  <div class="appwexi" style="padding: 10px 15px;">
        <div class="title">
             <ul>
                 <li><h3><span>|</span>受保人资料（非申请人）</h3></li>
                 <li>请填写并核对信息</li>
             </ul>
        </div>
  </div>
<style>
.conner-list svg{ width: 30px; height: 30px;margin-right: 10px;}
.conner-list .svg-title{ line-height: 1.7rem;width: 100%;}
.conner-list .svg-title div{ float:left; color: #d81e06;}
.conner-list .svg-title-p{margin: 0;
    font-size: 0.1rem;
    line-height: 1.8rem;}
</style>
  <div style="height:15px; width:100%; background:#f6f6f6;"></div>

<form action="{:url('index/visitbook/submitHealth')}" method="post" method="post" class="layui-form" lay-ignore >
<!--受保人列表-->
  	<div id="sholist">

	    <div class="sholist1" {if condition="isset($info['name1']) && !empty($info['name1'])"} style='display:block' {else /} style='display:none' {/if} >
			<div class="appwexi" style="padding: 8px 15px;">
				<div class="conner">
						<div class="conner-list" style="border-top: 1px solid #e3e3e3;">
							  <div class="flex-item">
								  <p>*</p>
								  姓名
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写你的姓名" name="name1" value="{$info.name1|default=''}" lay-verify="username" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  关系
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写与受保人关系" name="relationship1" value="{$info.relationship1|default=''}" lay-verify="required"/>
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  身份证号
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写受益人身份证号码" name="IDCard1" value="{$info.IDCard1|default=''}" lay-verify="identity" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  百分比
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写分配百分比" name="percent1" value="{$info.percent1|default=''}" lay-verify="required"/>
							  </div>
						</div>
				</div>
		   </div>
		   <div style="height:15px; width:100%; background:#f6f6f6;"></div>
	   	</div>
	    <div class="sholist2" {if condition="isset($info['name2']) && !empty($info['name2'])"} style='display:block' {else /} style='display:none' {/if}>
			<div class="appwexi" style="padding: 8px 15px;">
				<div class="conner">
						<div class="conner-list" style="border-top: 1px solid #e3e3e3;">
							  <div class="flex-item">
								  <p>*</p>
								  姓名
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写你的姓名" name="name2" value="{$info.name2|default=''}" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  关系
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写与受保人关系" name="relationship2" value="{$info.relationship2|default=''}" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  身份证号
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写受益人身份证号码" name="IDCard2" value="{$info.IDCard2|default=''}" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  百分比
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写分配百分比" name="percent2" value="{$info.percent2|default=''}" />
							  </div>
						</div>
				</div>
		   </div>
		   <div style="height:15px; width:100%; background:#f6f6f6;"></div>
	   	</div>
	    <div class="sholist3" {if condition="isset($info['name3']) && !empty($info['name3'])"} style='display:block' {else /} style='display:none' {/if}>
			<div class="appwexi" style="padding: 8px 15px;">
				<div class="conner">
						<div class="conner-list" style="border-top: 1px solid #e3e3e3;">
							  <div class="flex-item">
								  <p>*</p>
								  姓名
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写你的姓名" name="name3" value="{$info.name3|default=''}" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  关系
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写与受保人关系" name="relationship3" value="{$info.relationship3|default=''}" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  身份证号
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写受益人身份证号码" name="IDCard3" value="{$info.IDCard3|default=''}" />
							  </div>
						</div>
						<div class="conner-list">
							  <div class="flex-item">
								  <p>*</p>
								  百分比
							  </div>
							  <div class="flex-item">
								   <input placeholder="请填写分配百分比" name="percent3" value="{$info.percent3|default=''}" />
							  </div>
						</div>
				</div>
		   </div>
		   <div style="height:15px; width:100%; background:#f6f6f6;"></div>
	   	</div>
  	</div>
<!--edu受保人列表-->

  <div class="appwexi" style="    padding: 8px 15px;">
        <div class="conner" id="sho">
                <div class="conner-list" style="border-bottom: 0px;">
                      <svg t="1536754660283" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1867" xmlns:xlink="http://www.w3.org/1999/xlink">
					  <defs>
					      <style type="text/css"></style>
					  </defs>
					  <path d="M825.6 473.6 544 473.6l0-275.2c0-19.2-12.8-32-32-32S480 179.2 480 198.4l0 281.6-275.2 0C179.2 480 166.4 492.8 166.4 512c0 19.2 12.8 32 32 32l275.2 0 0 275.2c0 19.2 12.8 32 32 32 19.2 0 32-12.8 32-32L537.6 544l275.2 0c19.2 0 32-12.8 32-32S844.8 473.6 825.6 473.6z" p-id="1868" fill="#d81e06"></path>
					  <path d="M512 0C230.4 0 0 230.4 0 512s230.4 512 512 512 512-230.4 512-512S793.6 0 512 0zM512 953.6c-243.2 0-441.6-198.4-441.6-441.6S268.8 70.4 512 70.4s441.6 198.4 441.6 441.6S755.2 953.6 512 953.6z" p-id="1869" fill="#d81e06"></path>
					  </svg>
					 <span class="svg-title"> <div>添加受益人</div><p class="svg-title-p">（点击添加受益人）</p></span>
                </div>
        </div>
  </div>

<!--已投保之香港保险公司名单列表-->
  <div id="company">
    <div style="height:15px; width:100%; background:#f6f6f6;"></div>
    <div class="company1" {if condition="isset($info['company1']) && !empty($info['company1'])"} style='display:block' {else /} style='display:none' {/if}>
		<div class="appwexi" style="padding: 8px 15px;">
			<div class="conner">
					<div class="conner-list" style="border-top: 1px solid #e3e3e3;">
						  <div class="flex-item">
							  <p>*</p>
							  保险公司
						  </div>
						  <div class="flex-item">
							   <input placeholder="请填写所投保险公司" name="company1" value="{$info.company1|default=''}" lay-verify="required"/>
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item">
							  <p>*</p>
							  产品
						  </div>
						  <div class="flex-item">
							   <input placeholder="请填写保险产品" name="goods1" value="{$info.goods1|default=''}" lay-verify="required"/>
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item" >
							  <p>*</p>
							  保费
						  </div>
						  <div class="flex-item flex-item-input">
								<input placeholder="请填写所投的保费金额" name="money1" value="{$info.money1|default=''}" lay-verify="required|money"/>
						  </div>
						  <div class="flex-item  flex-item-on">
							   港币
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item">
							  <p>*</p>
							  申请日期
						  </div>
						  <div class="flex-item testlist">
							   <input type="text" class="demo-input" placeholder="请选择日期" id="test1" name="date1" value="{$info.date1|default=''}" lay-verify="required"/>
						  </div>
					</div>
			</div>
	   </div>
	   <div style="height:15px; width:100%; background:#f6f6f6;"></div>
   </div>
    <div class="company2" {if condition="isset($info['company2']) && !empty($info['company2'])"} style='display:block' {else /} style='display:none' {/if}>
		<div class="appwexi" style="padding: 8px 15px;">
			<div class="conner">
					<div class="conner-list" style="border-top: 1px solid #e3e3e3;">
						  <div class="flex-item">
							  <p>*</p>
							  保险公司
						  </div>
						  <div class="flex-item">
							   <input placeholder="请填写所投保险公司" name="company2" value="{$info.company2|default=''}" />
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item">
							  <p>*</p>
							  产品
						  </div>
						  <div class="flex-item">
							   <input placeholder="请填写保险产品" name="goods2" value="{$info.goods2|default=''}" />
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item" >
							  <p>*</p>
							  保费
						  </div>
						  <div class="flex-item flex-item-input">
								<input placeholder="请填写所投的保费金额" name="money2" value="{$info.money2|default=''}" />
						  </div>
						  <div class="flex-item  flex-item-on">
							   港币
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item">
							  <p>*</p>
							  申请日期
						  </div>
						  <div class="flex-item testlist">
							   <input type="text" class="demo-input" placeholder="请选择日期" id="test1" name="date2" value="{$info.date2|default=''}" />
						  </div>
					</div>
			</div>
	   </div>
	   <div style="height:15px; width:100%; background:#f6f6f6;"></div>
   </div>
    <div class="company3" {if condition="isset($info['company3']) && !empty($info['company3'])"} style='display:block' {else /} style='display:none' {/if}>
		<div class="appwexi" style="padding: 8px 15px;">
			<div class="conner">
					<div class="conner-list" style="border-top: 1px solid #e3e3e3;">
						  <div class="flex-item">
							  <p>*</p>
							  保险公司
						  </div>
						  <div class="flex-item">
							   <input placeholder="请填写所投保险公司" name="company3" value="{$info.company3|default=''}" />
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item">
							  <p>*</p>
							  产品
						  </div>
						  <div class="flex-item">
							   <input placeholder="请填写保险产品" name="goods3" value="{$info.goods3|default=''}" />
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item" >
							  <p>*</p>
							  保费
						  </div>
						  <div class="flex-item flex-item-input">
								<input placeholder="请填写所投的保费金额" name="money3" value="{$info.money3|default=''}" />
						  </div>
						  <div class="flex-item  flex-item-on">
							   港币
						  </div>
					</div>
					<div class="conner-list">
						  <div class="flex-item">
							  <p>*</p>
							  申请日期
						  </div>
						  <div class="flex-item testlist">
							   <input type="text" class="demo-input" placeholder="请选择日期" id="test2"  name="date3" value="{$info.date3|default=''}" />
						  </div>
					</div>
			</div>
	   </div>
	   <div style="height:15px; width:100%; background:#f6f6f6;"></div>
   </div>
  </div>
<!--edu已投保之香港保险公司名单列表-->

<div class="company-on" style="height:15px; width:100%; background:#f6f6f6;"></div>
 
  <div class="appwexi" style=" padding: 8px 15px;">
        <div class="conner" id="choicefirm">
                <div class="conner-list" style="border-bottom: 0px;">
                      <svg t="1536754660283" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1867" xmlns:xlink="http://www.w3.org/1999/xlink">
					  <defs>
					      <style type="text/css"></style>
					  </defs>
					  <path d="M825.6 473.6 544 473.6l0-275.2c0-19.2-12.8-32-32-32S480 179.2 480 198.4l0 281.6-275.2 0C179.2 480 166.4 492.8 166.4 512c0 19.2 12.8 32 32 32l275.2 0 0 275.2c0 19.2 12.8 32 32 32 19.2 0 32-12.8 32-32L537.6 544l275.2 0c19.2 0 32-12.8 32-32S844.8 473.6 825.6 473.6z" p-id="1868" fill="#d81e06"></path>
					  <path d="M512 0C230.4 0 0 230.4 0 512s230.4 512 512 512 512-230.4 512-512S793.6 0 512 0zM512 953.6c-243.2 0-441.6-198.4-441.6-441.6S268.8 70.4 512 70.4s441.6 198.4 441.6 441.6S755.2 953.6 512 953.6z" p-id="1869" fill="#d81e06"></path>
					  </svg>
					 <span class="svg-title"><div>已投保之香港保险公司名单（必须提供）</div><p class="svg-title-p">（点击添加受益人）</p></span>
                </div>
        </div>
  </div>
    <div style="height:15px; width:100%; background:#f6f6f6;"></div>
  <div class="appwexi" style="padding: 10px 15px;">
        <div class="title">
             <ul>
                 <li><h3><span>|</span>健康状况</h3></li>
                 <li>请填写并核对信息</li>
             </ul>
        </div>
  </div>
  <div style="height:15px; width:100%; background:#f6f6f6;"></div>
  
  <div class="appwexi">
  
  <style>
    .conner-list-p{border-bottom: 0px; display:block;}  
	.conner-list-p p{ margin:0; }  
	.conner-list-p .flex-item-readio{margin: 10px 0;float: left;}  
  </style>
        <div class="conner">
                <div class="conner-list conner-list-p">
                     <p>您是否曾於申請壽險、危疾、意外、傷殘或醫療保險或申請復保時被拒絕受保、擱置受保、須繳付額外保費或修改合約條款?</p>
                     <div class="flex-item radio flex-item-readio" >
						<div class="female">
							<input type="radio" id="female" name="question1" value="1" {if condition="isset($info['question1']) && ($info.question1 eq 1)"}checked{/if}  lay-ignore />
							<label for="female">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male" name="question1" value="0" {if condition="isset($info['question1']) && ($info.question1 eq 0)"}checked{/if}  lay-ignore checked="checked" />
							<label for="male">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>您是否現正、正被建議或打算接受任何醫療諮詢或醫藥治療；或其他情況下被處方藥物超過14天或以上；或您是否現正等候任何檢驗或診斷結果？</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female1" name="question2" value="1" {if condition="isset($info['question2']) && ($info.question2 eq 1)"}checked{/if} lay-ignore />
							<label for="female1">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male1" name="question2" value="0" {if condition="isset($info['question2']) && ($info.question2 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male1">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>在醫院或診所接受任何外科手術?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female2" name="question3" value="1" {if condition="isset($info['question3']) && ($info.question3 eq 1)"}checked{/if}  lay-ignore />
							<label for="female2">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male2" name="question3" value="0" {if condition="isset($info['question3']) && ($info.question3 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male2">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>接受任何檢驗(包括X光、心電圖、驗血、活體檢視、超聲波、乳房X光或子宮頸細胞塗片檢查等)?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female3" name="question4" value="1" {if condition="isset($info['question4']) && ($info.question4 eq 1)"}checked{/if} lay-ignore  />
							<label for="female3">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male3" name="question4" value="0" {if condition="isset($info['question4']) && ($info.question4 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male3">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>任何胸部或呼吸問題 (例如: 哮喘、支氣管炎、肺結核或其他呼吸器官問題, 包括流鼻血)?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female4" name="question5" value="1" {if condition="isset($info['question5']) && ($info.question5 eq 1)"}checked{/if} lay-ignore  />
							<label for="female4">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male4" name="question5" value="0" {if condition="isset($info['question5']) && ($info.question5 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male4">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>任何心臟的疾病或胸口疼病 (例如: 風濕性發熱、高血壓、心絞痛、心臟雜音、心臟驟停), 或其他血液或血管疾病?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female5" name="question6" value="1" {if condition="isset($info['question6']) && ($info.question6 eq 1)"}checked{/if}  lay-ignore />
							<label for="female5">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male5" name="question6" value="0" {if condition="isset($info['question6']) && ($info.question6 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male5">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>任何精神或腦部失常或問題而影響神經系統, 包括癲癇、癱瘓、痳痺、頭暈、長期頭痛、身體失去平衡或抽搐?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female6" name="question7" value="1" {if condition="isset($info['question7']) && ($info.question7 eq 1)"}checked{/if}  lay-ignore />
							<label for="female6">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male6" name="question7" value="0" {if condition="isset($info['question7']) && ($info.question7 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male6">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>癌症或腫瘤、囊腫、腫塊或其他任何贅生物?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female7" name="question8" value="1" {if condition="isset($info['question8']) && ($info.question8 eq 1)"}checked{/if}  lay-ignore />
							<label for="female7">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male7" name="question8" value="0" {if condition="isset($info['question8']) && ($info.question8 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male7">否</label>
						</div>
					 </div>
                </div>
                <div class="conner-list conner-list-p">
                     <p>背部、脊椎、肌肉或關節疼痛或其他疾病, 痛風或其他身體殘疾或任何影響視力、說話能力和聽覺的疾病?</p>
                     <div class="flex-item radio flex-item-readio">
						<div class="female">
							<input type="radio" id="female8" name="question9" value="1" {if condition="isset($info['question9']) && ($info.question9 eq 1)"}checked{/if}  lay-ignore />
							<label for="female8">是</label>
						</div>
						<div class="male">                
							<input type="radio" id="male8" name="question9" value="0" {if condition="isset($info['question9']) && ($info.question9 eq 0)"}checked{/if}  lay-ignore checked="checked"/>
							<label for="male8">否</label>
						</div>
					 </div>
                </div>
				<p style="height: 7px;"></p>
        </div> 
</div> 
<div style="height:15px; width:100%; background:#f6f6f6;"></div>
<div class="appwexi" style="padding: 10px 15px;">
	<div class="title">
		 <ul>
			 <li><h3><span>|</span>到港签单日期</h3></li>
			 <li>请填写并核对信息</li>
		 </ul>
	</div>
</div>
<div style="height:15px; width:100%; background:#f6f6f6;"></div>

<div class="appwexi" style="padding: 10px 15px;">
        <div class="conner">
                <div class="conner-list">
                      <div class="flex-item">
                          <p>*</p>
                          出生日期
                      </div>
                      <div class="flex-item">
                           <input type="text" class="demo-input" placeholder="请选择签到日期" id="test1" lay-verify="required" name="date" value="{$info.date|default=''}"  >
                      </div>
                </div>
        </div>
        <div class="conner" >
                <div class="conner-list" style="border-bottom: 0px;">
                      <div class="flex-item">
                          <p>*</p>
                          时间
                      </div>
                      <div class="flex-item">
                           <input type="text" class="demo-input" placeholder="请选择签到时间" id="test3" lay-verify="required" name="time" value="{$info.time|default=''}" >
                      </div>
                </div>
        </div>
  </div>
  
<div style="height:15px; width:100%; background:#f6f6f6;"></div>  
<div class="appwexi" style="padding: 10px 15px 30px 15px;">
    <div class="bottom">
    	<input type="text" id="type" name="type" style="display: none" value="{$type}" />
	    <button type="submit" class="btn btn1"  onclick="" >上一页</button>
	    <button type="submit" class="btn btn1"  onclick="$('#type').val(1)" lay-filter="formDemo" lay-submit="" lay-ignore>下一页</button>
    </div>
</div>
    <input type="hidden" name="orderId" value="{$orderId|default=''}">
    <input type="hidden" name="userId" value="{$userId|default=''}">
</form>


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
var counta = 1;
//添加受益人
$('#sho').click(function(){
    var length = $('#sholist .sholist').length;
	var display =$('#sholist').css('display');
	// if(display == 'none'){
	//    $('#sholist').css('display','block');
	// }else if(length < 3){
	//    var html = $('#sholist .sholist').html();
	//    $('#sholist').append('<div class="sholist">'+html+'</div>');
	// }
	if (counta == 4) {
		return false;
	}

	$('#sholist').css('display','block');
	var sholist = 'sholist'+counta;
	$('#sholist .'+sholist).css('display','block');
	counta ++;
})
var count = 1;
//添加受益人
$('#choicefirm').click(function(){
    var length = $('#company .company').length;
	var display =$('#company').css('display');
	
	if (count == 4) {
		return false;
	}

	$('#company').css('display','block');
	var company = 'company'+count;
	$('#company .'+company).css('display','block');
	$('.company-on').remove();
	count ++;

	// else if(length < 3){
	//     var html = $('#company .company').html();
	//     $('#company').append('<div class="company">'+html+'</div>');
	// 	alert($("#company .company:last-child").find('.testlist input').val());
	// }
})

//laydata时间控件
//lay('#version').html('-v'+ laydate.v);
//执行一个laydate实例
laydate.render({
   elem: '#test1' //指定元素
});
laydate.render({
   elem: '#test2' //指定元素
});
laydate.render({
   elem: '#test3',type:'time' //指定元素
});

function haha(){
	laydate.render({
   elem: '#test1' //指定元素
});
}




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
