<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>我要加入</title>
</head>

<style>
@media(min-width:720px){
	.appwexi{
	   max-width: 720px;
	}
}
body{max-width: 720px; background:#f5f6f8;}
html{
    background: #f6f6f6;
    overflow: auto;
}
html,body{
    width:100%;
    margin: 0 auto;
    padding:0;
}
ul li{ list-style-type:none;} 
a{display: block;
    color: #000;
    text-decoration: none;}

/*清除ios*/
input[type="button"], input[type="submit"], input[type="reset"] {
    -webkit-appearance: none;
}


/*conner内容样式**/
.conner{
	margin: 5% 5% 22% 5%;
	border-radius: 6px;
}

.conner .conner-img{
	padding: 16%;
	background: #fff;
}

.conner .conner-list{
	background: #fff;
	padding: 5%;
	margin-bottom: 5%;
	box-shadow: 1px 4px 8px #dcdcdc;
}

/***弹性盒子布局**/
.conner-list .conner-input ul{
	display: flex;
	width: 100%;
	padding: 12px 0;
	border-bottom: 1px solid #f5efef;
	margin: 0;
}
.conner-list .conner-input ul li:first-child{ 
	width: 50%;
	font-weight: 600;
}
.conner-list .conner-input ul li{
    width:100%;
}
.conner-list .conner-input ul li input{
	border: 0px;
	font-size: 1rem;
	width: 100%;outline:none;
}

.conner-list .conner-input ul li span{
    color: #f00;
	margin-right:2px;
}

.conner-list .conner-input ul li textarea{
    width: 90%;
    border: 1px solid #cecece;
    border-radius: 4px;
    outline: none;
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

#textarea {
    display: block;
    margin: 0 auto;
    overflow: hidden;
    width: 100%;
    font-size: 14px;
    line-height: 24px;
    padding: 2px;
    border: 0;
    outline: 0 none;
}

</style>

<style type="text/css">
    table {
        width: 300px;
    }
    td {
        border: 1px #ccc solid;
        font-size: 13px;
    }

    .title {
        width: 60px;
        height: 22px;
        line-height: 22px;
        float: left;
        text-align: justify;
        text-justify: inter-ideograph; /*为了兼容IE*/
        text-align-last: justify;/* ie9*/
        -moz-text-align-last: justify;/*ff*/
        -webkit-text-align-last: justify;/*chrome 20+*/
    }

    .title:after {
        content: ".";
        display: inline-block;
        width: 100%;
        overflow: hidden;
        height: 0;
    }

    .maohao {
        line-height: 22px;
        width: 10px;
        float: left;
    }

    .detail {
        float: left;
        width: 220px;
        line-height: 22px;
        white-space: pre-wrap;
        word-break: break-all;
    }

    #justify {
        width: 300px;
        height: auto;
        font-size: 13px;
    }
</style>
<body>
	<div class="conner">
     	<div class="conner-list">
			<form action="{:url('index/join/add')}" method="post" >
				  <div class="conner-input">
						<ul>
						  <li><span>*</span>姓&#12288;&#12288;名：</li>
						  <li><input placeholder="请填写您的姓名" name="name" /></li>
						</ul>
						<ul>
						  <li><span>*</span>电&#12288;&#12288;话：</li>
						  <li><input placeholder="请输入您的常用电话号码" name="phone" /></li>
						</ul>
						<ul>
						  <li><span>*</span>身&#8194;份&#8194;证：</li>
						  <li><input placeholder="请输入您的身份证号码" name="IDCard"  /></li>
						</ul>
						<ul>
						  <li><span>*</span>邮&#12288;&#12288;箱：</li>
						  <li><input placeholder="请填写您的年龄" name="email" /></li>
						</ul>
						<ul>
						  <li><span>*</span>所在区域：</li>
						  <li><input placeholder="请输入您的地址" name="address" /></li>
						</ul>
						<ul>
						  <li><span>*</span>你的资料：</li>
						  <li><textarea id="textarea" placeholder="请填写你的补充资料"></textarea></li>
						</ul>
				  </div>
				  <div class="conner-bottom">
					   <input type="submit" />
				  </div>
			</form>
		</div>
	</div>
</body>


<script>
/**
 * 文本框根据输入内容自适应高度
 * @param                {HTMLElement}        输入框元素
 * @param                {Number}                设置光标与输入框保持的距离(默认0)
 * @param                {Number}                设置最大高度(可选)
 */
var autoTextarea = function (elem, extra, maxHeight) {
    extra = extra || 0;
    var isFirefox = !!document.getBoxObjectFor || 'mozInnerScreenX' in window,
        isOpera = !!window.opera && !!window.opera.toString().indexOf('Opera'),
        addEvent = function (type, callback) {
            elem.addEventListener ?
                elem.addEventListener(type, callback, false) :
                elem.attachEvent('on' + type, callback);
        },
        getStyle = elem.currentStyle ? function (name) {
            var val = elem.currentStyle[name];

            if (name === 'height' && val.search(/px/i) !== 1) {
                var rect = elem.getBoundingClientRect();
                return rect.bottom - rect.top -
                    parseFloat(getStyle('paddingTop')) -
                    parseFloat(getStyle('paddingBottom')) + 'px';
            };

            return val;
        } : function (name) {
            return getComputedStyle(elem, null)[name];
        },
        minHeight = parseFloat(getStyle('height'));

    elem.style.resize = 'none';

    var change = function () {
        var scrollTop, height,
            padding = 0,
            style = elem.style;

        if (elem._length === elem.value.length) return;
        elem._length = elem.value.length;

        if (!isFirefox && !isOpera) {
            padding = parseInt(getStyle('paddingTop')) + parseInt(getStyle('paddingBottom'));
        };
        scrollTop = document.body.scrollTop || document.documentElement.scrollTop;

        elem.style.height = minHeight + 'px';
        if (elem.scrollHeight > minHeight) {
            if (maxHeight && elem.scrollHeight > maxHeight) {
                height = maxHeight - padding;
                style.overflowY = 'auto';
            } else {
                height = elem.scrollHeight - padding;
                style.overflowY = 'hidden';
            };
            style.height = height + extra + 'px';
            scrollTop += parseInt(style.height) - elem.currHeight;
            document.body.scrollTop = scrollTop;
            document.documentElement.scrollTop = scrollTop;
            elem.currHeight = parseInt(style.height);
        };
    };

    addEvent('propertychange', change);
    addEvent('input', change);
    addEvent('focus', change);
    change();
};
</script>
<script>
    var text = document.getElementById("textarea");
    autoTextarea(text);// 调用
</script>
</html>
