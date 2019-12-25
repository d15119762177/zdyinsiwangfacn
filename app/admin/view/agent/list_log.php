<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <!-- <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a> -->
        <a data-href="{:url('admin/Commision/status?val=1')}" class="layui-btn layui-btn-primary j-page-btns layui-icon layui-icon-play" data-table="dataTable">&nbsp;结算</a>
     <!--    <a data-href="{:url('admin/Commision/status?val=0')}" class="layui-btn layui-btn-primary j-page-btns layui-icon layui-icon-pause" data-table="dataTable">&nbsp;关闭</a> -->
        <a data-href="{:url('admin/Commision/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>
    </div>

</div>
<input type="hidden" name="id" value="{$id}">
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
    <a href="{:url('admin/Commision/status')}?id={{ d.id }}&val=1" class="layui-btn layui-btn-xs layui-btn-normal">结算</a>
    <a href="{:url('admin/Commision/del')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>
<script type="text/javascript">
    var search = $("input[name='search']").val();
    var id = $("input[name='id']").val();

    layui.use(['table'], function() {
        var table = layui.table, formType = {:json_encode(form_type())};
        table.render({
            elem: '#dataTable'
            ,url: "{:url('admin/agent/list_log')}?search="+search+'&id='+id //数据接口
            ,page: true //开启分页
            ,limit: 10
            ,search:search
            ,text: {
                none : '暂无相关数据'
            }
            ,cols: [[ //表头
                {type:'checkbox'}
                ,{field: 'id', title: 'ID', width: '10%',sort: true}
                // ,{field: 'plan', title: '保险计划', width: 80}
                ,{field: 'agentName', title: '代理人',  width: '10%',sort: true}
                ,{field: 'orderNum', title: '订单号',  width: '15%',sort: true}
                ,{field: 'goodsName', title: '产品名',  width: '15%',sort: true}
                ,{field: 'commision', title: '佣金',  width: '10%',sort: true}
                ,{field: 'status', title: '状态',  width: '10%',sort: true}
                ,{field: 'createTime', title: '添加时间',  width: '15%',sort: true}
                ,{title: '操作', width: 120, templet: '#buttonTpl', width: '12.5%'}
            ]]
        });
    });
</script>