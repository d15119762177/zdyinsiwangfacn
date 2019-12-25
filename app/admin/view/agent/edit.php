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

<form class="layui-form layui-form-pane" action="{:url('admin/Agent/edit')}" id="editForm" method="post">
  <!--   <fieldset class="layui-elem-field layui-field-title">
        <legend>修改代理</legend>
    </fieldset> -->
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="name" lay-verify="name" autocomplete="off" placeholder="请输入标题" style="width:300px;" value="{$info.name}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">手机号</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="phone" lay-verify="phone" autocomplete="off" placeholder="请输入标题" style="width:300px;" value="{$info.phone}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">身份证</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="IDCard" lay-verify="identity" autocomplete="off" placeholder="请输入标题" style="width:300px;" value="{$info.IDCard}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">关联用户</label>
        <div class="layui-input-inline" style="float: left;">
            <input type="text" class="layui-input field-username" autocomplete="off" placeholder="请输入标题" disabled style="width:300px;float: left;" value="{$info.userInfo}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">待结算佣金</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" lay-verify="waitCommision"  disabled autocomplete="off" placeholder="请输入标题" style="width:300px;" value="{$info.waitCommision}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">已结算佣金</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" disabled lay-verify="finishCommision" autocomplete="off" placeholder="请输入标题" style="width:300px;" value="{$info.finishCommision}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline" style="z-index: 998;">
            <select name="status" class="field-planType" type="select">
                <option value="1" {if condition="$info.status == 1"}selected{/if}>正常</option>
                <option value="0" {if condition="$info.status == 0"}selected{/if}>关闭</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/Agent/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>

    <input type="hidden" name="id" value="{$info.id}">
</form>
{include file="admin@block/layui" /}

<script>
layui.use(['jquery', 'laydate', 'upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload',
        url: '{:url("admin/annex/upload?thumb=no&water=no&group=pdf")}'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            $(obj).parents('.upload').find('.upload-input').val(res.data.file);
            $(obj).parents('.upload').find('button').text('文件上传成功');
        }
    });
});
</script>

<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
{:editor(['UEditor1', 'UEditor2'])}
<!-- <script src="__STATIC__/admin/js/footer.js"></script> -->

    