
<form class="layui-form layui-form-pane" action="{:url('admin/wcstatistics/add')}" id="editForm" method="post">
 


    <div class="layui-form-item">
        <label class="layui-form-label">网页</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="url" lay-verify="url" autocomplete="off" placeholder="请输入域名如https://www.baidu.com" style="width:300px;" value="">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">事件</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="title" lay-verify="title" autocomplete="off" placeholder="请输入事件标题" style="width:300px;" value="">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/wcstatistics/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

{include file="block/layui" /}
 