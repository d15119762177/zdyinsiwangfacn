<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <!-- <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a> -->
        <a data-href="{:url('admin/Order/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>
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
    <button class="layui-btn layui-btn-xs layui-btn-primary" onclick='exportSuggestion("{{ d.id }}")'>导出建议书</button>
    <button class="layui-btn layui-btn-xs layui-btn-info" onclick='uploadComfirm("{{ d.id }}")'>上传建议书</button>
    <button class="layui-btn layui-btn-xs layui-btn-info" onclick='exportHKBookingToWord("{{ d.id }}")'>导出访港预约书</button>
    <button class="layui-btn layui-btn-xs layui-btn-info" onclick='uploadHKComfirm("{{ d.id }}")'>上传访港确认书</button>

    <a href="{:url('admin/Order/edit')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal">修改</a>
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
                ,{field: 'id', title: 'ID', width: '5%', fixed: true}
                ,{field: 'orderNum', title: '订单号', width: '10%', fixed: true}
                ,{field: 'userName', title: '用户名',  width: '10%', fixed: true}
                ,{field: 'goodsName', title: '保险名称',  width: '10%', fixed: true}
                ,{field: 'applicant', title: '投保人',  width: '10%'}
                ,{field: 'insurant', title: '受保人',  width: '10%'}
                ,{field: 'quota', title: '投保额度',  width: '10%'}
                ,{field: 'paymenTime', title: '缴费时间',  width: '10%'}
                ,{field: 'premium', title: '首年保费',  width: '10%'}
                ,{field: 'startTime', title: '保险生效时间',  width: '10%'}
                ,{field: 'endTime', title: '保险失效时间',  width: '10%'}
                ,{field: 'remark', title: '备注',  width: '10%'}
                ,{field: 'payMentYear', title: '缴费年期/年',  width: '10%'}
                // ,{field: 'fileId', title: '关联文件表ID',  width: '10%'}
                ,{field: 'createTime', title: '添加时间',  width: '10%'}
                ,{field: 'updateTime', title: '更新时间',  width: '10%'}
                ,{field: 'status', title: '状态',  width: '10%'}
                ,{title: '操作', width: 120, templet: '#buttonTpl', width: '40%'}
            ]]
        });
    });
    
    function exportSuggestion(id) {
        var url = "{:url('admin/Order/exportSuggestionToWord')}?id="+id;

        window.open(url);
    }

    function exportHKBookingToWord(id) {
        var url = "{:url('admin/Order/exportHKBookingToWord')}?id="+id;

        window.open(url);
    }
    
    function uploadComfirm(id) {
        layui.use('layer', function(){
            var layer = layui.layer;

            layer.open({
                type: 2,
                title: '上传建议书',
                area: ['1317px', '545px'],
                content: '{:url("admin/order/uploadComfirm")}?id='+id //iframe的url
            });
        });
    }

    function uploadHKComfirm(id) {
        layui.use('layer', function(){
            var layer = layui.layer;

            layer.open({
                type: 2,
                title: '上传访港确认书',
                area: ['1317px', '545px'],
                content: '{:url("admin/order/uploadHKComfirm")}?id='+id //iframe的url
            });
        });
    }

</script>