<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a>
        <a data-href="{:url('admin/Goods/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url('admin/Goods/index')}" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="search" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input" value="">
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
    <a href="{:url('admin/wechat/wechat')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal">微信号管理</a>
    <a href="{:url('admin/wechat/edit')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal">修改</a>
    <a href="{:url('admin/wechat/del')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>
<script type="text/javascript">
    var search = $("input[name='search']").val();
    layui.use(['table'], function() {
        var table = layui.table, formType = {:json_encode(form_type())};
        table.render({
            elem: '#dataTable'
            ,url: "{:url('admin/wechat/index')}?search="+search //数据接口
            ,page: true //开启分页
            ,limit: 10
            ,search:search
            ,text: {
                none : '暂无相关数据'
            }
            ,cols: [[ //表头
                {type:'checkbox'}
                ,{field: 'id', title: 'ID', width: '5%',sort: true}
                ,{field: 'title', title: '标题',  width: '20%',sort: true}
                ,{field: 'url', title: '网页', width: '20%'}
                ,{field: 'name', title: '微信号',  width: '20%',sort: true}
                ,{field: 'ctime', title: '创建时间',  width: '15%',sort: true}
                ,{title: '操作', width: 120, templet: '#buttonTpl', width: '15%'}
            ]]
        });
    });
</script>