<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>保险产品分析</title>
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
  padding:5% 15%;
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
	margin-top: 15px;
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
/*底部样式**/
.bottom{
	width: 100%;
	margin: 0 auto;
	background: #fff;
	padding-bottom: 30px;
}
.bottom .bottom-h{ 
    text-align: center;
    width: 30%;
    margin: 0px auto 25px auto;
    border-bottom: 4px solid #f5efef;
}
.bottom .bottom-h h3{ 
	text-align: center;
	width: 83px;
	background: #fff;
	position: relative;
	margin: 0 auto;
	top: 15px;
}

.bottom .bottom-goode{
padding: 0 5%; 
}

.bottom .bottom-goode a{
	display: block;
	float: left;
	padding: 4px 10px 4px 10px;
	border: 1px solid #d1d1d1;
	border-radius: 18px;
	color: #959595;
	text-decoration: none;
	margin-right: 10px;
	margin-bottom: 6px;
}

</style>

<body>
   <div class="top" >
        <img src="__IMG__/bxcpfx_top_image_photo@3x.png" style="width:100%">
   </div>
   <div class="conner">
        <form action="{:url('index/productplan/index')}" id="myForm" method="post">
		      <div class="conner-list">
					<ul>
					  <li>保险产品</li>
					  <li>
                          <input id="goodsName" placeholder="请填写你想了解的保险产品名称" name="goodsName"/>
                          <div id="search-suggest" style="display: none;position: absolute;
                                                        width: 100%;
                                                        margin-left: -23%;
                                                        background: white;
                                                        z-index: 999;">
                              <ul id="search-result" style="display: block;">

                              </ul>
                          </div>
                      </li>
					</ul>
					<ul>
					  <li>所属公司</li>
					  <li><input id="companyName" placeholder="请填写产品所属的保险公司"/></li>
					</ul>
			  </div>
			  <div class="conner-bottom">
			       <input type="button" value="提交" onclick="mySubmit()"/>
                  <p><a href="{:url('index/analysis/recordList')}" style="text-decoration:none">我的分析记录</a></p>
			  </div>
		</form>
   </div>
   <div>
        <div class="bottom">
		     <div class="bottom-h"><h3>热门产品</h3></div>
			 <div class="bottom-goode">
                 {volist name="hotGoods" id="vo"}
                     <a href="{:url('index/productplan/index',['id' => $vo.id])}">{$vo.companyName}-{$vo.title}</a>
                 {/volist}
			 </div>
        </div>
    </div>


</body>

<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
<script>
    $('#goodsName').bind('keyup',function () {

        var url = "{:url('index/analysis/search')}";
        var searchText = $('#goodsName').val();
        $.ajax({
            url:url,
            data:{searchText:searchText},
            type:'get',
            dataType:'json',
            success:function (data) {
                var html ='';
                for (var i =0;i<data.length;i++){
                    html += '<li style="margin-left: 5%;width: 80%;margin-top: 1%;">'+data[i]['title']+'<li>';
                }
                $('#search-result').html(html);
                $('#search-suggest').show().css({

                    position:'absolute'

                })
            }
        })
    });

    $(document).bind('click',function () {
        $('#search-suggest').hide();
    });

    $('#search-suggest').delegate('li','click',function () {
        var val = $(this).text();

        var arr = [];
        arr=val.split('--');

        $('#goodsName').val(arr[1]);
        $('#companyName').val(arr[0]);
    });



    function mySubmit() {
        var goodsName = $('#goodsName').val();
        var url = "{:url('index/analysis/ajaxCheckGoods')}";
        $.ajax({
            url: url,
            data: {goodsName: goodsName},
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data == 1) {
                    alert("没有此产品的分析报告，请重新输入");
                    return false;
                } else {
                    $('#myForm').submit();
                }
            }
        })
    }



</script>

</html>
