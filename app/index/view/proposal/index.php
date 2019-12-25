<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
<title>建议书</title>
<link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css">
</head>
<style>
    @media(min-width:720px){
        .appwexi{
            max-width: 720px;
        }
    }
    body{max-width: 720px;background-size: 100% 100%!important;}
    html{
        background: #f6f6f6;
        overflow: auto;
    }
    html,body{
     padding-top: constant(safe-area-inset-top);   //为导航栏+状态栏的高度 88px            
    padding-left: constant(safe-area-inset-left);   //如果未竖屏时为0                
    padding-right: constant(safe-area-inset-right); //如果未竖屏时为0                
    padding-bottom: constant(safe-area-inset-bottom);//为底下圆弧的高度 34px       
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
    }

    .conner-list {
        display: -webkit-flex;
        display: flex;
        -webkit-align-items: flex-end;
        align-items: flex-end;
        width: 100%;

    }

    .flex-item:first-child{
        width: 30%;
        height: 1.6em;
        color: #fff;
    }

    .flex-item {
        width: 100%;
        margin: 10px;
    }

    .flex-item input{
        text-indent: 0.6rem;
        width: 100%;
        border-radius: 6px;
        height: 2em;
        border: 1px solid #c8cccf;
        outline: 0;
    }



    .radio label{
        display: block;
        width: 23%;
        float: left;
        margin-right:10%;
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
        border: 1px solid #fff;
        text-indent: .15em;
        line-height: 1;
        background: #fff;
        padding: 0.1em;
    }

    input[type="radio"]:checked + label::before {
        background-color: #01cd78;
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
        border-radius: 6px;
        border: none;
        outline: none;
        width: 100%;
        height: 2rem;
        line-height: 2rem;
        appearance: none;
        /*-webkit-appearance: none;*/
        -moz-appearance: none;
        padding-left: 0.6rem;
    }

    /*底部按钮样式**/
    .bottom{
        display: -webkit-flex;
        display: flex;
        width: 50%; margin:0 auto;
    }

    .bottom .flex-item {
        width: 50%;
        margin: 10px;
    }
    .bottom .flex-item input{
        text-indent: 0;
    }
</style>

<body style="background:url(__IMG__/back.jpg)" lay-ignore>
<form  class="layui-form" action="{:url('index/Proposal/add')}" method="post" id="formDemo"  lay-ignore>
    <input type="hidden" name="openId" value="{$openid}">
    <input type="hidden" name="headimgurl" value="{$headimgurl}">
    <input type="hidden" name="nickname" value="{$nickname}">
  <div class="appwexi">
		<div class="conner-list">
			  <div class="flex-item">产品类型</div>
			  <div class="flex-item">
					<div class="flex-item-select">
						<select name="planType" lay-ignore>
							<option value="0">重疾</option>
							<option value="1">储蓄</option>
							<option value="2">高端医疗</option>
						</select>
					</div>
<!--					<select class="js-example-basic-single" name="state">
					  <option value="AL">Alabama</option>
					  <option value="WY">Wyoming</option>
					</select>-->
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">保险产品</div>
			  <div class="flex-item">
					<div class="flex-item-select">
						<select name="goodsId" lay-ignore>
                            {volist name="goodsList" id="vo"}
                                <option value="{$vo.id}">{$vo.title}</option>
                            {/volist}
						</select>
					</div>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">姓名</div>
			  <div class="flex-item">
					<input type="text" name="name" lay-verify="required|username" lay-ignore>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">性别</div>
			  <div class="flex-item radio">
					<div class="female">
						<input type="radio" id="female" name="sex" value="0" lay-verify="required"  lay-ignore  checked="checked" />
						<label for="female">女</label>
					</div>
					<div class="male">                
						<input type="radio" id="male" name="sex" value="1" lay-verify="required"  lay-ignore/>
						<label for="male">男</label>
					</div>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">出生</div>
			  <div class="flex-item">
                   <input type="text" class="demo-input" placeholder="请选择日期" id="test1" name="birthday" lay-verify="required" lay-ignore>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">是否抽烟</div>
			  <div class="flex-item radio">
					<div class="female">
						<input type="radio" id="shi" name="smoking" value="1" lay-verify="required"  lay-ignore checked="checked" />
						<label for="shi">是</label>
					</div>
					<div class="male">                
						<input type="radio" id="fo" name="smoking" value="0" lay-verify="required"  lay-ignore/>
						<label for="fo">否</label>
					</div>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">保额</div>
			  <div class="flex-item">
					<div class="flex-item-select">
						<select class="js-example-basic-single" name="quota" lay-ignore id="quota">
						  <option value=""></option>
						  <option value="50000">5万</option>
						  <option value="100000">10万</option>
						  <option value="150000">15万</option>
						  <option value="200000">20万</option>
						  <option value="300000">30万</option>
						  <option value="500000">50万</option>
						  <option value="1000000">100万</option>
						</select>
					</div>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">保费</div>
			  <div class="flex-item">
					<input type="text" name="premium"  lay-ignore id="premium"/>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">缴费年期</div>
			  <div class="flex-item">
					<div class="flex-item-select">
						<select class="js-example-basic-single" name="payMentYear" lay-ignore>
						  <option value="5">5年</option>
						  <option value="10">10年</option>
						  <option value="18">18年</option>
						  <option value="25">25年</option>
						</select>
					</div>
			  </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">国籍</div>
            <div class="flex-item">
			  <div class="flex-item-select">
					<select class="js-example-basic-single" name="nationality" lay-ignore>

                    </select>
			  </div>
            </div>
		</div>
		<div class="conner-list">
			  <div class="flex-item">备注</div>
			  <div class="flex-item">
					<input type="text" name="remark" lay-ignore/>
			  </div>
		</div>
  </div>

  <div class="bottom">
		  <div class="flex-item">
		        <input type="submit" value="确认" lay-filter="formDemo" lay-submit="" lay-ignore>
		  </div>
		  <div class="flex-item">
				<input type="button" value="取消" lay-ignore>
		  </div>
  </div>
