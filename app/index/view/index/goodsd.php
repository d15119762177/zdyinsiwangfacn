<!DOCTYPE html>
<html>
<head>
	<title>互联网接入服务业务</title>
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
		text-align: -webkit-center;
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
 			ISP许可证申请必要性
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
			利用接入服务器和相应的软硬件资源建立业务节点，并利用公用通信基础设施将业务节点与互联网骨干网相连接，为各类用户提供接入互联网的服务。
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
					<li>1）经营者为依法设立的公司。</li>
					<li>2）有与开展经营活动相适应的资金（在省、自治区、直辖市范围内经营的，其注册资本最低限额为100万人民币；在全国或跨省、自治区、直辖市范围内经营的，其注册资本最低限额为1000万人民币）。</li>
					<li>3）有为用户提供长期服务的信誉或能力。</li>
					<li>4）有与开展经营活动相适应的专业人员。</li>
					<li>5）有必要的场地、设施及技术方案。</li>
					<li>6）公司及其主要出资者和主要经营管理人员三年内无违反电信监督管理制度的违法记录。</li>
					<li>7）国家规定的其他条件。</li>
				</ul>
			</div>
 		</div>

 		<!--产品服务分类及介绍-->
 		<div class="h3">
 			产品服务分类及介绍
 			<span class="h3-color"></span>
 			<div class="h6-top">"ISP许可证" 你可以做这些</div>
 		</div>
 	
 		<div class="introduce">
			<div class="s-tab-itmearticle s-tab-itmearticle02 overflow">
				<div class="cpfl-bigbox left" style="border-left:0;">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span01"></span></a><a href="javascript:;">ICP许可证申请</a></div>
					<div class="cpfl-cq-article">全网ISP许可证申请是指企业利用接入服务器和相应的软硬件资源建立业务节点，并利用公用通信基础设施将业务节点与互联网骨干网相连接，为各类用户提供接入互联网的服务需取得许可牌照，否则属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span02"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">地网ISP许可证申请是指企业利用接入服务器和相应的软硬件资源建立业务节点，并利用公用通信基础设施将业务节点与互联网骨干网相连接，为各类用户提供接入互联网的服务需取得许可牌照，否则属于违法经营。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span03"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">ISP许可证变更是指变更原有ISP许可证上的公司名称、法定代表人、注册地址、注册资金、通信地址、联系电话、联系人、股东及股东资金结构等信息。注：全网在工信部申请，地网在公司注册所在地的通信管理局申</div>
				</div>
				<div class="cpfl-bigbox left" style="border-left:0;">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span04"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">ISP许可证年检是指每年1-3月份（注：全网3-6月），持有者向主管部门提交公司ISP业务情况，主管部门对公司持有的ISP许可证进行常规真实性检查，合格者加盖年检合格章，如未按时年检或有违规虚假信息，主...</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span05"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">ISP许可证注销是指原有ISP许可证未到或者已到5年期限，ISP许可证持证公司因业务因素而不在需要使用该证书，就需要向主管部门提交注销申请。注：全网在工信部申请，地网在公司注册所在地的通信管理局申请。</div>
				</div>
				<div class="cpfl-bigbox left">
					<div class="cpfl-cq left"><a href="javascript:;"><span class="cpfl-cq-span cpfl-cq-span06"></span></a><a href="javascript:;">游戏</a></div>	
					<div class="cpfl-cq-article">ISP许可证续期是指原有ISP许可证5年有效期到期后，公司想要继续使用，就需要向主管部门提交续办申请。注：全网在工信部申请，地网在公司注册所在地的通信管理局申请。</div>
				</div>

			</div>
 		</div>

		<!--申请流程-->
 		<div class="h3">
 			申请流程
 			<span class="h3-color"></span>
 		</div>
 		<div class="process">
 			<img src="__IMG__/processD.png">
 		</div>

		<!--为什么选择秘书先生-->
 		<div class="h3">
 			为什么选择秘书先生（ISP许可证服务特色）
 			<span class="h3-color"></span>
 		</div>
 		<div class="Why">
 			<img src="__IMG__/pic06.png" alt="为什么选择秘书先生（ICP许可证服务特色）">
 		</div>

		<!--行业参照-->
 		<div class="h3">
 			行业参照
 			<span class="h3-color"></span>
 		</div>
 		<div class="reference">
 			<div class="reference-conner">
					<div class="cpfl-logo left" style="border-left:0;">
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">
							<img src="http://static.jsyun.cc/static/images/zizhi/xcjy.png">
						</a>
						<p><a href="javascript:;" onclick="OpenQQ()" target="_blank">ISP许可证</a></p>
					</div>
					<div class="cpfl-logo left">
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">
							<img src="http://static.jsyun.cc/static/images/zizhi/qtxx.png">
						</a>
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">ISP许可证</a>
					</div>
					<div class="cpfl-logo left">
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">
							<img src="http://static.jsyun.cc/static/images/zizhi/btwl.png">
						</a>
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">ISP许可证</a>
					</div>
					<div class="cpfl-logo left">
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">
							<img src="http://static.jsyun.cc/static/images/zizhi/blkj.png">
						</a>
						<a href="javascript:;" onclick="OpenQQ()" target="_blank">ISP许可证</a>
					</div>
	        </div>
 		</div>

 		<!--申请基本条件-->
 		<div class="h3">
 			企业必备资料
 			<span class="h3-color"></span>
 		</div>
 		<div class="condition">
			<div class="condition-left" >
				<div class="condition-left-img" style=" background: url(__IMG__/yyzz.png);"></div>
			</div>
			<div class="condition-right">
				<ul>
					<li>1）营业执照副本。</li>
					<li>2）法人及股东身份证（注：股东为企业，需提供营业执照及公司章程）。</li>
					<li>3）公司章程。</li>
					<li>4）公司主要管理人员及技术人员身份证。</li>
					<li>5）社保证明。</li>
					<li>6）接入协议及托管商资质。</li>
					<li>7）验资报告。</li>
					<li>8）与基础运营商签署的机房租赁协议(自建机房需先通过机房评测)。</li>			
				</ul>
			</div>
 		</div>


 	</div>
{include file='common/footer'}
</body>
</html>