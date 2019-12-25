<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a>
 <!--        <a data-href="{:url('status?table=admin_config&val=1')}" class="layui-btn layui-btn-primary j-page-btns layui-icon layui-icon-play" data-table="dataTable">&nbsp;启用</a>
        <a data-href="{:url('status?table=admin_config&val=0')}" class="layui-btn layui-btn-primary j-page-btns layui-icon layui-icon-pause" data-table="dataTable">&nbsp;禁用</a> -->
        <a data-href="{:url('admin/users2/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url('admin/users2/index')}" method="get">
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
    <a href="{:url('admin/users2/edit')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal">修改</a>
    <a href="{:url('admin/users2/del')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>
<script type="text/javascript">
    var search = $("input[name='search']").val();

    layui.use(['table'], function() {
        var table = layui.table, formType = {:json_encode(form_type())};
        table.render({
            elem: '#dataTable'
            ,url: "{:url('admin/users2/index')}?search="+search //数据接口
            ,page: true //开启分页
            ,limit: 10
            ,search:search
            ,text: {
                none : '暂无相关数据'
            }
            ,cols: [[ //表头
                {type:'checkbox'}
                ,{field: 'id', title: 'ID', width: '10%'}
                ,{field: 'openId', title: '微信识别ID', width: '10%'}
                ,{field: 'headimgurl', title: '头像地址',  width: '10%'}
                ,{field: 'nickname', title: '微信名',  width: '10%'}
                ,{field: 'sex', title: '性别',  width: '10%'}
                ,{field: 'birthday', title: '出生日期',  width: '10%'}
                ,{field: 'nationality', title: '国籍',  width: '10%'}
                ,{field: 'name', title: '姓名',  width: '10%'}
                ,{field: 'smoking', title: '是否抽烟',  width: '10%'}
                ,{field: 'type', title: '是否代理',  width: '10%'}
                ,{field: 'agentId', title: '代理人ID',  width: '10%'}
                ,{field: 'subscribeTime', title: '关注时间',  width: '10%'}
                ,{field: 'createTime', title: '添加时间',  width: '10%'}
                ,{title: '操作', width: 120, templet: '#buttonTpl', width: '10%'}
            ]]
        });
    });
</script>