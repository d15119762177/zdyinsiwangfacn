<!DOCTYPE html>
<html>
<head>
	<title>游戏版号</title>
	<meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
</head>
<style type="text/css">
	h1, h2, h3, h4, h5, h6, ul, li, dl, dt, dd, ol, span, img, em, u, i, p {
	    outline: none;
	    border: 0;
	    font-style: normal;
	    font-weight: normal;
	    text-decoration: none;
	    list-style: none;
	}
	ul{
		margin: 0px;
		padding: 0px;
	}

	.conner{
		max-width: 1280px;
		margin: auto;
	}
	.conner .h3{
		text-align: center;
		text-indent: 10px;
		font-size: 2rem;
		font-family: "Microsoft YaHei";
		font-weight: bold;
		margin: 50px 0px 35px 0px;
	}
	.conner .h3 .h3-color{
	    width: 40px;
	    height: 3px;
	    background: #51afff;
	    margin: 6px auto;
	    display: block;
	}
	.conner .h3 .h6-top{
		font-size: 16px;
		color: #666;
		margin-bottom: 38px;
		display: block;
	}

	/*申请必要性开始*/
	.permit-conner{
		display: flex;
		background: #f9f9f9;
	}
	.permit-conner div{
		width: 100%;
	}
	.permit-conner div ul{
		padding: 5.6rem 0rem 0rem 7rem;
	}
	.permit-conner div ul li{
		font-size: 1.1rem;
	}
	.permit-conner div ul li span{
		color: #51afff;
		font-size: 3rem;
		position: relative;
		top: -3px;
	}

	.permit-conner .permit-img img{
		width: 26.5rem;
	}

	/*经营范围*/
	.range{
		text-align: center;
		font-size: 18px;
    	color: #666;
	}

	/*申请基本条件*/
	.condition{
		background: #f9f9f9;
		display: flex;
	}
	.condition-left{
		width: 40%;
	}
	.condition-left .condition-left-img{
	    width: 11rem;
	    height: 11rem;
	    border-radius: 100%;
	    margin: 4rem auto;
	}	
	.condition-right{
		width: 60%;
	}
	.condition-right ul{
		margin: 2.5rem auto;
	}	
	.condition-right ul li{
		font-size: 16px;
		color: #666;
		line-height: 2rem;
	}

	/*产品服务分类及介绍*/
	.introduce{
		background: #f5f6f9;
	}
	.s-tab-itmearticle02 {
		padding-left: 0;
		margin-left: 15px;
		background: #f5f6f9;
	}
	.cpfl-bigbox {
	    width: 420px;
	    height: 405px;
	    border-top: 0;
	    overflow: hidden;
	    float: left;
	}
	.cpfl-cq {
		width: 100%;
		padding-top: 20px;
	}
	.cpfl-cq a, .cpfl-logo a {
		text-align: center;
		color: #333;
		font-size: 16px;
		display: block;
		font-weight: bold;
		margin-top: 10px;
	}
	div:after, .clearfix:after {
	    display: block;
	    content: ".";
	    height: 0;
	    clear: both;
	    visibility: hidden;
	}

	.cpfl-cq-article {
	    background: #f5f6f9;
	    font-size: 14px;
	    padding: 20px;
	    line-height: 25px;
	    height: 110px;
	    color: #666;
	    overflow: hidden;
	    /* margin-top: -33px; */
	    position: relative;
	    top: -28px;
	    display: -webkit-box;
	    -webkit-box-orient: vertical;
	    -webkit-line-clamp: 5;
	    overflow: hidden;
	}

	.cpfl-cq .cpfl-cq-span01 {
	    background: url(__IMG__/pic04-1.png) 0 0 no-repeat;display: block;
	    width: 94px;
	    height: 94px;
	    margin: 0 auto;
	}
	.cpfl-cq .cpfl-cq-span02 {
	    background: url(__IMG__/pic04-2.png) 0 0 no-repeat;display: block;
	    width: 94px;
	    height: 94px;
	    margin: 0 auto;
	}
	.cpfl-cq .cpfl-cq-span03 {
	    background: url(__IMG__/pic04-3.png) 0 0 no-repeat;display: block;
	    width: 94px;
	    height: 94px;
	    margin: 0 auto;
	}
	.cpfl-cq .cpfl-cq-span04 {
	    background: url(__IMG__/pic04-4.png) 0 0 no-repeat;display: block;
	    width: 94px;
	    height: 94px;
	    margin: 0 auto;
	}
	.cpfl-cq .cpfl-cq-span05 {
	    background: url(__IMG__/pic04-5.png) 0 0 no-repeat;display: block;
	    width: 94px;
	    height: 94px;
	    margin: 0 auto;
	}
	.cpfl-cq .cpfl-cq-span06 {
	    background: url(__IMG__/pic04-6.png) 0 0 no-repeat;display: block;
	    width: 94px;
	    height: 94px;
	    margin: 0 auto;
	}

	/*申请流程*/
	.process{
		margin: 0 auto;
		width: 973px;
	}

	/*为什么选择秘书先生*/
	.Why{
		margin: 0 auto;
		width: 973px;
	}

	/*行业参照*/
	.reference{
	    -webkit-justify-content: flex-end;
	    justify-content: flex-end;
	    background-color: #d3d3d359;
	    align-items: Center;
	    width: 100%;
	    border: 1px solid #e8e8e8;
	}
	.reference .reference-conner{
	    display: flex;
	    width: 1200px;
	 }
	.reference .reference-conner .cpfl-logo{
	    width: 240px;
	    border-left: 1px solid #e8e8e8;
	    padding: 50px 0;
	    background: #fff;
	}
	.reference .reference-conner .cpfl-logo a {
	    text-align: center;
	    color: #333;
	    font-size: 16px;
	    display: block;
	    font-weight: bold;
	    margin-top: 10px;
	}
