<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <!-- <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a> -->
        <!-- <a data-href="{:url('admin/Order/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a> -->

       <a href="javascript:;" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine" onclick="expor();">&nbsp;导出全部订单</a>
    </div>
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url('admin/Order/index')}" method="get">
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

<script type="text/html" title="排序模板" id="sortTpl">
    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" value="{{ d.sort }}" data-value="{{ d.id }}" data-href="{:url('sort')}?table=admin_config&id={{ d.id }}">
</script>


<script type="text/html" title="操作按钮模板" id="buttonTpl">
    <a href="{:url('admin/Order/del')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>
<script type="text/javascript">
    var search = $("input[name='search']").val();

    layui.use(['table'], function() {
        var table = layui.table, formType = {:json_encode(form_type())};
        table.render({
            elem: '#dataTable'
            ,url: "{:url('admin/Order/index')}?search="+search //数据接口
            ,page: true //开启分页
            ,limit: 10
            ,search:search
            ,text: {
                none : '暂无相关数据'
            }
            ,cols: [[ //表头
                {type:'checkbox', fixed: true}
                ,{field: 'id', title: '订单ID', width: '5%', fixed: true}
                ,{field: 'name', title: '用户名',  width: '10%', fixed: true}
                ,{field: 'mobie', title: '电话号码',  width: '10%', fixed: true}
                ,{field: 'number', title: '数量',  width: '5%',sort: true}
                ,{field: 'address', title: '地址',  width: '10%'}
                ,{field: 'freetime', title: '详细地址',  width: '15%',sort: true}
                ,{field: 'conner', title: '留言',  width: '10%',sort: true}
                ,{field: 'ctime', title: '下单时间',  width: '10%',sort: true}
                ,{title: '操作', width: 120, templet: '#buttonTpl', width: '10%'}
            ]]
        });
    });
    

    function expor(){
        layer.alert('是否导出', {icon: 6,offset: 'auto',yes: function(index){
                window.location.href= '{:url("admin/order/exportorder")}';
                layer.closeAll(); 
            }
        });
    }
// {:url('admin/Order/exportorder')}
</script>