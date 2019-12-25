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
<style>
    .hidden{
        display: none;
    }

</style>
<form class="layui-form layui-form-pane" action="{:url('admin/Goods/add')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" style="width:300px;">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item" >
        <label class="layui-form-label">公司名称</label>
        <div class="layui-input-inline" style="z-index: 999;">
            <select name="companyId" class="field-companyId" type="select">
                {volist name="company" id="vo"}
                    <option value="{$vo.id}">{$vo.name}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">计划类型</label>
        <div class="layui-input-inline" style="z-index: 998;">
            <select name="planType" class="field-planType" type="select">
                <option value="0" selected>重疾</option>
                <option value="1" >储蓄分红</option>
                <option value="2" >高端医疗</option>
            </select>
        </div>
    </div>

    <!--图片-->
    <div class="layui-form-item">
        <label class="layui-form-label">图片上传</label>
        <div class="layui-input-inline upload">
            <button type="button" name="url" class="layui-btn layui-btn-primary layui-upload-image" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
            <input type="hidden" class="upload-input" name="url" value="">
            <img class="hidden" src="" style="border-radius:5px;border:1px solid #ccc" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux">支持jpg,png格式的文件</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">上传文件</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{exts:'pdf', accept:'file'}">请上传pdf</button>
            <input type="hidden" class="upload-input" name="file">
        </div>
        <div class="layui-form-mid layui-word-aux">支持pdf格式的文件</div>
    </div>
    
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/Goods/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
</form>
{include file="block/layui" /}
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
    upload.render({
        elem: '.layui-upload-image',
        url: '{:url("admin/annex/upload?thumb=no&water=no&group=iamge")}'
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

    