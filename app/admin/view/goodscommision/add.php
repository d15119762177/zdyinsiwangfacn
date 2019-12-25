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

<form class="layui-form layui-form-pane" action="{:url('admin/Goodscommision/add')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄区间</label>
        <div class="layui-input-inline" style="width: 85px;">
            <input type="text" name="starAge"  autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid">-</div>
        <div class="layui-input-inline" style="width: 85px;">
            <input type="text" name="endAge"  autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item" >
        <label class="layui-form-label">保险产品</label>
        <div class="layui-input-inline" style="z-index: 999;">
            <select name="goodsId" class="field-companyId" type="select">
                {volist name="goodsInfo" id="vo"}
                    <option value="{$vo.id}">{$vo.title}</option>
                {/volist}
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">年期</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="period" autocomplete="off" placeholder="请输入年期" style="width:300px;">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第一年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate1" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第二年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate2" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第三年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate3" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第四年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate4" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第五年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate5" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第六年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate6" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第七年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate7" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第八年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate8" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第九年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate9" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">第十年</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="commisionRate10" autocomplete="off" placeholder="请输入佣金比例" style="width:300px;" value="0">
        </div>
        <div class="layui-form-mid layui-word-aux">% 百分比</div>
    </div>
    
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/Goodscommision/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
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

    