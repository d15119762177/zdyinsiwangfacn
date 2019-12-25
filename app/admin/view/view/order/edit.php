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

<form class="layui-form layui-form-pane" action="{:url('admin/Order/edit')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>编辑订单</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <select name="userId" class="field-planType" type="select">
                {volist name="userList" id="vo"}
                    <option value="{$vo.id}" {if condition="$info.userId eq $vo.id"}selected="selected"{/if}>{$vo.name}</option>
                {/volist}
            </select>
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">保险产品</label>
        <div class="layui-input-inline">
            <select name="goodsId" class="field-planType" type="select">
                {volist name="goodsList" id="vo"}
                    <option value="{$vo.id}"  {if condition="$info.goodsId eq $vo.id"}selected="selected"{/if}>{$vo.title}</option>
                {/volist}
            </select>
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">订单号</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" autocomplete="off" style="width:300px;" value="{$info.orderNum}" disabled>
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    
    <div class="layui-form-item">
        <label class="layui-form-label">投保人</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="applicant" lay-verify="required|username" autocomplete="off" placeholder="请输入投保人" style="width:300px;" value="{$info.applicant}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">受保人</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="insurant" lay-verify="required|username" autocomplete="off" placeholder="请输入受保人" style="width:300px;" value="{$info.insurant}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">投保额度</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="quota" lay-verify="required|money" autocomplete="off" placeholder="请输入投保额度" style="width:300px;" value="{$info.quota}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">缴费时间</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" id="paymenTime" name="paymenTime" lay-verify="title" autocomplete="off" placeholder="请输入缴费时间" style="width:300px;" value="{$info.paymenTime}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">首年保费</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="premium" lay-verify="required|money" autocomplete="off" placeholder="请输入首年保费" style="width:300px;" value="{$info.premium}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width: 130px">保险生效时间</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" id="startTime" name="startTime" lay-verify="title" autocomplete="off" placeholder="请输入保险生效时间" style="width:300px;" value="{$info.startTime}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label" style="width: 130px">保险失效时间</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" id="endTime" name="endTime" lay-verify="title" autocomplete="off" placeholder="请输入保险失效时间" style="width:300px;" value="{$info.endTime}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">订单状态</label>
        <div class="layui-input-inline">
            <select name="status" class="field-planType" type="select">
                <option value="1"  {if condition="$info.status eq 1"}selected="selected"{/if}>建议书材料收集</option>
                <option value="2"  {if condition="$info.status eq 2"}selected="selected"{/if}>已出建议书</option>
                <option value="3"  {if condition="$info.status eq 3"}selected="selected"{/if}>确认成交</option>
                <option value="4"  {if condition="$info.status eq 4"}selected="selected"{/if}>访港安排</option>
                <option value="5"  {if condition="$info.status eq 5"}selected="selected"{/if}>已付款</option>
                <option value="6"  {if condition="$info.status eq 6"}selected="selected"{/if}>保单审核中</option>
                <option value="7"  {if condition="$info.status eq 7"}selected="selected"{/if}>审核通过，快递中</option>
                <option value="8"  {if condition="$info.status eq 8"}selected="selected"{/if}>已签收</option>
                <option value="9"  {if condition="$info.status eq 9"}selected="selected"{/if}>已取消</option>
            </select>
        </div>
    <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="remark" lay-verify="title" autocomplete="off" placeholder="请输入备注" style="width:300px;" value="{$info.remark}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
<!--     <div class="layui-form-item">
        <label class="layui-form-label">关联文件表ID</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="fileId" lay-verify="title" autocomplete="off" placeholder="请输入关联文件表ID" style="width:300px;" value="{$info.fileId}">
        </div>
    </div> -->

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id"  value="{$info.id}">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/Order/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
{include file="admin@block/layui" /}
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#paymenTime' //指定元素
        });
        laydate.render({
            elem: '#startTime' //指定元素
        });
        laydate.render({
            elem: '#endTime' //指定元素
        });
    });

    layui.use('form', function(){
        var form = layui.form;
        //金钱正则验证
        var reg = /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/;
        //各种基于事件的操作，下面会有进一步介绍

        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
                    return '用户名不能有特殊字符';
                }
                if(!new RegExp("^[\u4E00-\u9FA5]{2,5}$").test(value)){
                    return '请检查名字，不符合规定';
                }

            },
            money:function(value, item){
                if(!new RegExp(reg).test(value)){
                    return '金额不符合规定，请重新检查输入';
                }
            }

        });
    });
</script>
<script>
    /* 修改模式下需要将数据放入此变量 */
    var formData = {:json_encode($data_info)};
    // 会员选择回调函数
    function func(data) {
        var $ = layui.jquery;
        $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
    }
    layui.use(['upload'], function() {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
        /**
         * 附件上传url参数说明
         * @param string $from 来源
         * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
         * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
         * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
         * @param string $thumb_type 缩略图方式
         * @param string $input 文件表单字段名
         */
        upload.render({
            elem: '.layui-upload'
            ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=")}'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                if (res.code == 1){
                    layer.msg(res.msg);
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                if ($(obj).attr('lay-type') == 'image') {
                    input.siblings('img').attr('src', res.data.file).show();
                }
                input.val(res.data.file);
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
<script src="__STATIC__/admin/js/footer.js"></script>

    