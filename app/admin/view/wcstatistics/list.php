

<!-- <div class="page-toolbar"> -->
<!--     <div class="layui-btn-group fl">
        <a href="{:url('add?group='.input('param.group'))}" class="layui-btn layui-btn-primary layui-icon layui-icon-add-circle-fine">&nbsp;添加</a>
        <a data-href="{:url('admin/wcstatistics/del')}" class="layui-btn layui-btn-primary j-page-btns confirm layui-icon layui-icon-close red">&nbsp;删除</a>
    </div> -->
<!--     <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url('admin/wcstatistics/index')}" method="get">
            <div class="layui-form-item">
                <label class="layui-form-label">搜索</label>
                <div class="layui-input-inline">
                    <input type="text" name="search" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input" value="{$search}">
                </div>
            </div>
        </form>
    </div> -->
<!-- </div> -->

<div class="layui-form" style="width: 40%;">
     <input type="text" name="urlid" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{$urlid}" style="display: none;">
  <table class="layui-table">
    <colgroup>
      <col width="25%">
      <col width="25%">
      <col width="25%">
      <col width="25%">
    </colgroup>
    <thead>
      <tr>
        <th></th>
        <th>访客</th>
        <th>独立访客</th>
        <th>ip</th>
      </tr> 
    </thead>
    <tbody>
      <tr>
        <td>今天</td>
        <td>{$data.countpv}</td>
        <td>{$data.countuv}</td>
        <td>{$data.countip}</td>
      </tr>
      <tr>
        <td>昨天</td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
    </tbody>
  </table>
</div>

<div id="container" style="height: 500px;width: 90%"></div>



<script src="http://code.jquery.com/jquery-latest.js"></script>
<table id="dataTable" style="min-width: 800px;">

</table>
{include file="block/layui" /}
<script type="text/html" title="状态模板" id="statusTpl">
    <input type="checkbox" name="status" value="{{ d.status }}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" {{ d.status == 1 ? 'checked' : '' }} data-href="{:url('status')}?table=admin_config&id={{ d.id }}">
</script>

<script type="text/html" title="排序模板" id="sortTpl">
    <input type="text" class="layui-input j-ajax-input input-sort" onkeyup="value=value.replace(/[^\d]/g,'')" value="{{ d.sort }}" data-value="{{ d.id }}" data-href="{:url('sort')}?table=admin_config&id={{ d.id }}">
</script>

<script type="text/html" title="操作按钮模板" id="buttonTpl">
    <a href="{:url('admin/wcstatistics/list')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal">管理</a>
    <a href="{:url('admin/wcstatistics/edit')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-normal">修改</a>
    <a href="{:url('admin/wcstatistics/del')}?id={{ d.id }}" class="layui-btn layui-btn-xs layui-btn-danger j-tr-del">删除</a>
</script>

<textarea id="tablies1"> {$arrayName}</textarea>
<textarea id="tablies2"> {$arrayName}</textarea>

<script type="text/javascript">
    // var search = $("input[name='search']").val();
    var search = '';
    var urlid = $("input[name='urlid']").val();
    layui.use(['table'], function() {
        var table = layui.table, formType = {:json_encode(form_type())};
        table.render({
            elem: '#dataTable'
            ,url: "{:url('admin/wcstatistics/list')}?search="+search+"&urlid="+urlid //数据接口
            ,page: true //开启分页
            ,limit: 10
            ,search:$("input[name='search']").val()
            ,text: {
                none : '暂无相关数据'
            }
            ,cols: [[ //表头
                {type:'checkbox'}
                ,{field: 'id', title: 'ID', width: '5%',sort: true}
                ,{field: 'cip', title: 'ip地址',  width: '20%',sort: true}
                ,{field: 'source', title: '来源', width: '20%'}
                ,{field: 'ctime', title: '创建时间',  width: '15%',sort: true}
                // ,{title: '操作', width: 120, templet: '#buttonTpl', width: '15%'}
            ]]
        });
    });
</script>



<!-- 引入 echarts.js -->
<script src="__JS__/echarts.min.js"></script>
<script type="text/javascript">
var tablies1 = $('#tablies1').text();
var tablies2 = $('#tablies2').text();

console.log(tablies1);
var dom = document.getElementById("container");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title: {
        text: '流量趋势'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['浏览次数最大值','浏览次数最小值']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['00.00','01.00','02.00','03.00','04.00','05.00','06.00','07.00','08.00','09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00','21.00','22.00','23.00','24.00']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'浏览次数最大值',
            type:'line',
            stack: '总量',
            data: $.parseJSON( tablies1 ) 
        },
        {
            name:'浏览次数最小值',
            type:'line',
            stack: '总量',
            data: $.parseJSON( tablies1 ) 
        }
    ]
};
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
</script>