</form>
</body>
{include file="admin@block/layui" /}
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
<script src="__JS__/laydate/laydate.js"></script>
<script src="__ADMIN_JS__/layui/layui.js"></script>

<script>

    layui.use('form', function(){
        var form = layui.form;
        var reg = /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/;
        //各种基于事件的操作，下面会有进一步介绍

        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
                if(!new RegExp("^[\u4E00-\u9FA5]{2,5}$").test(value)){
                    return '请检查名字，不符合规定';
                }

            },
            money:function(value, item){
                if(!new RegExp(reg).test(value)){
                    return '金额不符合规定，请重新检查输入';
                }
            }

        });

        form.on('submit(formDemo)', function(data){
            console.log(data.elem); //被执行事件的元素DOM对象，一般为button对象
            console.log(data.form);//被执行提交的form对象，一般在存在form标签时才会返回
            console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
            if(data.field.sex == null){
                console.log("没有性别");
            }

        });

    });

</script>

<script>

    $("select[name='planType']").change(
        function () {
            var planType = $('select[name="planType"]').val(); //产品id
            $.ajax({
                url: "{:url('index/Proposal/changeGoodsByPlanType')}",
                type: 'post',
                dataType: 'json',
                data : {
                    'planType':planType
                },
                success: function (res) {
                    // var arr = JSON.parse(res);
                    var str = "";
                    for(var i=0;i < res.length;i++){
                        str += "<option value='"+res[i]['id']+"'>"+res[i]['title']+"</option>";
                    }
                    $("select[name='goodsId']").html(
                        str
                    );
                }
            })
        }
    );

</script>
<script>

//执行一个laydate实例
layui.use('laydate', function(){
    var laydate = layui.laydate;
    laydate.render({
        elem: '#test1' //指定元素
    });
    lay('#version').html('-v'+ laydate.v);
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
    var bodyheight = $('body').height();
    var height = $(window).height();
　　if(height < 500 || bodyheight > height){
        $('body').css("height","auto");
	}else{
        $('html').css("height","100%");
        $('body').css("height","100%");
    }; 
}); 
//性别单选框
$("input[name='sex']").on("change",function(event) {
	var a = $("input[name='sex']:checked").val();
});
//是否抽烟单选框
$("input[name='smoking']").on("change",function(event) {
	var a = $("input[name='smoking']:checked").val();
});

$(function () {
    var nation = ["中国","韩国","日本","新加坡","马来西亚","菲律宾","沙特阿拉伯","朝鲜","越南","缅甸","德国","英国","法国","爱尔兰","波兰","西班牙","意大利","俄罗斯","荷兰","美国","加拿大","巴西","阿根廷","新西兰","澳大利亚","印度","埃及"];
    var str = "";
    for(var i=0;i < nation.length;i++){

        str += "<option value='"+nation[i]+"'>"+nation[i]+"</option>";
    }
    // console.log(str);
    $("select[name='nationality']").html(
        str
    );
})

    $('#quota').change(function () {
        if ($('#quota').val() == ""){
            $('#premium').removeAttr("disabled");
            return false;
        }
        $('#premium').val("");
        $('#premium').attr("disabled","disabled");
    });

    $('#premium').bind('keyup',function () {
        $('#quota').val("");
        $('#quota').attr("disabled","disabled");
    })



</script>

</html>
