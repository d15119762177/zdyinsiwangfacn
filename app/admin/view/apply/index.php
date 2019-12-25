<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <!-- <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a> -->
        <!-- <a data-href="{:url('admin/Apply/status?val=1')}" class="layui-btn layui-btn-primary j-page-btns layui-icon layui-icon-play" data-table="dataTable">&nbsp;通过</a> -->
        <a data-href="{:url('admin/Apply/status?val=2')}" class="layui-btn layui-btn-primary j-page-btns layui-icon layui-icon-pause" data-table="dataTable">&nbsp;驳回</a>
        <a data-href="{:url('admin/Apply/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url('admin/Apply/index')}" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="search" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input" value="{$search}">
                </div>
            </div>
        </form>
    </div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="dataTable"></table>
{include file="block/layui" /}
<script type="text/html" title="状态模板" id="statusTpl">
    <input type="checkbox" name="status" value="{{ d.status }}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" {{ d.status == 1 ? 'checked' : '' }} data-href="{:url('status')}?table=admin_config&id={{ d.id }}">
</script>

<script type="text/html" title="排序模板" id="sortTpl">
    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" value="{{ d.sort }}" data-value="{{ d.id }}" data-href="{:url('sort')}?table=admin_config&id={{ d.id }}">
</script>

<script type="text/html" title="操作按钮模板" id="buttonTpl">
    <a  class="layui-btn layui-btn-xs layui-btn-normal" onclick="ceshi({{ d.id }})">审核</a>
    <a href="{:url('admin/Apply/del')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>
<script type="text/javascript">
    var search = $("input[name='search']").val();

    layui.use(['table'], function() {
        var table = layui.table, formType = {:json_encode(form_type())};
        table.render({
            elem: '#dataTable'
            ,url: "{:url('admin/Apply/index')}?search="+search //数据接口
            ,page: true //开启分页
            ,limit: 10
            ,search:search
            ,text: {
                none : '暂无相关数据'
            }
            ,cols: [[ //表头
                {type:'checkbox'}
                ,{field: 'id', title: 'ID', width: '10%',sort: true}
                ,{field: 'name', title: '名字', width: '10%'}
                ,{field: 'phone', title: '手机号',  width: '10%',sort: true}
                // ,{field: 'plan', title: '保险计划', width: 80}
                ,{field: 'IDCard', title: '身份证',  width: '15%',sort: true}
                ,{field: 'status', title: '状态',  width: '10%',sort: true}
                ,{field: 'createTime', title: '添加时间',  width: '10%',sort: true}
                ,{title: '操作', width: 120, templet: '#buttonTpl', width: '12.5%'}
            ]]
        });
    });

    //iframe层-父子操作


</script>

<script>

	function ceshi(obj)
	{
		layer.open({
			type: 2,
			area: ['700px', '450px'],
			fixed: false, //不固定
			maxmin: true,
			content: "{:url('admin/Apply/pass')}?id="+obj
		});
	}
	
</script>