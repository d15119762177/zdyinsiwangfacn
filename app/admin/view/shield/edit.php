<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
		<title>访客数据统计</title>
		<link rel="stylesheet" type="text/css" href="__CSS__/layui.css">
		<link rel="stylesheet" type="text/css" href="__CSS__/admin.css">
	
	<link id="layuicss-skinlayercss" rel="stylesheet" href="__CSS__/layer.css?v=3.0.3303" media="all">
 
	 
</head>
	<body>
<style type="text/css">
.layui-table-page select {
    height: 26px;
}
</style>

		<div class="wrap-container welcome-container">
      <div class="row">
        <form class="layui-form" action="">
          <div class="layui-form-item">
            <label class="layui-form-label">选择日期：</label>
            <div class="layui-inline">
                <select name="setDate" style="width: 160px;height: 30px">
					<option value="全部">全部</option>
                </select>
            </div>
            <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="setDate">查看</button>
          </div>
        </form>
      </div>
			<div class="row">
				<div class="welcome-left-container col-lg-12">
					<div class="data-show">
						<ul class="clearfix">
							<li class="col-sm-12 col-md-2 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-org f-l">
										<span class="iconfont"></span>
									</div>
									<div class="right-text-con">
										<p class="name">浏览数</p>
										<p><span class="color-org">{$count}</span>数据<span class="iconfont"></span>
                    </p>
									</div>
								</a>
							</li>

							<li class="col-sm-12 col-md-2 col-xs-12">
								<a href="javascript:;" class="clearfix">
									<div class="icon-bg bg-green f-l">
										<span class="iconfont"></span>
									</div>
									<div class="right-text-con">
										<p class="name">屏蔽</p>
										<p><span class="color-green">{$oncount}</span>数据<span class="iconfont"></span></p>
									</div>
								</a>
							</li>

              <!--屏蔽城市数据 -->
              {volist name="city" id="item"}
                <li class="col-sm-12 col-md-2 col-xs-12">
                  <a href="javascript:;" class="clearfix">
                    <div class="icon-bg bg-green f-l">
                      <span class="iconfont"></span>
                    </div>
                    <div class="right-text-con">
						<p class="name">屏蔽城市：{$item.city}</p>
						<p>
							<span class="color-green">
								{$item.count}
							</span>
							屏蔽
						</p>
                    </div>
                  </a>
                </li>
              {/volist}
              <!--End 屏蔽城市 -->

              <!--屏蔽IP数据-->
              
              <!--End 屏蔽ip-->
						</ul>
					</div>
          <!--微信号统计 -->
<!--           <div class="server-panel panel panel-default">
            <div class="panel-header">微信号统计</div>

          </div> -->
          <!--ideaid统计-->
<!--           <div class="server-panel panel panel-default">
            <div class="panel-header">ideaId统计</div>

          </div> -->

          <!--详细访问数据-->
          <div class="panel pandel-default">
            <div class="panel-header">详细访问数据</div>

 
            <table id="demo" lay-filter="test"></table>
          </div>
          <!--End 详细访问数据-->

			

		</div>
 
 
{include file="block/layui" /}

<script>
	//详细访问数据
 
	layui.use('table', function(){
	  var table = layui.table;
	  //第一个实例
	  table.render({
	    elem: '#demo'
	    ,height: 500
	    ,url: "{:url('admin/shield/edit')}?id=1" //数据接口
	    ,page: true //开启分页
	    ,cols: [[ //表头
			{field: 'id', title: 'ID', width:'10%', sort: true}
			,{field: 'url', title: '入口地址', width:'30%'}
			,{field: 'ip', title: 'ip地址', width:'30%', sort: true}
			,{field: 'city', title: '城市', width:'10%'} 
			,{field: 'notes', title: '屏蔽原因', width: '10%'}
			,{field: 'time', title: '访问时间', width: '15%', sort: true}
			,{field: 'ondata', title: '访问时间', width: '15%', sort: true}
	    ]]
	  });
	});
</script>

 

</div></div></div>

</body>
</html>