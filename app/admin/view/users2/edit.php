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

<form class="layui-form layui-form-pane" action="{:url('admin/users2/edit')}" id="editForm" method="post">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>表单集合</legend>
    </fieldset>
    <div class="layui-form-item">
        <label class="layui-form-label">微信识别ID</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="openId" lay-verify="title" autocomplete="off" placeholder="请输入微信识别ID" style="width:300px;" value="{$info.openId}">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">头像地址</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="headimgurl" lay-verify="title" autocomplete="off" placeholder="请输入头像地址" style="width:300px;"  value="{$info.headimgurl}">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">微信名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="nickname" lay-verify="title" autocomplete="off" placeholder="请输入微信名" style="width:300px;"  value="{$info.nickname}">
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">代理人ID</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="agentId" lay-verify="title" autocomplete="off" placeholder="请输入代理人ID" style="width:300px;"  value="{$info.sex}">
            </div>
        </div>

<!--            <div class="layui-form-item">-->
<!--                <label class="layui-form-label">出生日期</label>-->
<!--                <div class="layui-input-inline">-->
<!--                    <input type="text" class="layui-input field-username" name="birthday" lay-verify="title" autocomplete="off" placeholder="请输入出生日期" style="width:300px;"  value="{$info.birthday}">-->
<!--                </div>-->
<!--            </div>-->

        <div class="layui-form-item">
            <label class="layui-form-label">出生日期</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="birthday" lay-verify="title" autocomplete="off"id="test1"  placeholder="请选择日期时间" style="width:300px;"  value="{$info.birthday}">
            </div>
        </div>

            <div class="layui-form-item">
               <label class="layui-form-label">国籍</label>
                <div class="layui-input-inline">
                   <input type="text" class="layui-input field-username" name="nationality" lay-verify="title" autocomplete="off" placeholder="请输入国籍" style="width:300px;"  value="{$info.nationality}">
                 </div>
            </div>
                <div class="layui-form-item">
                   <label class="layui-form-label">姓名</label>
                    <div class="layui-input-inline">
                     <input type="text" class="layui-input field-username" name="name" lay-verify="title" autocomplete="off" placeholder="请输入姓名" style="width:300px;"  value="{$info.name}">
                   </div>
                </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">是否抽烟</label>
                        <div class="layui-input-inline">
                            <select name="smoking" class="form-control" style="width:300px;">
                                <option value="1" {if $info.smoking == 1}selected{/if}>抽烟</option>
                                <option value="0" {if $info.smoking == 0}selected{/if}>不抽烟</option>
                                <!-- <option value="1" {if 2 == 2}selected{/if}>2</option> -->
                            </select>
                        </div>
                        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-inline">
                <select name="sex" class="form-control" style="width:300px;">
                    <option value="1" {if $info.sex == 1}selected{/if}>男</option>
                    <option value="0" {if $info.sex == 0}selected{/if}>女</option>
                    <!-- <option value="1" {if 2 == 2}selected{/if}>2</option> -->
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">是否代理</label>
            <div class="layui-input-inline">
                <select name="type" class="form-control" style="width:300px;">
                    <option value="1" {if $info.type == 1}selected{/if}>代理</option>
                    <option value="0" {if $info.type == 0}selected{/if}>用户</option>
                    <!-- <option value="1" {if 2 == 2}selected{/if}>2</option> -->
                </select>
            </div>
        </div>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/users2/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>

    <input type="hidden" name="id" value="{$info.id}">
</form>
{include file="admin@block/layui" /}

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
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#test1' //指定元素
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

    