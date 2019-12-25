<!--
+----------------------------------------------------------------------
| 添加修改实例模板，Ctrl+A 可直接复制以下代码使用
| select元素需要加type="select"
| 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
+----------------------------------------------------------------------
-->
<!-- <div class="layui-collapse page-tips">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
            <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
    </div>
</div> -->

<form class="layui-form layui-form-pane" action="{:url('admin/domainname/edit')}" id="editForm" method="post">
 
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" style="width:300px;" value="{$data.title}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">域名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="url" lay-verify="url" autocomplete="off" placeholder="请输入域名" style="width:300px;" value="{$data.url}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id" value="{$data.id}">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/domainname/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

{include file="admin@block/layui"/}
 