</style>
<body>
{include file='common/header'}
{include file='common/header1'}
 	<div class="conner">
 		<!--申请必要性开始-->
 		<div class="h3">
 			ICP经营许可申请必要性
 			<span class="h3-color"></span>
 		</div>
 		<div class="permit-conner">
			<div>
				<ul>
					<li><span>.</span>合法合规重要凭证</li>
					<li><span>.</span>行业准入必备前置</li>
					<li><span>.</span>强劲运营实力体现</li>
				</ul>
			</div>
			<div class="permit-img">
				<img src="__IMG__/pic01.png">
			</div>
			<div>
				<ul>
					<li><span>.</span>商业合作敲门砖</li>
					<li><span>.</span>持续经营基本保障</li>
					<li><span>.</span>享有政府红利的有利依据</li>
				</ul>
			</div>
 		</div>

 		<!--经营范围-->
 		<div class="h3">
 			经营范围
 			<span class="h3-color"></span>
 		</div>
 		<div class="range">
			游戏版号是国家新闻出版广播总局同意相关游戏出版上线运营的批准文件，全称《网络游戏电子出版物审批》，俗称电子出版物号，简称ISBN号，普遍的有光盘发行号，书号。
 		</div>

 		<!--申请基本条件-->
 		<div class="h3">
 			申请基本条件
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/condition.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）申报单位须具有电子出版物出版资质或互联网游戏出版资质。</li>
					<li>2）所申报的国产网络游戏作品已办理著作权登记手续或相关公证，或者能够提交游戏程序源代码，游戏原始著作权人须为中国公民或内资独资企业。</li>
					<li>3）游戏运营单位须具有《电信与信息服务业务经营许可证》（ICP证）。</li>
					<li>4）游戏运营单位须具备《完备网络游戏防沉迷系统实名验证手续证明》（移动游戏、通过网络下载的单机游戏可不提交）。</li>
				</ul>
			</div>
 		</div>

 		<!--产品服务分类及介绍-->
 		<div class="h3">
 			产品服务分类及介绍
 			<span class="h3-color"></span>
 			<div class="h6-top">"游戏版号" 你可以做这些</div>
 		</div>
 	
 		<div class="introduce">
			<div class="s-tab-itmearticle s-tab-itmearticle02 overflow">
				<div class="cpfl-bigbox left" style="border-left:0;">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span01"></span></a><a href="javascript:;">ICP许可证申请</a></div>
					<div class="cpfl-cq-article">休闲益智类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span02"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">网络游戏类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span03"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">进口游戏类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left" style="border-left:0;">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span04"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">动作冒险类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span05"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">棋牌中心类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span06"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">飞行射击类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>

				<div class="cpfl-bigbox left" style="border-left:0;">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span04"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">经营策略类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span05"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">角色扮演类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span06"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">体育竞速类游戏版号办理是指根据相关规定，新游戏若想要出版上线运营的话，需要获得相关许可——《网络游戏电子出版物审批》，如未办理相关许可，则不可涉及此方面业务，否则就属于违法经营。</div>
				</div>
			</div>
 		</div>

		<!--申请流程-->
 		<div class="h3">
 			申请流程
 			<span class="h3-color"></span>
 		</div>
 		<div class="process">
 			<img src="__IMG__/processC.png">
 		</div>

		<!--为什么选择金三优服-->
 		<div class="h3">
 			为什么选择金三优服（游戏版号服务特色）
 			<span class="h3-color"></span>
 		</div>
 		<div class="Why">
 			<img src="__IMG__/pic06.png" alt="为什么选择金三优服（ICP许可证服务特色）">
 		</div>

		<!--行业参照-->
 		<div class="h3">
 			行业参照
 			<span class="h3-color"></span>
 		</div>
 		<div class="reference">
 			<div class="reference-conner">
				<div class="cpfl-logo" style="border-left:0;">
	                <a href="javascript:;" onclick="OpenQQ()" target="_blank">
	                   <img src="http://static.jsyun.cc/static/images/zizhi/zmxt.png">
	                </a>
	                <p><a href="javascript:;" onclick="OpenQQ()" target="_blank">游戏版号</a></p>
	            </div>
	            <div class="cpfl-logo">
	                <a href="javascript:;" onclick="OpenQQ()" target="_blank">
	                   <img src="http://static.jsyun.cc/static/images/zizhi/szwx.png">
	                </a>
	                <a href="javascript:;" onclick="OpenQQ()" target="_blank">游戏版号</a>
	            </div>
	            <div class="cpfl-logo">
	                <a href="javascript:;" onclick="OpenQQ()" target="_blank">
	                   <img src="http://static.jsyun.cc/static/images/zizhi/shjy.png">
	                </a>
	                <a href="javascript:;" onclick="OpenQQ()" target="_blank">游戏版号</a>
	            </div>
	        </div>
 		</div>

 		<!--申请基本条件-->
 		<div class="h3">
 			休闲益智类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
				</ul>
			</div>
 		</div>


 		<!--申请基本条件-->
 		<div class="h3">
 			网络游戏类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>					
				</ul>
			</div>
 		</div>

 		<!--申请基本条件-->
 		<div class="h3">
 			进口游戏类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）海外授权书。</li>
					<li>2）大使馆证明。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书。</li>
					<li>6）著作权备案。</li>		
					<li>7）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>	
				</ul>
			</div>
 		</div>


 		<!--申请基本条件-->
 		<div class="h3">
 			动作冒险类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>		
				</ul>
			</div>
 		</div>


 		<!--申请基本条件-->
 		<div class="h3">
 			棋牌中心类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>		
				</ul>
			</div>
 		</div>


 		<!--申请基本条件-->
 		<div class="h3">
 			飞行射击类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>		
				</ul>
			</div>
 		</div>

  		<!--申请基本条件-->
 		<div class="h3">
 			经营策略类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>		
				</ul>
			</div>
 		</div>	
 		

  		<!--申请基本条件-->
 		<div class="h3">
 			角色扮演类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>		
				</ul>
			</div>
 		</div>	


  		<!--申请基本条件-->
 		<div class="h3">
 			体育竞速类游戏版号办理企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）研发公司营业执照。</li>
					<li>2）软件著作权证书。</li>
					<li>3）运营公司营业执照。</li>
					<li>4）运营公司ICP证书。</li>
					<li>5）运营授权书（自己研发自己运营则不需要）。</li>
					<li>6）游戏说明书、游戏截图、游戏脚本和屏蔽字库、游戏客户端（登陆地址/手机）和账号密码、游戏视频。</li>		
				</ul>
			</div>
 		</div>	 		 			
 	</div>
{include file='common/footer'}
</body>
</html>